<?php

/**
 * Copyright 2018 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Ads\GoogleAds\Util;

use Google\ApiCore\GPBLabel;
use Google\ApiCore\GPBType;
use Google\ApiCore\Serializer;
use Google\Protobuf\Descriptor;
use Google\Protobuf\DescriptorPool;
use Google\Protobuf\FieldDescriptor;
use Google\Protobuf\FieldMask;
use Google\Protobuf\Internal\Message;
use Google\Protobuf\Internal\RepeatedField;
use InvalidArgumentException;
use UnexpectedValueException;

/** Utility methods for working with field masks.*/
class FieldMasks
{
    private static $descriptorPool = null;

    /**
     * Compares two protobuf message objects and computes a FieldMask based on the differences
     * between the two objects. This method can be used to help construct the FieldMask object
     * required by some API methods.
     *
     * Example usage:
     * ```
     * $originalFoo = new Foo();
     * $updatedFoo = (new Foo())->setBar("new-bar");
     * $fieldMask = FieldMasks::compare($originalFoo, $updatedFoo);
     * $client->updateFoo($updatedFoo, $fieldMask);
     * ```
     *
     * @param Message $original the original protobuf message object.
     * @param Message $modified the modified protobuf message object.
     * @return FieldMask a FieldMask reflecting the changes between the original and modified
     *     objects.
     */
    public static function compare(Message $original, Message $modified)
    {
        if (get_class($original) !== get_class($modified)) {
            throw new InvalidArgumentException(sprintf(
                'Both input messages must be of the same type, got '
                    . 'original: %s, modified: %s',
                get_class($original),
                get_class($modified)
            ));
        }
        $paths = [];
        self::buildPaths($paths, '', $original, $modified);

        return (new FieldMask())->setPaths($paths);
    }

    /**
     * Computes a FieldMask based on all of the fields of message that have been set.
     *
     * For a message object `Foo`, FieldMasks::allSetFieldsOf($foo) is equivalent to
     * FieldMasks::compare(new Foo(), $foo)
     *
     * @param Message $message a protobuf message object.
     * @return FieldMask a FieldMask reflecting all fields set in $message.
     */
    public static function allSetFieldsOf(Message $message)
    {
        $messageClass = get_class($message);
        $defaultMessage = new $messageClass();

        return self::compare($defaultMessage, $message);
    }

    /**
     * Returns true if the provided repeated field is null or doesn't have any members.
     *
     * @param RepeatedField|null $field the repeated field to check
     * @return bool true if the field is empty
     */
    private static function isEmpty(?RepeatedField $field): bool
    {
        return is_null($field) || count($field) === 0;
    }

