<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/local_services_lead_survey_dissatisfied_reason.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Enums;

class LocalServicesLeadSurveyDissatisfiedReason
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
Sgoogle/ads/googleads/v19/enums/local_services_lead_survey_dissatisfied_reason.protogoogle.ads.googleads.v19.enums"�
-LocalServicesLeadSurveyDissatisfiedReasonEnum"�
SurveyDissatisfiedReason
UNSPECIFIED 
UNKNOWN
OTHER_DISSATISFIED_REASON
GEO_MISMATCH
JOB_TYPE_MISMATCH
NOT_READY_TO_BOOK
SPAM
	DUPLICATE
SOLICITATIONB�
"com.google.ads.googleads.v19.enumsB.LocalServicesLeadSurveyDissatisfiedReasonProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

