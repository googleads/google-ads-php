<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/user_lists.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * UserList of CRM users provided by the advertiser.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.CrmBasedUserListInfo</code>
 */
class CrmBasedUserListInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * A string that uniquely identifies a mobile application from which the data
     * was collected.
     * For iOS, the ID string is the 9 digit string that appears at the end of an
     * App Store URL (for example, "476943146" for "Flood-It! 2" whose App Store
     * link is http://itunes.apple.com/us/app/flood-it!-2/id476943146). For
     * Android, the ID string is the application's package name (for example,
     * "com.labpixies.colordrips" for "Color Drips" given Google Play link
     * https://play.google.com/store/apps/details?id=com.labpixies.colordrips).
     * Required when creating CrmBasedUserList for uploading mobile advertising
     * IDs.
     *
     * Generated from protobuf field <code>optional string app_id = 4;</code>
     */
    protected $app_id = null;
    /**
     * Matching key type of the list.
     * Mixed data types are not allowed on the same list.
     * This field is required for an ADD operation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.CustomerMatchUploadKeyTypeEnum.CustomerMatchUploadKeyType upload_key_type = 2;</code>
     */
    protected $upload_key_type = 0;
    /**
     * Data source of the list. Default value is FIRST_PARTY.
     * Only customers on the allow-list can create third-party sourced CRM lists.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.UserListCrmDataSourceTypeEnum.UserListCrmDataSourceType data_source_type = 3;</code>
     */
    protected $data_source_type = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $app_id
     *           A string that uniquely identifies a mobile application from which the data
     *           was collected.
     *           For iOS, the ID string is the 9 digit string that appears at the end of an
     *           App Store URL (for example, "476943146" for "Flood-It! 2" whose App Store
     *           link is http://itunes.apple.com/us/app/flood-it!-2/id476943146). For
     *           Android, the ID string is the application's package name (for example,
     *           "com.labpixies.colordrips" for "Color Drips" given Google Play link
     *           https://play.google.com/store/apps/details?id=com.labpixies.colordrips).
     *           Required when creating CrmBasedUserList for uploading mobile advertising
     *           IDs.
     *     @type int $upload_key_type
     *           Matching key type of the list.
     *           Mixed data types are not allowed on the same list.
     *           This field is required for an ADD operation.
     *     @type int $data_source_type
     *           Data source of the list. Default value is FIRST_PARTY.
     *           Only customers on the allow-list can create third-party sourced CRM lists.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\UserLists::initOnce();
        parent::__construct($data);
    }

    /**
     * A string that uniquely identifies a mobile application from which the data
     * was collected.
     * For iOS, the ID string is the 9 digit string that appears at the end of an
     * App Store URL (for example, "476943146" for "Flood-It! 2" whose App Store
     * link is http://itunes.apple.com/us/app/flood-it!-2/id476943146). For
     * Android, the ID string is the application's package name (for example,
     * "com.labpixies.colordrips" for "Color Drips" given Google Play link
     * https://play.google.com/store/apps/details?id=com.labpixies.colordrips).
     * Required when creating CrmBasedUserList for uploading mobile advertising
     * IDs.
     *
     * Generated from protobuf field <code>optional string app_id = 4;</code>
     * @return string
     */
    public function getAppId()
    {
        return isset($this->app_id) ? $this->app_id : '';
    }

    public function hasAppId()
    {
        return isset($this->app_id);
    }

    public function clearAppId()
    {
        unset($this->app_id);
    }

    /**
     * A string that uniquely identifies a mobile application from which the data
     * was collected.
     * For iOS, the ID string is the 9 digit string that appears at the end of an
     * App Store URL (for example, "476943146" for "Flood-It! 2" whose App Store
     * link is http://itunes.apple.com/us/app/flood-it!-2/id476943146). For
     * Android, the ID string is the application's package name (for example,
     * "com.labpixies.colordrips" for "Color Drips" given Google Play link
     * https://play.google.com/store/apps/details?id=com.labpixies.colordrips).
     * Required when creating CrmBasedUserList for uploading mobile advertising
     * IDs.
     *
     * Generated from protobuf field <code>optional string app_id = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setAppId($var)
    {
        GPBUtil::checkString($var, True);
        $this->app_id = $var;

        return $this;
    }

    /**
     * Matching key type of the list.
     * Mixed data types are not allowed on the same list.
     * This field is required for an ADD operation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.CustomerMatchUploadKeyTypeEnum.CustomerMatchUploadKeyType upload_key_type = 2;</code>
     * @return int
     */
    public function getUploadKeyType()
    {
        return $this->upload_key_type;
    }

    /**
     * Matching key type of the list.
     * Mixed data types are not allowed on the same list.
     * This field is required for an ADD operation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.CustomerMatchUploadKeyTypeEnum.CustomerMatchUploadKeyType upload_key_type = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setUploadKeyType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\CustomerMatchUploadKeyTypeEnum\CustomerMatchUploadKeyType::class);
        $this->upload_key_type = $var;

        return $this;
    }

    /**
     * Data source of the list. Default value is FIRST_PARTY.
     * Only customers on the allow-list can create third-party sourced CRM lists.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.UserListCrmDataSourceTypeEnum.UserListCrmDataSourceType data_source_type = 3;</code>
     * @return int
     */
    public function getDataSourceType()
    {
        return $this->data_source_type;
    }

    /**
     * Data source of the list. Default value is FIRST_PARTY.
     * Only customers on the allow-list can create third-party sourced CRM lists.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.UserListCrmDataSourceTypeEnum.UserListCrmDataSourceType data_source_type = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setDataSourceType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\UserListCrmDataSourceTypeEnum\UserListCrmDataSourceType::class);
        $this->data_source_type = $var;

        return $this;
    }

}

