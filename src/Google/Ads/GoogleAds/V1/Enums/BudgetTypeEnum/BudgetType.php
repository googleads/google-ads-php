<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v1/enums/budget_type.proto

namespace Google\Ads\GoogleAds\V1\Enums\BudgetTypeEnum;

/**
 * Possible Budget types.
 *
 * Protobuf type <code>google.ads.googleads.v1.enums.BudgetTypeEnum.BudgetType</code>
 */
class BudgetType
{
    /**
     * Not specified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * Used for return value only. Represents value unknown in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * Budget type for standard Google Ads usage.
     *
     * Generated from protobuf enum <code>STANDARD = 2;</code>
     */
    const STANDARD = 2;
    /**
     * Budget type for Hotels Ads commission program.
     *
     * Generated from protobuf enum <code>HOTEL_ADS_COMMISSION = 3;</code>
     */
    const HOTEL_ADS_COMMISSION = 3;
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BudgetType::class, \Google\Ads\GoogleAds\V1\Enums\BudgetTypeEnum_BudgetType::class);
