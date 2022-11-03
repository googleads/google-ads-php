<?php

/**
 * Copyright 2022 Google LLC
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

namespace Google\Ads\GoogleAds\Util\V12;

use Google\Rpc\Status;
use Google\Ads\GoogleAds\V12\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V12\Errors\GoogleAdsFailure;
use Google\Ads\GoogleAds\V12\Errors\ErrorLocation\FieldPathElement;

final class GoogleAdsErrors
{
    private const SUPPORTED_FIELDS = [
        'operations',
        'mutate_operations',
        'conversion_adjustments',
        'conversions'
    ];

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
     * @param int $operationIndex the index of the operation, starting from 0.
     * @param Status $partialFailureStatus a partialFailure status, with the detail list
     *     containing GoogleAdsFailure instances
     * @return GoogleAdsError[] an array containing the
     *     GoogleAdsError instances for a given operation index
     */
    public static function fromStatus(
        int $operationIndex,
        Status $partialFailureStatus
    ) {
        $result = [];
        foreach ($partialFailureStatus->getDetails() as $detail) {
            $failure = GoogleAdsFailures::fromAny($detail);
            $errors = self::fromFailure($operationIndex, $failure);
            $result = array_merge($result, $errors);
        }
        return $result;
    }

    /**
     * Return a list of GoogleAdsError instances for a given operation index.
     *
     * @see GoogleAdsErrors::fromStatus
     */
    public static function fromFailure(
        int $operationIndex,
        GoogleAdsFailure $failure
    ) {
        $result = [];
        foreach ($failure->getErrors() as $error) {
            $pathElements = $error->getLocation()->getFieldPathElements();
            if (count($pathElements) > 0) {
                /** @var FieldPathElement $element */
                $element = $pathElements[0];
                $fieldName = $element->getFieldName();
                $index = $element->getIndex();
                if (in_array($fieldName, self::SUPPORTED_FIELDS) && $index == $operationIndex) {
                    $result[] = $error;
                }
            }
        }
        return $result;
    }
}
