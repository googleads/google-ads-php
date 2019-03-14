<?php
/**
 * Copyright 2019 Google LLC
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

namespace Google\Ads\GoogleAds\V1\Util;

use \Google\Protobuf\Any;
use \Google\Protobuf\Internal\Message;
use \Google\Rpc\Status;
use Google\Ads\GoogleAds\V1\Errors\GoogleAdsFailure;
use Google\Ads\GoogleAds\V1\Errors\ErrorLocation\FieldPathElement;


/** 
 * Contains utility methods for handling partial failure of operations. 
 */
 final class ErrorUtils
 {
    /**
     * Gets a list of all partial failure error messages for a given response. Operations are 
     * indexed from 0.
     *
     * <p>For example, given the following GoogleAdsFailure:
     *
     * <pre>
     *   <code>
     *     errors {
     *       message: "Too low."
     *       location {
     *         field_path_elements {
     *           field_name: "operations"
     *           index {
     *             value: 1
     *           }
     *         }
     *         field_path_elements {
     *           field_name: "create"
     *         }
     *         field_path_elements {
     *           field_name: "campaign"
     *         }
     *       }
     *     }
     *     errors {
     *       message: "Too low."
     *       location {
     *         field_path_elements {
     *           field_name: "operations"
     *           index {
     *             value: 2
     *           }
     *         }
     *         field_path_elements {
     *           field_name: "create"
     *         }
     *         field_path_elements {
     *           field_name: "campaign"
     *         }
     *       }
     *     }
     *   </code>
     * </pre>
     *
     * A single GoogleAdsError instance would be returned for operation index 1 and 2, and an empty
     * list otherwise.
     *
     * @param int operationIndex the index of the operation, starting from 0.
     * @param \Google\Rpc\Status partialFailureStatus a partialFailure status, with the detail list 
     *  containing GoogleAdsFailure instances.
     * @return Google\Ads\GoogleAds\V1\Errors\GoogleAdsError[] an array containing the 
     *  GoogleAdsError instances for a given operation index.
     */
    public static function getGoogleAdsErrorsFromStatus(
        int $operationIndex,
        Status $partialFailureStatus
    ) {
        $result = [];
        foreach($partialFailureStatus->getDetails() as $detail)
        {            
            $failure = self::getGoogleAdsFailureFromAny($detail);
            $errors = self::getGoogleAdsErrorsFromFailure($operationIndex, $failure);
            $result = array_merge($result, $errors);
        }
        return $result;
    }

    /**
     * Return a list of GoogleAdsError instances for a given operation index.
     *
     * @see #getGoogleAdsErrorsFromStatus
     */
    public static function getGoogleAdsErrorsFromFailure(
        int $operationIndex,
        GoogleAdsFailure $failure
    ) {
        $result = [];
        foreach($failure->getErrors() as $error)
        {
            $pathElements = $error->getLocation()->getFieldPathElements();
            if(count($pathElements) > 0)
            {
                $element = $pathElements[0];
                $fieldName = $element->getFieldName();
                $index = $element->getIndex();
                if($fieldName == "operations" && $index->getValue() == $operationIndex)
                {
                    $result[] = $error;
                }
            }
        }
        return $result;
    }    

    /**
     * Unpacks a single GoogleAdsFailure from an Any instance.
     *
     * @param \Google\Protobuf\Any An Any instance to unpack
     * @return Google\Ads\GoogleAds\V1\Errors\GoogleAdsFailure
     */
    public static function getGoogleAdsFailureFromAny(Any $any)
    {
        return $any->unpack();
    }

    /**
     * Unpacks GoogleAdsFailure from the partial failure Status.
     * 
     * @param \Google\Rpc\Status $status 
     * @return Google\Ads\GoogleAds\V1\Errors\GoogleAdsFailure;
     */
    public static function getGoogleAdsFailureFromStatus(Status $status)
    {
        $result = [];
        foreach($status->getDetails() as $any)
        {
            $result[] = ErrorUtils::getGoogleAdsFailure($any);
        }
        return $result;
    }

    /**
     * Checks if a result in a mutate response is a partial failure.
     *
     * @param \Google\Protobuf\Internal\Message $message
     * @return bool
     */
    public static function isPartialFailure(Message $message)
    {
        return $message->byteSize() == 0;
    }
 }