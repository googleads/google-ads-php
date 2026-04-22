<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2026 Google LLC
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.
//
namespace Google\Ads\GoogleAds\V24\Services;

/**
 * Proto file describing the YouTubeVideoUpload service.
 *
 * Service to manage YouTube video uploads.
 */
class YouTubeVideoUploadServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Uploads a video to Google-managed or advertiser owned (brand) YouTube
     * channel.
     * @param \Google\Ads\GoogleAds\V24\Services\CreateYouTubeVideoUploadRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Google\Ads\GoogleAds\V24\Services\CreateYouTubeVideoUploadResponse>
     */
    public function CreateYouTubeVideoUpload(\Google\Ads\GoogleAds\V24\Services\CreateYouTubeVideoUploadRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v24.services.YouTubeVideoUploadService/CreateYouTubeVideoUpload',
        $argument,
        ['\Google\Ads\GoogleAds\V24\Services\CreateYouTubeVideoUploadResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates YouTube video's metadata, but only for videos uploaded using this
     * API.
     * @param \Google\Ads\GoogleAds\V24\Services\UpdateYouTubeVideoUploadRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Google\Ads\GoogleAds\V24\Services\UpdateYouTubeVideoUploadResponse>
     */
    public function UpdateYouTubeVideoUpload(\Google\Ads\GoogleAds\V24\Services\UpdateYouTubeVideoUploadRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v24.services.YouTubeVideoUploadService/UpdateYouTubeVideoUpload',
        $argument,
        ['\Google\Ads\GoogleAds\V24\Services\UpdateYouTubeVideoUploadResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Removes YouTube videos uploaded using this API.
     * @param \Google\Ads\GoogleAds\V24\Services\RemoveYouTubeVideoUploadRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Google\Ads\GoogleAds\V24\Services\RemoveYouTubeVideoUploadResponse>
     */
    public function RemoveYouTubeVideoUpload(\Google\Ads\GoogleAds\V24\Services\RemoveYouTubeVideoUploadRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v24.services.YouTubeVideoUploadService/RemoveYouTubeVideoUpload',
        $argument,
        ['\Google\Ads\GoogleAds\V24\Services\RemoveYouTubeVideoUploadResponse', 'decode'],
        $metadata, $options);
    }

}
