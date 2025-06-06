<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/conversion_or_adjustment_lag_bucket.proto

namespace Google\Ads\GoogleAds\V20\Enums\ConversionOrAdjustmentLagBucketEnum;

use UnexpectedValueException;

/**
 * Enum representing the number of days between the impression and the
 * conversion or between the impression and adjustments to the conversion.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.ConversionOrAdjustmentLagBucketEnum.ConversionOrAdjustmentLagBucket</code>
 */
class ConversionOrAdjustmentLagBucket
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
     * Conversion lag bucket from 0 to 1 day. 0 day is included, 1 day is not.
     *
     * Generated from protobuf enum <code>CONVERSION_LESS_THAN_ONE_DAY = 2;</code>
     */
    const CONVERSION_LESS_THAN_ONE_DAY = 2;
    /**
     * Conversion lag bucket from 1 to 2 days. 1 day is included, 2 days is not.
     *
     * Generated from protobuf enum <code>CONVERSION_ONE_TO_TWO_DAYS = 3;</code>
     */
    const CONVERSION_ONE_TO_TWO_DAYS = 3;
    /**
     * Conversion lag bucket from 2 to 3 days. 2 days is included,
     * 3 days is not.
     *
     * Generated from protobuf enum <code>CONVERSION_TWO_TO_THREE_DAYS = 4;</code>
     */
    const CONVERSION_TWO_TO_THREE_DAYS = 4;
    /**
     * Conversion lag bucket from 3 to 4 days. 3 days is included,
     * 4 days is not.
     *
     * Generated from protobuf enum <code>CONVERSION_THREE_TO_FOUR_DAYS = 5;</code>
     */
    const CONVERSION_THREE_TO_FOUR_DAYS = 5;
    /**
     * Conversion lag bucket from 4 to 5 days. 4 days is included,
     * 5 days is not.
     *
     * Generated from protobuf enum <code>CONVERSION_FOUR_TO_FIVE_DAYS = 6;</code>
     */
    const CONVERSION_FOUR_TO_FIVE_DAYS = 6;
    /**
     * Conversion lag bucket from 5 to 6 days. 5 days is included,
     * 6 days is not.
     *
     * Generated from protobuf enum <code>CONVERSION_FIVE_TO_SIX_DAYS = 7;</code>
     */
    const CONVERSION_FIVE_TO_SIX_DAYS = 7;
    /**
     * Conversion lag bucket from 6 to 7 days. 6 days is included,
     * 7 days is not.
     *
     * Generated from protobuf enum <code>CONVERSION_SIX_TO_SEVEN_DAYS = 8;</code>
     */
    const CONVERSION_SIX_TO_SEVEN_DAYS = 8;
    /**
     * Conversion lag bucket from 7 to 8 days. 7 days is included,
     * 8 days is not.
     *
     * Generated from protobuf enum <code>CONVERSION_SEVEN_TO_EIGHT_DAYS = 9;</code>
     */
    const CONVERSION_SEVEN_TO_EIGHT_DAYS = 9;
    /**
     * Conversion lag bucket from 8 to 9 days. 8 days is included,
     * 9 days is not.
     *
     * Generated from protobuf enum <code>CONVERSION_EIGHT_TO_NINE_DAYS = 10;</code>
     */
    const CONVERSION_EIGHT_TO_NINE_DAYS = 10;
    /**
     * Conversion lag bucket from 9 to 10 days. 9 days is included,
     * 10 days is not.
     *
     * Generated from protobuf enum <code>CONVERSION_NINE_TO_TEN_DAYS = 11;</code>
     */
    const CONVERSION_NINE_TO_TEN_DAYS = 11;
    /**
     * Conversion lag bucket from 10 to 11 days. 10 days is included,
     * 11 days is not.
     *
     * Generated from protobuf enum <code>CONVERSION_TEN_TO_ELEVEN_DAYS = 12;</code>
     */
    const CONVERSION_TEN_TO_ELEVEN_DAYS = 12;
    /**
     * Conversion lag bucket from 11 to 12 days. 11 days is included,
     * 12 days is not.
     *
     * Generated from protobuf enum <code>CONVERSION_ELEVEN_TO_TWELVE_DAYS = 13;</code>
     */
    const CONVERSION_ELEVEN_TO_TWELVE_DAYS = 13;
    /**
     * Conversion lag bucket from 12 to 13 days. 12 days is included,
     * 13 days is not.
     *
     * Generated from protobuf enum <code>CONVERSION_TWELVE_TO_THIRTEEN_DAYS = 14;</code>
     */
    const CONVERSION_TWELVE_TO_THIRTEEN_DAYS = 14;
    /**
     * Conversion lag bucket from 13 to 14 days. 13 days is included,
     * 14 days is not.
     *
     * Generated from protobuf enum <code>CONVERSION_THIRTEEN_TO_FOURTEEN_DAYS = 15;</code>
     */
    const CONVERSION_THIRTEEN_TO_FOURTEEN_DAYS = 15;
    /**
     * Conversion lag bucket from 14 to 21 days. 14 days is included,
     * 21 days is not.
     *
     * Generated from protobuf enum <code>CONVERSION_FOURTEEN_TO_TWENTY_ONE_DAYS = 16;</code>
     */
    const CONVERSION_FOURTEEN_TO_TWENTY_ONE_DAYS = 16;
    /**
     * Conversion lag bucket from 21 to 30 days. 21 days is included,
     * 30 days is not.
     *
     * Generated from protobuf enum <code>CONVERSION_TWENTY_ONE_TO_THIRTY_DAYS = 17;</code>
     */
    const CONVERSION_TWENTY_ONE_TO_THIRTY_DAYS = 17;
    /**
     * Conversion lag bucket from 30 to 45 days. 30 days is included,
     * 45 days is not.
     *
     * Generated from protobuf enum <code>CONVERSION_THIRTY_TO_FORTY_FIVE_DAYS = 18;</code>
     */
    const CONVERSION_THIRTY_TO_FORTY_FIVE_DAYS = 18;
    /**
     * Conversion lag bucket from 45 to 60 days. 45 days is included,
     * 60 days is not.
     *
     * Generated from protobuf enum <code>CONVERSION_FORTY_FIVE_TO_SIXTY_DAYS = 19;</code>
     */
    const CONVERSION_FORTY_FIVE_TO_SIXTY_DAYS = 19;
    /**
     * Conversion lag bucket from 60 to 90 days. 60 days is included,
     * 90 days is not.
     *
     * Generated from protobuf enum <code>CONVERSION_SIXTY_TO_NINETY_DAYS = 20;</code>
     */
    const CONVERSION_SIXTY_TO_NINETY_DAYS = 20;
    /**
     * Conversion adjustment lag bucket from 0 to 1 day. 0 day is included,
     * 1 day is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_LESS_THAN_ONE_DAY = 21;</code>
     */
    const ADJUSTMENT_LESS_THAN_ONE_DAY = 21;
    /**
     * Conversion adjustment lag bucket from 1 to 2 days. 1 day is included,
     * 2 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_ONE_TO_TWO_DAYS = 22;</code>
     */
    const ADJUSTMENT_ONE_TO_TWO_DAYS = 22;
    /**
     * Conversion adjustment lag bucket from 2 to 3 days. 2 days is included,
     * 3 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_TWO_TO_THREE_DAYS = 23;</code>
     */
    const ADJUSTMENT_TWO_TO_THREE_DAYS = 23;
    /**
     * Conversion adjustment lag bucket from 3 to 4 days. 3 days is included,
     * 4 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_THREE_TO_FOUR_DAYS = 24;</code>
     */
    const ADJUSTMENT_THREE_TO_FOUR_DAYS = 24;
    /**
     * Conversion adjustment lag bucket from 4 to 5 days. 4 days is included,
     * 5 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_FOUR_TO_FIVE_DAYS = 25;</code>
     */
    const ADJUSTMENT_FOUR_TO_FIVE_DAYS = 25;
    /**
     * Conversion adjustment lag bucket from 5 to 6 days. 5 days is included,
     * 6 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_FIVE_TO_SIX_DAYS = 26;</code>
     */
    const ADJUSTMENT_FIVE_TO_SIX_DAYS = 26;
    /**
     * Conversion adjustment lag bucket from 6 to 7 days. 6 days is included,
     * 7 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_SIX_TO_SEVEN_DAYS = 27;</code>
     */
    const ADJUSTMENT_SIX_TO_SEVEN_DAYS = 27;
    /**
     * Conversion adjustment lag bucket from 7 to 8 days. 7 days is included,
     * 8 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_SEVEN_TO_EIGHT_DAYS = 28;</code>
     */
    const ADJUSTMENT_SEVEN_TO_EIGHT_DAYS = 28;
    /**
     * Conversion adjustment lag bucket from 8 to 9 days. 8 days is included,
     * 9 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_EIGHT_TO_NINE_DAYS = 29;</code>
     */
    const ADJUSTMENT_EIGHT_TO_NINE_DAYS = 29;
    /**
     * Conversion adjustment lag bucket from 9 to 10 days. 9 days is included,
     * 10 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_NINE_TO_TEN_DAYS = 30;</code>
     */
    const ADJUSTMENT_NINE_TO_TEN_DAYS = 30;
    /**
     * Conversion adjustment lag bucket from 10 to 11 days. 10 days is included,
     * 11 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_TEN_TO_ELEVEN_DAYS = 31;</code>
     */
    const ADJUSTMENT_TEN_TO_ELEVEN_DAYS = 31;
    /**
     * Conversion adjustment lag bucket from 11 to 12 days. 11 days is included,
     * 12 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_ELEVEN_TO_TWELVE_DAYS = 32;</code>
     */
    const ADJUSTMENT_ELEVEN_TO_TWELVE_DAYS = 32;
    /**
     * Conversion adjustment lag bucket from 12 to 13 days. 12 days is included,
     * 13 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_TWELVE_TO_THIRTEEN_DAYS = 33;</code>
     */
    const ADJUSTMENT_TWELVE_TO_THIRTEEN_DAYS = 33;
    /**
     * Conversion adjustment lag bucket from 13 to 14 days. 13 days is included,
     * 14 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_THIRTEEN_TO_FOURTEEN_DAYS = 34;</code>
     */
    const ADJUSTMENT_THIRTEEN_TO_FOURTEEN_DAYS = 34;
    /**
     * Conversion adjustment lag bucket from 14 to 21 days. 14 days is included,
     * 21 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_FOURTEEN_TO_TWENTY_ONE_DAYS = 35;</code>
     */
    const ADJUSTMENT_FOURTEEN_TO_TWENTY_ONE_DAYS = 35;
    /**
     * Conversion adjustment lag bucket from 21 to 30 days. 21 days is included,
     * 30 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_TWENTY_ONE_TO_THIRTY_DAYS = 36;</code>
     */
    const ADJUSTMENT_TWENTY_ONE_TO_THIRTY_DAYS = 36;
    /**
     * Conversion adjustment lag bucket from 30 to 45 days. 30 days is included,
     * 45 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_THIRTY_TO_FORTY_FIVE_DAYS = 37;</code>
     */
    const ADJUSTMENT_THIRTY_TO_FORTY_FIVE_DAYS = 37;
    /**
     * Conversion adjustment lag bucket from 45 to 60 days. 45 days is included,
     * 60 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_FORTY_FIVE_TO_SIXTY_DAYS = 38;</code>
     */
    const ADJUSTMENT_FORTY_FIVE_TO_SIXTY_DAYS = 38;
    /**
     * Conversion adjustment lag bucket from 60 to 90 days. 60 days is included,
     * 90 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_SIXTY_TO_NINETY_DAYS = 39;</code>
     */
    const ADJUSTMENT_SIXTY_TO_NINETY_DAYS = 39;
    /**
     * Conversion adjustment lag bucket from 90 to 145 days. 90 days is
     * included, 145 days is not.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_NINETY_TO_ONE_HUNDRED_AND_FORTY_FIVE_DAYS = 40;</code>
     */
    const ADJUSTMENT_NINETY_TO_ONE_HUNDRED_AND_FORTY_FIVE_DAYS = 40;
    /**
     * Conversion lag bucket UNKNOWN. This is for dates before conversion lag
     * bucket was available in Google Ads.
     *
     * Generated from protobuf enum <code>CONVERSION_UNKNOWN = 41;</code>
     */
    const CONVERSION_UNKNOWN = 41;
    /**
     * Conversion adjustment lag bucket UNKNOWN. This is for dates before
     * conversion adjustment lag bucket was available in Google Ads.
     *
     * Generated from protobuf enum <code>ADJUSTMENT_UNKNOWN = 42;</code>
     */
    const ADJUSTMENT_UNKNOWN = 42;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::CONVERSION_LESS_THAN_ONE_DAY => 'CONVERSION_LESS_THAN_ONE_DAY',
        self::CONVERSION_ONE_TO_TWO_DAYS => 'CONVERSION_ONE_TO_TWO_DAYS',
        self::CONVERSION_TWO_TO_THREE_DAYS => 'CONVERSION_TWO_TO_THREE_DAYS',
        self::CONVERSION_THREE_TO_FOUR_DAYS => 'CONVERSION_THREE_TO_FOUR_DAYS',
        self::CONVERSION_FOUR_TO_FIVE_DAYS => 'CONVERSION_FOUR_TO_FIVE_DAYS',
        self::CONVERSION_FIVE_TO_SIX_DAYS => 'CONVERSION_FIVE_TO_SIX_DAYS',
        self::CONVERSION_SIX_TO_SEVEN_DAYS => 'CONVERSION_SIX_TO_SEVEN_DAYS',
        self::CONVERSION_SEVEN_TO_EIGHT_DAYS => 'CONVERSION_SEVEN_TO_EIGHT_DAYS',
        self::CONVERSION_EIGHT_TO_NINE_DAYS => 'CONVERSION_EIGHT_TO_NINE_DAYS',
        self::CONVERSION_NINE_TO_TEN_DAYS => 'CONVERSION_NINE_TO_TEN_DAYS',
        self::CONVERSION_TEN_TO_ELEVEN_DAYS => 'CONVERSION_TEN_TO_ELEVEN_DAYS',
        self::CONVERSION_ELEVEN_TO_TWELVE_DAYS => 'CONVERSION_ELEVEN_TO_TWELVE_DAYS',
        self::CONVERSION_TWELVE_TO_THIRTEEN_DAYS => 'CONVERSION_TWELVE_TO_THIRTEEN_DAYS',
        self::CONVERSION_THIRTEEN_TO_FOURTEEN_DAYS => 'CONVERSION_THIRTEEN_TO_FOURTEEN_DAYS',
        self::CONVERSION_FOURTEEN_TO_TWENTY_ONE_DAYS => 'CONVERSION_FOURTEEN_TO_TWENTY_ONE_DAYS',
        self::CONVERSION_TWENTY_ONE_TO_THIRTY_DAYS => 'CONVERSION_TWENTY_ONE_TO_THIRTY_DAYS',
        self::CONVERSION_THIRTY_TO_FORTY_FIVE_DAYS => 'CONVERSION_THIRTY_TO_FORTY_FIVE_DAYS',
        self::CONVERSION_FORTY_FIVE_TO_SIXTY_DAYS => 'CONVERSION_FORTY_FIVE_TO_SIXTY_DAYS',
        self::CONVERSION_SIXTY_TO_NINETY_DAYS => 'CONVERSION_SIXTY_TO_NINETY_DAYS',
        self::ADJUSTMENT_LESS_THAN_ONE_DAY => 'ADJUSTMENT_LESS_THAN_ONE_DAY',
        self::ADJUSTMENT_ONE_TO_TWO_DAYS => 'ADJUSTMENT_ONE_TO_TWO_DAYS',
        self::ADJUSTMENT_TWO_TO_THREE_DAYS => 'ADJUSTMENT_TWO_TO_THREE_DAYS',
        self::ADJUSTMENT_THREE_TO_FOUR_DAYS => 'ADJUSTMENT_THREE_TO_FOUR_DAYS',
        self::ADJUSTMENT_FOUR_TO_FIVE_DAYS => 'ADJUSTMENT_FOUR_TO_FIVE_DAYS',
        self::ADJUSTMENT_FIVE_TO_SIX_DAYS => 'ADJUSTMENT_FIVE_TO_SIX_DAYS',
        self::ADJUSTMENT_SIX_TO_SEVEN_DAYS => 'ADJUSTMENT_SIX_TO_SEVEN_DAYS',
        self::ADJUSTMENT_SEVEN_TO_EIGHT_DAYS => 'ADJUSTMENT_SEVEN_TO_EIGHT_DAYS',
        self::ADJUSTMENT_EIGHT_TO_NINE_DAYS => 'ADJUSTMENT_EIGHT_TO_NINE_DAYS',
        self::ADJUSTMENT_NINE_TO_TEN_DAYS => 'ADJUSTMENT_NINE_TO_TEN_DAYS',
        self::ADJUSTMENT_TEN_TO_ELEVEN_DAYS => 'ADJUSTMENT_TEN_TO_ELEVEN_DAYS',
        self::ADJUSTMENT_ELEVEN_TO_TWELVE_DAYS => 'ADJUSTMENT_ELEVEN_TO_TWELVE_DAYS',
        self::ADJUSTMENT_TWELVE_TO_THIRTEEN_DAYS => 'ADJUSTMENT_TWELVE_TO_THIRTEEN_DAYS',
        self::ADJUSTMENT_THIRTEEN_TO_FOURTEEN_DAYS => 'ADJUSTMENT_THIRTEEN_TO_FOURTEEN_DAYS',
        self::ADJUSTMENT_FOURTEEN_TO_TWENTY_ONE_DAYS => 'ADJUSTMENT_FOURTEEN_TO_TWENTY_ONE_DAYS',
        self::ADJUSTMENT_TWENTY_ONE_TO_THIRTY_DAYS => 'ADJUSTMENT_TWENTY_ONE_TO_THIRTY_DAYS',
        self::ADJUSTMENT_THIRTY_TO_FORTY_FIVE_DAYS => 'ADJUSTMENT_THIRTY_TO_FORTY_FIVE_DAYS',
        self::ADJUSTMENT_FORTY_FIVE_TO_SIXTY_DAYS => 'ADJUSTMENT_FORTY_FIVE_TO_SIXTY_DAYS',
        self::ADJUSTMENT_SIXTY_TO_NINETY_DAYS => 'ADJUSTMENT_SIXTY_TO_NINETY_DAYS',
        self::ADJUSTMENT_NINETY_TO_ONE_HUNDRED_AND_FORTY_FIVE_DAYS => 'ADJUSTMENT_NINETY_TO_ONE_HUNDRED_AND_FORTY_FIVE_DAYS',
        self::CONVERSION_UNKNOWN => 'CONVERSION_UNKNOWN',
        self::ADJUSTMENT_UNKNOWN => 'ADJUSTMENT_UNKNOWN',
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
class_alias(ConversionOrAdjustmentLagBucket::class, \Google\Ads\GoogleAds\V20\Enums\ConversionOrAdjustmentLagBucketEnum_ConversionOrAdjustmentLagBucket::class);

