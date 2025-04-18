<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/customer_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Services;

class CustomerService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
4google/ads/googleads/v19/enums/customer_status.protogoogle.ads.googleads.v19.enums"z
CustomerStatusEnum"d
CustomerStatus
UNSPECIFIED 
UNKNOWN
ENABLED
CANCELED
	SUSPENDED

CLOSEDB�
"com.google.ads.googleads.v19.enumsBCustomerStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
0google/ads/googleads/v19/enums/access_role.protogoogle.ads.googleads.v19.enums"t
AccessRoleEnum"b

AccessRole
UNSPECIFIED 
UNKNOWN	
ADMIN
STANDARD
	READ_ONLY

EMAIL_ONLYB�
"com.google.ads.googleads.v19.enumsBAccessRoleProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
:google/ads/googleads/v19/enums/response_content_type.protogoogle.ads.googleads.v19.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v19.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
[google/ads/googleads/v19/enums/customer_pay_per_conversion_eligibility_failure_reason.protogoogle.ads.googleads.v19.enums"�
4CustomerPayPerConversionEligibilityFailureReasonEnum"�
0CustomerPayPerConversionEligibilityFailureReason
UNSPECIFIED 
UNKNOWN
NOT_ENOUGH_CONVERSIONS
CONVERSION_LAG_TOO_HIGH#
HAS_CAMPAIGN_WITH_SHARED_BUDGET 
HAS_UPLOAD_CLICKS_CONVERSION 
AVERAGE_DAILY_SPEND_TOO_HIGH
ANALYSIS_NOT_COMPLETE	
OTHERB�
"com.google.ads.googleads.v19.enumsB5CustomerPayPerConversionEligibilityFailureReasonProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
=google/ads/googleads/v19/enums/brand_safety_suitability.protogoogle.ads.googleads.v19.enums"�
BrandSafetySuitabilityEnum"}
BrandSafetySuitability
UNSPECIFIED 
UNKNOWN
EXPANDED_INVENTORY
STANDARD_INVENTORY
LIMITED_INVENTORYB�
"com.google.ads.googleads.v19.enumsBBrandSafetySuitabilityProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
Ggoogle/ads/googleads/v19/enums/local_services_verification_status.protogoogle.ads.googleads.v19.enums"�
#LocalServicesVerificationStatusEnum"�
LocalServicesVerificationStatus
UNSPECIFIED 
UNKNOWN
NEEDS_REVIEW

FAILED

PASSED
NOT_APPLICABLE
NO_SUBMISSION
PARTIAL_SUBMISSION
PENDING_ESCALATIONB�
"com.google.ads.googleads.v19.enumsB$LocalServicesVerificationStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
Dgoogle/ads/googleads/v19/enums/conversion_tracking_status_enum.protogoogle.ads.googleads.v19.enums"�
ConversionTrackingStatusEnum"�
ConversionTrackingStatus
UNSPECIFIED 
UNKNOWN
NOT_CONVERSION_TRACKED\'
#CONVERSION_TRACKING_MANAGED_BY_SELF/
+CONVERSION_TRACKING_MANAGED_BY_THIS_MANAGER2
.CONVERSION_TRACKING_MANAGED_BY_ANOTHER_MANAGERB�
"com.google.ads.googleads.v19.enumsB!ConversionTrackingStatusEnumProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�"
1google/ads/googleads/v19/resources/customer.proto"google.ads.googleads.v19.resourcesDgoogle/ads/googleads/v19/enums/conversion_tracking_status_enum.proto[google/ads/googleads/v19/enums/customer_pay_per_conversion_eligibility_failure_reason.proto4google/ads/googleads/v19/enums/customer_status.protoGgoogle/ads/googleads/v19/enums/local_services_verification_status.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
Customer@
resource_name (	B)�A�A#
!googleads.googleapis.com/Customer
id (B�AH �
descriptive_name (	H�
currency_code (	B�AH�
	time_zone (	B�AH�"
tracking_url_template (	H�
final_url_suffix (	H�!
auto_tagging_enabled (H�$
has_partners_badge (B�AH�
manager (B�AH�
test_account (B�AH	�X
call_reporting_setting
 (28.google.ads.googleads.v19.resources.CallReportingSettingg
conversion_tracking_setting (2=.google.ads.googleads.v19.resources.ConversionTrackingSettingB�AX
remarketing_setting (26.google.ads.googleads.v19.resources.RemarketingSettingB�A�
.pay_per_conversion_eligibility_failure_reasons (2�.google.ads.googleads.v19.enums.CustomerPayPerConversionEligibilityFailureReasonEnum.CustomerPayPerConversionEligibilityFailureReasonB�A$
optimization_score (B�AH
�&
optimization_score_weight (B�AV
status$ (2A.google.ads.googleads.v19.enums.CustomerStatusEnum.CustomerStatusB�A4
"location_asset_auto_migration_done& (B�AH�1
image_asset_auto_migration_done\' (B�AH�>
,location_asset_auto_migration_done_date_time( (	B�AH�;
)image_asset_auto_migration_done_date_time) (	B�AH�e
customer_agreement_setting, (2<.google.ads.googleads.v19.resources.CustomerAgreementSettingB�A_
local_services_settings- (29.google.ads.googleads.v19.resources.LocalServicesSettingsB�A~
video_brand_safety_suitability. (2Q.google.ads.googleads.v19.enums.BrandSafetySuitabilityEnum.BrandSafetySuitabilityB�A:?�A<
!googleads.googleapis.com/Customercustomers/{customer_id}B
_idB
_descriptive_nameB
_currency_codeB

_time_zoneB
_tracking_url_templateB
_final_url_suffixB
_auto_tagging_enabledB
_has_partners_badgeB

_managerB
_test_accountB
_optimization_scoreB%
#_location_asset_auto_migration_doneB"
 _image_asset_auto_migration_doneB/
-_location_asset_auto_migration_done_date_timeB,
*_image_asset_auto_migration_done_date_time"�
CallReportingSetting#
call_reporting_enabled
 (H �.
!call_conversion_reporting_enabled (H�S
call_conversion_action (	B.�A+
)googleads.googleapis.com/ConversionActionH�B
_call_reporting_enabledB$
"_call_conversion_reporting_enabledB
_call_conversion_action"�
ConversionTrackingSetting(
conversion_tracking_id (B�AH �6
$cross_account_conversion_tracking_id (B�AH�)
accepted_customer_data_terms (B�A~
conversion_tracking_status (2U.google.ads.googleads.v19.enums.ConversionTrackingStatusEnum.ConversionTrackingStatusB�A3
&enhanced_conversions_for_leads_enabled (B�A+
google_ads_conversion_customer (	B�AB
_conversion_tracking_idB\'
%_cross_account_conversion_tracking_id"Y
RemarketingSetting(
google_global_site_tag (	B�AH �B
_google_global_site_tag"A
CustomerAgreementSetting%
accepted_lead_form_terms (B�A"�
LocalServicesSettingsa
granular_license_statuses (29.google.ads.googleads.v19.resources.GranularLicenseStatusB�Ae
granular_insurance_statuses (2;.google.ads.googleads.v19.resources.GranularInsuranceStatusB�A"�
GranularLicenseStatus"
geo_criterion_id (B�AH �
category_id (	B�AH��
verification_status (2c.google.ads.googleads.v19.enums.LocalServicesVerificationStatusEnum.LocalServicesVerificationStatusB�AH�B
_geo_criterion_idB
_category_idB
_verification_status"�
GranularInsuranceStatus"
geo_criterion_id (B�AH �
category_id (	B�AH��
verification_status (2c.google.ads.googleads.v19.enums.LocalServicesVerificationStatusEnum.LocalServicesVerificationStatusB�AH�B
_geo_criterion_idB
_category_idB
_verification_statusB�
&com.google.ads.googleads.v19.resourcesBCustomerProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3
�
8google/ads/googleads/v19/services/customer_service.proto!google.ads.googleads.v19.services:google/ads/googleads/v19/enums/response_content_type.proto1google/ads/googleads/v19/resources/customer.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.proto"�
MutateCustomerRequest
customer_id (	B�AL
	operation (24.google.ads.googleads.v19.services.CustomerOperationB�A
validate_only (j
response_content_type (2K.google.ads.googleads.v19.enums.ResponseContentTypeEnum.ResponseContentType"�
CreateCustomerClientRequest
customer_id (	B�AJ
customer_client (2,.google.ads.googleads.v19.resources.CustomerB�A
email_address (	H �N
access_role (29.google.ads.googleads.v19.enums.AccessRoleEnum.AccessRole
validate_only (B
_email_address"�
CustomerOperation<
update (2,.google.ads.googleads.v19.resources.Customer/
update_mask (2.google.protobuf.FieldMask"v
CreateCustomerClientResponse=
resource_name (	B&�A#
!googleads.googleapis.com/Customer
invitation_link (	"a
MutateCustomerResponseG
result (27.google.ads.googleads.v19.services.MutateCustomerResult"�
MutateCustomerResult=
resource_name (	B&�A#
!googleads.googleapis.com/Customer>
customer (2,.google.ads.googleads.v19.resources.Customer" 
ListAccessibleCustomersRequest"9
ListAccessibleCustomersResponse
resource_names (	2�
CustomerService�
MutateCustomer8.google.ads.googleads.v19.services.MutateCustomerRequest9.google.ads.googleads.v19.services.MutateCustomerResponse"H�Acustomer_id,operation���*"%/v19/customers/{customer_id=*}:mutate:*�
ListAccessibleCustomersA.google.ads.googleads.v19.services.ListAccessibleCustomersRequestB.google.ads.googleads.v19.services.ListAccessibleCustomersResponse".���(&/v19/customers:listAccessibleCustomers�
CreateCustomerClient>.google.ads.googleads.v19.services.CreateCustomerClientRequest?.google.ads.googleads.v19.services.CreateCustomerClientResponse"\\�Acustomer_id,customer_client���8"3/v19/customers/{customer_id=*}:createCustomerClient:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v19.servicesBCustomerServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v19/services;services�GAA�!Google.Ads.GoogleAds.V19.Services�!Google\\Ads\\GoogleAds\\V19\\Services�%Google::Ads::GoogleAds::V19::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

