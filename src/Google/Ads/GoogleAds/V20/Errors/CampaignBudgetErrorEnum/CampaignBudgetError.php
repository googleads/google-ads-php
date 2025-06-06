<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/campaign_budget_error.proto

namespace Google\Ads\GoogleAds\V20\Errors\CampaignBudgetErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible campaign budget errors.
 *
 * Protobuf type <code>google.ads.googleads.v20.errors.CampaignBudgetErrorEnum.CampaignBudgetError</code>
 */
class CampaignBudgetError
{
    /**
     * Enum unspecified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The received error code is not known in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * The campaign budget cannot be shared.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET_CANNOT_BE_SHARED = 17;</code>
     */
    const CAMPAIGN_BUDGET_CANNOT_BE_SHARED = 17;
    /**
     * The requested campaign budget no longer exists.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET_REMOVED = 2;</code>
     */
    const CAMPAIGN_BUDGET_REMOVED = 2;
    /**
     * The campaign budget is associated with at least one campaign, and so the
     * campaign budget cannot be removed.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET_IN_USE = 3;</code>
     */
    const CAMPAIGN_BUDGET_IN_USE = 3;
    /**
     * Customer is not on the allow-list for this campaign budget period.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET_PERIOD_NOT_AVAILABLE = 4;</code>
     */
    const CAMPAIGN_BUDGET_PERIOD_NOT_AVAILABLE = 4;
    /**
     * This field is not mutable on implicitly shared campaign budgets
     *
     * Generated from protobuf enum <code>CANNOT_MODIFY_FIELD_OF_IMPLICITLY_SHARED_CAMPAIGN_BUDGET = 6;</code>
     */
    const CANNOT_MODIFY_FIELD_OF_IMPLICITLY_SHARED_CAMPAIGN_BUDGET = 6;
    /**
     * Cannot change explicitly shared campaign budgets back to implicitly
     * shared ones.
     *
     * Generated from protobuf enum <code>CANNOT_UPDATE_CAMPAIGN_BUDGET_TO_IMPLICITLY_SHARED = 7;</code>
     */
    const CANNOT_UPDATE_CAMPAIGN_BUDGET_TO_IMPLICITLY_SHARED = 7;
    /**
     * An implicit campaign budget without a name cannot be changed to
     * explicitly shared campaign budget.
     *
     * Generated from protobuf enum <code>CANNOT_UPDATE_CAMPAIGN_BUDGET_TO_EXPLICITLY_SHARED_WITHOUT_NAME = 8;</code>
     */
    const CANNOT_UPDATE_CAMPAIGN_BUDGET_TO_EXPLICITLY_SHARED_WITHOUT_NAME = 8;
    /**
     * Cannot change an implicitly shared campaign budget to an explicitly
     * shared one.
     *
     * Generated from protobuf enum <code>CANNOT_UPDATE_CAMPAIGN_BUDGET_TO_EXPLICITLY_SHARED = 9;</code>
     */
    const CANNOT_UPDATE_CAMPAIGN_BUDGET_TO_EXPLICITLY_SHARED = 9;
    /**
     * Only explicitly shared campaign budgets can be used with multiple
     * campaigns.
     *
     * Generated from protobuf enum <code>CANNOT_USE_IMPLICITLY_SHARED_CAMPAIGN_BUDGET_WITH_MULTIPLE_CAMPAIGNS = 10;</code>
     */
    const CANNOT_USE_IMPLICITLY_SHARED_CAMPAIGN_BUDGET_WITH_MULTIPLE_CAMPAIGNS = 10;
    /**
     * A campaign budget with this name already exists.
     *
     * Generated from protobuf enum <code>DUPLICATE_NAME = 11;</code>
     */
    const DUPLICATE_NAME = 11;
    /**
     * A money amount was not in the expected currency.
     *
     * Generated from protobuf enum <code>MONEY_AMOUNT_IN_WRONG_CURRENCY = 12;</code>
     */
    const MONEY_AMOUNT_IN_WRONG_CURRENCY = 12;
    /**
     * A money amount was less than the minimum CPC for currency.
     *
     * Generated from protobuf enum <code>MONEY_AMOUNT_LESS_THAN_CURRENCY_MINIMUM_CPC = 13;</code>
     */
    const MONEY_AMOUNT_LESS_THAN_CURRENCY_MINIMUM_CPC = 13;
    /**
     * A money amount was greater than the maximum allowed.
     *
     * Generated from protobuf enum <code>MONEY_AMOUNT_TOO_LARGE = 14;</code>
     */
    const MONEY_AMOUNT_TOO_LARGE = 14;
    /**
     * A money amount was negative.
     *
     * Generated from protobuf enum <code>NEGATIVE_MONEY_AMOUNT = 15;</code>
     */
    const NEGATIVE_MONEY_AMOUNT = 15;
    /**
     * A money amount was not a multiple of a minimum unit.
     *
     * Generated from protobuf enum <code>NON_MULTIPLE_OF_MINIMUM_CURRENCY_UNIT = 16;</code>
     */
    const NON_MULTIPLE_OF_MINIMUM_CURRENCY_UNIT = 16;
    /**
     * Total budget amount must be unset when BudgetPeriod is DAILY.
     *
     * Generated from protobuf enum <code>TOTAL_BUDGET_AMOUNT_MUST_BE_UNSET_FOR_BUDGET_PERIOD_DAILY = 18;</code>
     */
    const TOTAL_BUDGET_AMOUNT_MUST_BE_UNSET_FOR_BUDGET_PERIOD_DAILY = 18;
    /**
     * The period of the budget is not allowed.
     *
     * Generated from protobuf enum <code>INVALID_PERIOD = 19;</code>
     */
    const INVALID_PERIOD = 19;
    /**
     * Cannot use accelerated delivery method on this budget.
     *
     * Generated from protobuf enum <code>CANNOT_USE_ACCELERATED_DELIVERY_MODE = 20;</code>
     */
    const CANNOT_USE_ACCELERATED_DELIVERY_MODE = 20;
    /**
     * Budget amount must be unset when BudgetPeriod is CUSTOM.
     *
     * Generated from protobuf enum <code>BUDGET_AMOUNT_MUST_BE_UNSET_FOR_CUSTOM_BUDGET_PERIOD = 21;</code>
     */
    const BUDGET_AMOUNT_MUST_BE_UNSET_FOR_CUSTOM_BUDGET_PERIOD = 21;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::CAMPAIGN_BUDGET_CANNOT_BE_SHARED => 'CAMPAIGN_BUDGET_CANNOT_BE_SHARED',
        self::CAMPAIGN_BUDGET_REMOVED => 'CAMPAIGN_BUDGET_REMOVED',
        self::CAMPAIGN_BUDGET_IN_USE => 'CAMPAIGN_BUDGET_IN_USE',
        self::CAMPAIGN_BUDGET_PERIOD_NOT_AVAILABLE => 'CAMPAIGN_BUDGET_PERIOD_NOT_AVAILABLE',
        self::CANNOT_MODIFY_FIELD_OF_IMPLICITLY_SHARED_CAMPAIGN_BUDGET => 'CANNOT_MODIFY_FIELD_OF_IMPLICITLY_SHARED_CAMPAIGN_BUDGET',
        self::CANNOT_UPDATE_CAMPAIGN_BUDGET_TO_IMPLICITLY_SHARED => 'CANNOT_UPDATE_CAMPAIGN_BUDGET_TO_IMPLICITLY_SHARED',
        self::CANNOT_UPDATE_CAMPAIGN_BUDGET_TO_EXPLICITLY_SHARED_WITHOUT_NAME => 'CANNOT_UPDATE_CAMPAIGN_BUDGET_TO_EXPLICITLY_SHARED_WITHOUT_NAME',
        self::CANNOT_UPDATE_CAMPAIGN_BUDGET_TO_EXPLICITLY_SHARED => 'CANNOT_UPDATE_CAMPAIGN_BUDGET_TO_EXPLICITLY_SHARED',
        self::CANNOT_USE_IMPLICITLY_SHARED_CAMPAIGN_BUDGET_WITH_MULTIPLE_CAMPAIGNS => 'CANNOT_USE_IMPLICITLY_SHARED_CAMPAIGN_BUDGET_WITH_MULTIPLE_CAMPAIGNS',
        self::DUPLICATE_NAME => 'DUPLICATE_NAME',
        self::MONEY_AMOUNT_IN_WRONG_CURRENCY => 'MONEY_AMOUNT_IN_WRONG_CURRENCY',
        self::MONEY_AMOUNT_LESS_THAN_CURRENCY_MINIMUM_CPC => 'MONEY_AMOUNT_LESS_THAN_CURRENCY_MINIMUM_CPC',
        self::MONEY_AMOUNT_TOO_LARGE => 'MONEY_AMOUNT_TOO_LARGE',
        self::NEGATIVE_MONEY_AMOUNT => 'NEGATIVE_MONEY_AMOUNT',
        self::NON_MULTIPLE_OF_MINIMUM_CURRENCY_UNIT => 'NON_MULTIPLE_OF_MINIMUM_CURRENCY_UNIT',
        self::TOTAL_BUDGET_AMOUNT_MUST_BE_UNSET_FOR_BUDGET_PERIOD_DAILY => 'TOTAL_BUDGET_AMOUNT_MUST_BE_UNSET_FOR_BUDGET_PERIOD_DAILY',
        self::INVALID_PERIOD => 'INVALID_PERIOD',
        self::CANNOT_USE_ACCELERATED_DELIVERY_MODE => 'CANNOT_USE_ACCELERATED_DELIVERY_MODE',
        self::BUDGET_AMOUNT_MUST_BE_UNSET_FOR_CUSTOM_BUDGET_PERIOD => 'BUDGET_AMOUNT_MUST_BE_UNSET_FOR_CUSTOM_BUDGET_PERIOD',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CampaignBudgetError::class, \Google\Ads\GoogleAds\V20\Errors\CampaignBudgetErrorEnum_CampaignBudgetError::class);

