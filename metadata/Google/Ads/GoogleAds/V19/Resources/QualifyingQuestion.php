<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/qualifying_question.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Resources;

class QualifyingQuestion
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
�
<google/ads/googleads/v19/resources/qualifying_question.proto"google.ads.googleads.v19.resourcesgoogle/api/resource.proto"�
QualifyingQuestionJ
resource_name (	B3�A�A-
+googleads.googleapis.com/QualifyingQuestion#
qualifying_question_id (B�A
locale (	B�A
text (	B�A:^�A[
+googleads.googleapis.com/QualifyingQuestion,qualifyingQuestions/{qualifying_question_id}B�
&com.google.ads.googleads.v19.resourcesBQualifyingQuestionProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