    /**
     * Builds the paths to the fields that are different between original and modified message.
     *
     * @param array $paths the resulting paths from the computation
     * @param string $currentField the current field name
     * @param Message|null $original the original message
     * @param Message|null $modified the modified message
     */
    private static function buildPaths(
        array &$paths,
        $currentField,
        ?Message $original,
        ?Message $modified
    ) {
        $descriptor = is_null($original)
            ? self::getDescriptorForMessage($modified) : self::getDescriptorForMessage($original);
        for ($i = 0; $i < $descriptor->getFieldCount(); $i++) {
            $fieldDescriptor = $descriptor->getField($i);
            $fieldName = self::getFieldName($currentField, $fieldDescriptor);

            $getter = Serializer::getGetter($fieldDescriptor->getName());
            $originalValue = is_null($original) ? null : $original->$getter();
            $modifiedValue = is_null($modified) ? null : $modified->$getter();

            if (self::isFieldRepeated($fieldDescriptor)) {
                // For protobuf objects, the repeated fields that have no members are semantically
                // the same as the ones that are null. If both are empty because of any cases, we
                // will not add their field name to the path, because nothing has changed.
                if (
                    !((self::isEmpty($originalValue) && self::isEmpty($modifiedValue))
                        || $originalValue == $modifiedValue)
                ) {
                    $paths[] = $fieldName;
                }
            } else {
                // Evaluates if the field value changed.
                // If both $original and $modified are null, this function will return at the
                // beginning.
                $hasser = self::getHasser($fieldDescriptor->getName());
                $hasValueChanged =
                    // In most cases, both hassers are available so we can compare them.
                    (
                        !is_null($original) && method_exists($original, $hasser)
                        && !is_null($modified) && method_exists($modified, $hasser)
                        && $original->$hasser() != $modified->$hasser()
                    )
                    // In the special case where $original is not set, we can check if $modified
                    // has a value set. This ensures a better performance than a deep comparison
                    // but also covers the special case of having a `false` boolean value in
                    // $modifiedValue.
                    || (is_null($original) && method_exists($modified, $hasser)
                        && $modified->$hasser())
                    // If hassers are not enough to determine if the value changed, a deep
                    // comparison is used at last resort (lower performance).
                    || $originalValue != $modifiedValue;
                // Handles based on the field type.
                switch ($fieldDescriptor->getType()) {
                    case GPBType::MESSAGE:
                        if ($hasValueChanged) {
                            if (
                                self::shouldAddTopLevelMessageToPath(
                                    $originalValue,
                                    $modifiedValue,
                                    $fieldDescriptor
                                )
                            ) {
                                $paths[] = $fieldName;
                            } else {
                                // Recursively compare to find different values.
                                self::buildPaths(
                                    $paths,
                                    $fieldName,
                                    $originalValue,
                                    $modifiedValue
                                );
                            }
                        }
                        break;
                    case GPBType::DOUBLE:
                    case GPBType::FLOAT:
                    case GPBType::INT64:
                    case GPBType::UINT64:
                    case GPBType::INT32:
                    case GPBType::FIXED64:
                    case GPBType::FIXED32:
                    case GPBType::BOOL:
                    case GPBType::STRING:
                    case GPBType::BYTES:
                    case GPBType::UINT32:
                    case GPBType::ENUM:
                    case GPBType::SFIXED32:
                    case GPBType::SFIXED64:
                    case GPBType::SINT32:
                    case GPBType::SINT64:
                        // Handle all supported types except MESSAGE.
                        if ($hasValueChanged) {
                            $paths[] = $fieldName;
                        }
                        break;
                    default:
                        throw new InvalidArgumentException("Unexpected type "
                            . $fieldDescriptor->getType() . " encountered for field $fieldName");
                }
            }
        }
        // If this is not the first call of this method (whose $currentField is empty) and not both
        // $original and $modified are empty,
        if (!empty($currentField) && !(is_null($original) && is_null($modified))) {
            // If the message is an empty one (no fields declared at all).
            if ($descriptor->getFieldCount() === 0) {
                $paths[] = $currentField;
            }
        }
    }

    /**
     * Returns true if the field should be added to the paths.
     */
    private static function shouldAddTopLevelMessageToPath(
        ?Message $originalValue,
        ?Message $modifiedValue,
        FieldDescriptor $fieldDescriptor
    ) {
        return self::isClearingMessage($originalValue, $modifiedValue)
            || self::isSettingEmptyOneof($originalValue, $modifiedValue, $fieldDescriptor);
    }

    /**
     * Returns true if the original message contains an empty message field that is not present on
     * the modified message, or vice-versa, in which case the user is attempting to clear the top
     * level message field.
     */
    private static function isClearingMessage(
        ?Message $originalValue,
        ?Message $modifiedValue
    ) {
        // Uses byteSize() to check if there are any fields set. A message whose fields have values
        // will always serialize to an empty string.
        return (is_null($modifiedValue)
                && !is_null($originalValue)
                && empty($originalValue->serializeToString()))
            || (is_null($originalValue)
                && !is_null($modifiedValue)
                && empty($modifiedValue->serializeToString()));
    }

    /**
     * Returns true if the modified message contains an empty oneof message that is not present in
     * the original message. In this case, we must add the field to the paths to clear the oneof
     * field.
     */
    private static function isSettingEmptyOneof(
        ?Message $originalValue,
        ?Message $modifiedValue,
        FieldDescriptor $fieldDescriptor
    ) {
        return is_null($originalValue)
            && !is_null($modifiedValue)
            // A oneof field will have a not null `getRealContainingOneof` value.
            && !is_null($fieldDescriptor->getRealContainingOneof())
            // Checks if the message has fields, regardless of whether or not they are set.
            && self::getDescriptorForMessage($modifiedValue)->getFieldCount() === 0;
    }

