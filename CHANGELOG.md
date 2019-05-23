## 1.3.0
*   Added support for v1_3 of Google Ads API.
*   Added examples for ad parameters, campaign labels and media upload and retrieval.

## 1.2.0

*   Added support for v1_2 of Google Ads API.
*   Added utility functions to convert enum names to integer values and vice versa.
*   Added convenience functions for automatic unboxing of protobuf values, e.g. `getNameValue` along
    with the existing `getName`.
*   Added an example on campaign management migration from the legacy AdWords API.

## 1.1.0

*   Added support for v1_1 of Google Ads API.
*   Upgraded PHPUnit dependency to v7.5.
*   Added support for partial failures and matching example.

## 1.0.0

*   Added support and examples for v1_0 of Google Ads API.
*   Updated some dependencies, e.g., google/gax 0.38.0 and ulrichsg/getopt-php 3.2.2.
*   Updated some examples to match the new API specifications, e.g., GetHotelAdsPerformance.
*   Fixed a bug that prevented the login-customer-id header from being sent.

## 0.7.0

*   Added support and examples for v0_7 of Google Ads API.
*   Updated some examples to match the new API specifications, e.g., ApplyRecommendation,
    DismissRecommendation, GetKeywordStats, AddCampaignBidModifier.
*   Added GetHotelAdsPerformance example.
*   Removed AddCampaignGroup example.

## 0.6.0

*   Added support and examples for v0_6 of Google Ads API.
*   Added support for passing log-in customer ID with API requests.
*   Updated some examples to match the new API specifications, e.g.,
    ApplyRecommendations.php, GetGeoTargetConstantByNames.php.
*   Updated AddCampaignTargetingCriteria example to show how to include
    proximity targeting.

## 0.5.0

*   Added support and examples for v0_5 of Google Ads API.
*   Added campaign targeting criteria examples.
*   Added an account budget example.
*   Added Shopping campaign examples.
*   Added an account change example.

## 0.4.0

*   Added support and examples for v0_4 of Google Ads API.
*   Added account budget proposal and billing setup examples.
*   Added conversion action examples.
*   Added an example showing how to retrieve disapproved ads.

## 0.3.0

*   Added support and examples for V0_3 of Google Ads API.
*   Updated GetArtifactMetadata to quote the name param value.
*   Updated examples to initialize properties via constructors instead of
    setters.
*   Added examples showing how to add and get ad group bid modifiers.
*   Added an example showing how to create and attach shared keyword sets.
*   Added an example showing how to remove shared set criteria.
*   Updated hotel ad group bid modifier example with v0_3 criteria changes.
*   Added AddCampaignBidModifier example.

## 0.2.0

*   Added support for V0_2 of Google Ads API, which includes the Percent CPC
    bidding strategy.

## 0.1.0

*   Initial release with support for V0_1 of Google Ads API.
