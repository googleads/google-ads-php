<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/services/campaign_experiment_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V10\Services;

class CampaignExperimentService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Protobuf\GPBEmpty::initOnce();
        \GPBMetadata\Google\Longrunning\Operations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
?google/ads/googleads/v10/enums/campaign_experiment_status.protogoogle.ads.googleads.v10.enums"�
CampaignExperimentStatusEnum"�
CampaignExperimentStatus
UNSPECIFIED 
UNKNOWN
INITIALIZING
INITIALIZATION_FAILED
ENABLED
	GRADUATED
REMOVED
	PROMOTING
PROMOTION_FAILED	
PROMOTED
ENDED_MANUALLY
B�
"com.google.ads.googleads.v10.enumsBCampaignExperimentStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3
�
Kgoogle/ads/googleads/v10/enums/campaign_experiment_traffic_split_type.protogoogle.ads.googleads.v10.enums"�
&CampaignExperimentTrafficSplitTypeEnum"`
"CampaignExperimentTrafficSplitType
UNSPECIFIED 
UNKNOWN
RANDOM_QUERY

COOKIEB�
"com.google.ads.googleads.v10.enumsB\'CampaignExperimentTrafficSplitTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3
�
:google/ads/googleads/v10/enums/response_content_type.protogoogle.ads.googleads.v10.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v10.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3
�
<google/ads/googleads/v10/resources/campaign_experiment.proto"google.ads.googleads.v10.resourcesKgoogle/ads/googleads/v10/enums/campaign_experiment_traffic_split_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
CampaignExperimentJ
resource_name (	B3�A�A-
+googleads.googleapis.com/CampaignExperiment
id (B�AH �K
campaign_draft (	B.�A�A(
&googleads.googleapis.com/CampaignDraftH�
name (	H�
description (	H�\'
traffic_split_percent (B�AH��
traffic_split_type (2i.google.ads.googleads.v10.enums.CampaignExperimentTrafficSplitTypeEnum.CampaignExperimentTrafficSplitTypeB�AK
experiment_campaign (	B)�A�A#
!googleads.googleapis.com/CampaignH�j
status	 (2U.google.ads.googleads.v10.enums.CampaignExperimentStatusEnum.CampaignExperimentStatusB�A(
long_running_operation (	B�AH�

start_date (	H�
end_date (	H�:v�As
+googleads.googleapis.com/CampaignExperimentDcustomers/{customer_id}/campaignExperiments/{campaign_experiment_id}B
_idB
_campaign_draftB
_nameB
_descriptionB
_traffic_split_percentB
_experiment_campaignB
_long_running_operationB
_start_dateB
	_end_dateB�
&com.google.ads.googleads.v10.resourcesBCampaignExperimentProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v10/resources;resources�GAA�"Google.Ads.GoogleAds.V10.Resources�"Google\\Ads\\GoogleAds\\V10\\Resources�&Google::Ads::GoogleAds::V10::Resourcesbproto3
�"
Cgoogle/ads/googleads/v10/services/campaign_experiment_service.proto!google.ads.googleads.v10.services<google/ads/googleads/v10/resources/campaign_experiment.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto#google/longrunning/operations.protogoogle/protobuf/empty.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"�
 MutateCampaignExperimentsRequest
customer_id (	B�AW

operations (2>.google.ads.googleads.v10.services.CampaignExperimentOperationB�A
partial_failure (
validate_only (j
response_content_type (2K.google.ads.googleads.v10.enums.ResponseContentTypeEnum.ResponseContentType"�
CampaignExperimentOperation/
update_mask (2.google.protobuf.FieldMaskH
update (26.google.ads.googleads.v10.resources.CampaignExperimentH B
remove (	B0�A-
+googleads.googleapis.com/CampaignExperimentH B
	operation"�
!MutateCampaignExperimentsResponse1
partial_failure_error (2.google.rpc.StatusR
results (2A.google.ads.googleads.v10.services.MutateCampaignExperimentResult"�
MutateCampaignExperimentResultG
resource_name (	B0�A-
+googleads.googleapis.com/CampaignExperimentS
campaign_experiment (26.google.ads.googleads.v10.resources.CampaignExperiment"�
CreateCampaignExperimentRequest
customer_id (	B�AX
campaign_experiment (26.google.ads.googleads.v10.resources.CampaignExperimentB�A
validate_only ("?
 CreateCampaignExperimentMetadata
campaign_experiment (	"�
!GraduateCampaignExperimentRequestP
campaign_experiment (	B3�A�A-
+googleads.googleapis.com/CampaignExperiment
campaign_budget (	B�A
validate_only ("@
"GraduateCampaignExperimentResponse
graduated_campaign (	"�
 PromoteCampaignExperimentRequestP
campaign_experiment (	B3�A�A-
+googleads.googleapis.com/CampaignExperiment
validate_only ("�
EndCampaignExperimentRequestP
campaign_experiment (	B3�A�A-
+googleads.googleapis.com/CampaignExperiment
validate_only ("�
(ListCampaignExperimentAsyncErrorsRequestJ
resource_name (	B3�A�A-
+googleads.googleapis.com/CampaignExperiment

page_token (	
	page_size ("h
)ListCampaignExperimentAsyncErrorsResponse"
errors (2.google.rpc.Status
next_page_token (	2�
CampaignExperimentService�
CreateCampaignExperimentB.google.ads.googleads.v10.services.CreateCampaignExperimentRequest.google.longrunning.Operation"����>"9/v10/customers/{customer_id=*}/campaignExperiments:create:*�Acustomer_id,campaign_experiment�A[
google.protobuf.EmptyBgoogle.ads.googleads.v10.services.CreateCampaignExperimentMetadata�
MutateCampaignExperimentsC.google.ads.googleads.v10.services.MutateCampaignExperimentsRequestD.google.ads.googleads.v10.services.MutateCampaignExperimentsResponse"]���>"9/v10/customers/{customer_id=*}/campaignExperiments:mutate:*�Acustomer_id,operations�
GraduateCampaignExperimentD.google.ads.googleads.v10.services.GraduateCampaignExperimentRequestE.google.ads.googleads.v10.services.GraduateCampaignExperimentResponse"v���J"E/v10/{campaign_experiment=customers/*/campaignExperiments/*}:graduate:*�A#campaign_experiment,campaign_budget�
PromoteCampaignExperimentC.google.ads.googleads.v10.services.PromoteCampaignExperimentRequest.google.longrunning.Operation"����I"D/v10/{campaign_experiment=customers/*/campaignExperiments/*}:promote:*�Acampaign_experiment�A.
google.protobuf.Emptygoogle.protobuf.Empty�
EndCampaignExperiment?.google.ads.googleads.v10.services.EndCampaignExperimentRequest.google.protobuf.Empty"a���E"@/v10/{campaign_experiment=customers/*/campaignExperiments/*}:end:*�Acampaign_experiment�
!ListCampaignExperimentAsyncErrorsK.google.ads.googleads.v10.services.ListCampaignExperimentAsyncErrorsRequestL.google.ads.googleads.v10.services.ListCampaignExperimentAsyncErrorsResponse"^���HF/v10/{resource_name=customers/*/campaignExperiments/*}:listAsyncErrors�Aresource_nameE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v10.servicesBCampaignExperimentServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v10/services;services�GAA�!Google.Ads.GoogleAds.V10.Services�!Google\\Ads\\GoogleAds\\V10\\Services�%Google::Ads::GoogleAds::V10::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

