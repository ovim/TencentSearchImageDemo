<?php
/**
 * @Descripttion:
 * @Author: ovim <ovimcloud@gmail.com>
 * @Date: 2021/12/24 5:03 下午
 */

require_once 'vendor/autoload.php';
use TencentCloud\Common\Credential;
use TencentCloud\Common\Profile\ClientProfile;
use TencentCloud\Common\Profile\HttpProfile;
use TencentCloud\Common\Exception\TencentCloudSDKException;
use TencentCloud\Tiia\V20190529\TiiaClient;
use TencentCloud\Tiia\V20190529\Models\CreateGroupRequest;
use TencentCloud\Tiia\V20190529\Models\DescribeGroupsRequest;
use TencentCloud\Tiia\V20190529\Models\CreateImageRequest;
use TencentCloud\Tiia\V20190529\Models\SearchImageRequest;

const SecretId = '';
const SecretKey = '';

class tencentSearchImageService
{
    /**
     * 创建图片库
     *
     * @param string $region
     * @param string $groupId
     * @param string $groupName
     * @param int $maxCapacity
     * @param string $brief
     * @param int $maxQps
     * @param int $groupType
     */
    public function createGroup(string $region, string $groupId, string $groupName, int $maxCapacity, string $brief, int $maxQps, int $groupType) {

        try {

            $cred = new Credential(SecretId, SecretKey);
            $httpProfile = new HttpProfile();
            $httpProfile->setEndpoint("tiia.tencentcloudapi.com");

            $clientProfile = new ClientProfile();
            $clientProfile->setHttpProfile($httpProfile);
            $client = new TiiaClient($cred, $region, $clientProfile);

            $req = new CreateGroupRequest();

            $params = array(
                "GroupId" => $groupId,
                "GroupName" => $groupName,
                "MaxCapacity" => $maxCapacity,
                "Brief" => $brief,
                "MaxQps" => $maxQps,
                "GroupType" => $groupType
            );

            $req->fromJsonString(json_encode($params));

            $resp = $client->CreateGroup($req);

            self::pd($resp->toJsonString());
        }
        catch(TencentCloudSDKException $e) {
            self::pd($e);
        }

    }

    /**
     * 查询图片库
     *
     * @param string $region
     * @param int $offset
     * @param int $limit
     * @param string $groupId
     */
    public function describeGroups(string $region, int $offset, int $limit, string $groupId) {
        try {

            $cred = new Credential(SecretId, SecretKey);
            $httpProfile = new HttpProfile();
            $httpProfile->setEndpoint("tiia.tencentcloudapi.com");

            $clientProfile = new ClientProfile();
            $clientProfile->setHttpProfile($httpProfile);
            $client = new TiiaClient($cred, $region, $clientProfile);

            $req = new DescribeGroupsRequest();

            $params = array(
                'Offset' => $offset,
                'Limit' => $limit,
                'GroupId' => $groupId,
            );
            $req->fromJsonString(json_encode($params));

            $resp = $client->DescribeGroups($req);

            self::pd($resp->toJsonString());
        }
        catch(TencentCloudSDKException $e) {
            self::pd($e);
        }
    }

    /**
     * 创建图片
     *
     * @param string $region
     * @param string $groupId
     * @param string $entityId
     * @param string $picName
     * @param string $imageBase64
     * @param string $customContent
     * @param array $tags
     */
    public function createImage(string $region, string $groupId, string $entityId, string $picName, string $imageBase64, string $customContent, array $tags) {

        try {

            $cred = new Credential(SecretId, SecretKey);
            $httpProfile = new HttpProfile();
            $httpProfile->setEndpoint("tiia.tencentcloudapi.com");

            $clientProfile = new ClientProfile();
            $clientProfile->setHttpProfile($httpProfile);
            $client = new TiiaClient($cred, $region, $clientProfile);

            $req = new CreateImageRequest();

            $params = array(
                "GroupId" => $groupId,
                "EntityId" => $entityId,
                "PicName" => $picName,
                "ImageBase64" => $imageBase64,
                "CustomContent" => $customContent,
                // "Tags" => json_encode($tags),
            );
            $req->fromJsonString(json_encode($params));

            $resp = $client->CreateImage($req);

            self::pd($resp->toJsonString());
        }
        catch(TencentCloudSDKException $e) {
            self::pd($e);
        }
    }

    /**
     * 检索图片
     *
     * @param string $region
     * @param string $groupId
     * @param string $imageBase64
     */
    public function searchImage(string $region, string $groupId, string $imageBase64) {
        try {

            $cred = new Credential(SecretId, SecretKey);
            $httpProfile = new HttpProfile();
            $httpProfile->setEndpoint("tiia.tencentcloudapi.com");

            $clientProfile = new ClientProfile();
            $clientProfile->setHttpProfile($httpProfile);
            $client = new TiiaClient($cred, $region, $clientProfile);

            $req = new SearchImageRequest();

            $params = array(
                "GroupId" => $groupId,
                "ImageBase64" => $imageBase64
            );
            $req->fromJsonString(json_encode($params));

            $resp = $client->SearchImage($req);

            self::pd($resp->toJsonString());
        }
        catch(TencentCloudSDKException $e) {
            self::pd($e);
        }
    }

    /**
     * 辅助函数：打印
     *
     * @param $params
     */
    public static function pd($params) {
        echo "<pre>";
        print_r($params);
        die;
    }
}