    /**
     * Gets the value of the specified field of the specified object by using descriptors to
     * traverse along the nested structure of the protobuf message.
     * When a field being traversed upon is a nested message but is set to null, this method will
     * just return null in this case.
     *
     * @param string $fieldMaskPath the field mask path
     * @param Message $object the object whose field value to be get
     * @param bool $returnEnumValueName whether to return the enum value name instead of the
     *     index value returned by default when the field value is an enum value
     * @return mixed the value of the specified field of the specified object
     */
    public static function getFieldValue(
        string $fieldMaskPath,
        Message $object,
        $returnEnumValueName = false
    ) {
        $fieldMaskParts = explode('.', $fieldMaskPath);
        $descriptor = self::getDescriptorForMessage($object);
        $repeatedFieldsValueFound = false;
        foreach ($fieldMaskParts as $part) {
            $fieldValue = null;
            for ($i = 0; $i < $descriptor->getFieldCount(); $i++) {
                $fieldDescriptor = $descriptor->getField($i);
                if ($fieldDescriptor->getName() !== $part) {
                    continue;
                }

                $getter = Serializer::getGetter($fieldDescriptor->getName());
                $fieldValue = $object->$getter();
                // Stops and just returns the whole repeated value when it's found.
                if (self::isFieldRepeated($fieldDescriptor)) {
                    $repeatedFieldsValueFound = true;
                } elseif ($fieldDescriptor->getType() === GPBType::MESSAGE) {
                    $object = $fieldValue;
                    if (is_null($object)) {
                        return null;
                    }
                    $descriptor = self::getDescriptorForMessage($fieldValue);
                } elseif (
                    $fieldDescriptor->getType() === GPBType::ENUM && $returnEnumValueName
                ) {
                    // Returns the enum value name of the field instead of the enum index value.
                    $fieldValue = $fieldDescriptor->getEnumType()->getValue($fieldValue)->getName();
                }
                // There is only one field that matches the field mask part, so no need to loop
                // when the field is found.
                break;
            }
            if ($repeatedFieldsValueFound) {
                break;
            }
        }
        if (!isset($fieldValue)) {
            throw new UnexpectedValueException('The field value cannot be obtained because the '
                . 'given field mask path is unrecognized.');
        }
        return $fieldValue;
    }

    /**
     * @param string $currentField the current field name
     * @param FieldDescriptor $fieldDescriptor the field descriptor to get the field name
     * @return string the field name based on the current field name and provided field descriptor
     */
    private static function getFieldName($currentField, FieldDescriptor $fieldDescriptor)
    {
        if (empty($currentField)) {
            return $fieldDescriptor->getName();
        } else {
            return "$currentField." . $fieldDescriptor->getName();
        }
    }

    /**
     * @param Message $message the message to get its descriptor
     * @return Descriptor the descriptor of the message
     */
    private static function getDescriptorForMessage(Message $message)
    {
        if (is_null(self::$descriptorPool)) {
            self::$descriptorPool = DescriptorPool::getGeneratedPool();
        }
        return self::$descriptorPool->getDescriptorByClassName(get_class($message));
    }

    /**
     * @param FieldDescriptor $fieldDescriptor the field descriptor to check if it's repeated
     * @return bool true if the field descriptor is repeated
     */
    private static function isFieldRepeated(FieldDescriptor $fieldDescriptor)
    {
        return $fieldDescriptor->getLabel() === GPBLabel::REPEATED;
    }

    // TODO: We can remove this function when it's supported in google/gax-php:
    // https://github.com/googleapis/gax-php/issues/285
    /**
     * @param string $name
     * @return string the name of hasser function
     */
    private static function getHasser(string $name)
    {
        return 'has' . ucfirst(Serializer::toCamelCase($name));
    }
}
