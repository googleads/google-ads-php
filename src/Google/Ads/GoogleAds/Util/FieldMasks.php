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
use Google\Protobuf\BoolValue;
use Google\Protobuf\BytesValue;
use Google\Protobuf\Descriptor;
use Google\Protobuf\DescriptorPool;
use Google\Protobuf\DoubleValue;
use Google\Protobuf\FieldDescriptor;
use Google\Protobuf\FieldMask;
use Google\Protobuf\FloatValue;
use Google\Protobuf\Int32Value;
use Google\Protobuf\Int64Value;
use Google\Protobuf\Internal\Message;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\StringValue;
use Google\Protobuf\UInt32Value;
use Google\Protobuf\UInt64Value;
use InvalidArgumentException;

/** Utility methods for working with field masks.*/
class FieldMasks
{
    private static $WRAPPER_TYPES = [
        DoubleValue::class,
        FloatValue::class,
        Int64Value::class,
        UInt64Value::class,
        Int32Value::class,
        UInt32Value::class,
        BoolValue::class,
        StringValue::class,
        BytesValue::class,
    ];

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
        if (is_null($original) && is_null($modified)) {
            return;
        }
        $descriptor = is_null($original)
            ? self::getDescriptorForMessage($modified) : self::getDescriptorForMessage($original);
        for ($i = 0; $i < $descriptor->getFieldCount(); $i++) {
            $fieldDescriptor = $descriptor->getField($i);
            $fieldName = self::getFieldName($currentField, $fieldDescriptor);

            $getter = Serializer::getGetter($fieldDescriptor->getName());
            $originalValue = is_null($original) ? null : $original->$getter();
            $modifiedValue = $modified->$getter();

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
                switch ($fieldDescriptor->getType()) {
                    case GPBType::MESSAGE:
                        if ($originalValue != $modifiedValue) {
                            if (self::isWrapperType($fieldDescriptor->getMessageType())) {
                                // For wrapper types, just emit the field name.
                                $paths[] = $fieldName;
                            } elseif (is_null($modifiedValue)) {
                                // Just emit the deleted field name.
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
                        if ($originalValue != $modifiedValue) {
                            $paths[] = $fieldName;
                        }
                        break;
                    default:
                        throw new InvalidArgumentException("Unexpected type "
                            . $fieldDescriptor->getType() . " encountered for field $fieldName");
                }
            }
        }
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

    /**
     * @param Descriptor $descriptor the descriptor to check
     * @return bool true if this is a wrapper type
     */
    private static function isWrapperType(Descriptor $descriptor)
    {
        return in_array($descriptor->getClass(), self::$WRAPPER_TYPES);
    }
}
