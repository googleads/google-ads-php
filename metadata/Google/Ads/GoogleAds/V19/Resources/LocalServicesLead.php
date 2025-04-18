<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/local_services_lead.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Resources;

class LocalServicesLead
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
=google/ads/googleads/v19/enums/local_services_lead_type.protogoogle.ads.googleads.v19.enums"o
LocalServicesLeadTypeEnum"R
LeadType
UNSPECIFIED 
UNKNOWN
MESSAGE

PHONE_CALL
BOOKINGB�
"com.google.ads.googleads.v19.enumsBLocalServicesLeadTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
?google/ads/googleads/v19/enums/local_services_lead_status.protogoogle.ads.googleads.v19.enums"�
LocalServicesLeadStatusEnum"�

LeadStatus
UNSPECIFIED 
UNKNOWN
NEW

ACTIVE

BOOKED
DECLINED
EXPIRED
DISABLED
CONSUMER_DECLINED
	WIPED_OUT	B�
"com.google.ads.googleads.v19.enumsBLocalServicesLeadStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
Egoogle/ads/googleads/v19/enums/local_services_lead_credit_state.protogoogle.ads.googleads.v19.enums"f
LocalServicesCreditStateEnum"F
CreditState
UNSPECIFIED 
UNKNOWN
PENDING
CREDITEDB�
"com.google.ads.googleads.v19.enumsB!LocalServicesLeadCreditStateProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
<google/ads/googleads/v19/resources/local_services_lead.proto"google.ads.googleads.v19.resources?google/ads/googleads/v19/enums/local_services_lead_status.proto=google/ads/googleads/v19/enums/local_services_lead_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
LocalServicesLeadI
resource_name (	B2�A�A,
*googleads.googleapis.com/LocalServicesLead
id (B�A
category_id (	B�A

service_id (	B�AP
contact_details (22.google.ads.googleads.v19.resources.ContactDetailsB�AZ
	lead_type (2B.google.ads.googleads.v19.enums.LocalServicesLeadTypeEnum.LeadTypeB�A`
lead_status (2F.google.ads.googleads.v19.enums.LocalServicesLeadStatusEnum.LeadStatusB�A
creation_date_time (	B�A
locale	 (	B�A@
note
 (2(.google.ads.googleads.v19.resources.NoteB�AH �
lead_charged (B�AS
credit_details (21.google.ads.googleads.v19.resources.CreditDetailsB�AH�$
lead_feedback_submitted (B�A:t�Aq
*googleads.googleapis.com/LocalServicesLeadCcustomers/{customer_id}/localServicesLeads/{local_services_lead_id}B
_noteB
_credit_details"[
ContactDetails
phone_number (	B�A
email (	B�A
consumer_name (	B�A"=
Note
edit_date_time (	B�A
description (	B�A"�
CreditDetailsc
credit_state (2H.google.ads.googleads.v19.enums.LocalServicesCreditStateEnum.CreditStateB�A/
"credit_state_last_update_date_time (	B�AB�
&com.google.ads.googleads.v19.resourcesBLocalServicesLeadProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

