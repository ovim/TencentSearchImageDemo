<?php
/**
 * @Descripttion:
 * @Author: ovim <ovimcloud@gmail.com>
 * @Date: 2021/12/24 3:04 下午
 */

require_once('tencentSearchImageService.php');

// 创建图片库
if (isset($_POST['createGroup'])) {
    (new tencentSearchImageService())->createGroup(
        (string) $_POST['region'],
        (string) $_POST['group_id'],
        (string) $_POST['group_name'],
        (int) $_POST['max_capacity'],
        (string) $_POST['brief'],
        (int) $_POST['max_qps'],
        (int) $_POST['group_type'],
    );
}

// 查询图片库
if (isset($_POST['describeGroups'])) {
    (new tencentSearchImageService())->describeGroups(
        (string) $_POST['region'],
        (int) $_POST['offset'],
        (int) $_POST['limit'],
        (string) $_POST['group_id']
    );
}

// 创建图片
if(isset($_POST['createImage']))
{
    $path="upload/".time().strrchr($_FILES['file']['name'],'.');   //设置图片的缓存路径

    if(is_uploaded_file($_FILES['file']['tmp_name']))
    {
        if(move_uploaded_file($_FILES['file']['tmp_name'],$path))
        {
            $imgBase64 = imgToBase64($path);

            (new tencentSearchImageService())->createImage(
                (string) $_POST['region'],
                (string) $_POST['group_id'],
                (string) $_POST['entity_id'],
                (string) $_POST['pic_name'],
                $imgBase64,
                (string) $_POST['custom_content'],
                (array) explode(',', $_POST['tags']),
            );
        }
    }
}

// 检索图片
if (isset($_POST['searchImage'])) {
    $path="upload/".time().strrchr($_FILES['file']['name'],'.');   //设置图片的缓存路径

    if(is_uploaded_file($_FILES['file']['tmp_name']))
    {
        if(move_uploaded_file($_FILES['file']['tmp_name'],$path))
        {
            $imgBase64 = imgToBase64($path);
            (new tencentSearchImageService())->searchImage(
                (string) $_POST['region'],
                (string) $_POST['group_id'],
                $imgBase64,
            );
        }
    }
}

/**
     * 获取图片的Base64编码(不支持url)
     *
     * @param string $img_file 传入本地图片地址
     *
     * @return string
     */
function imgToBase64(string $img_file): string
    {

        $img_base64 = '';
        if (file_exists($img_file)) {
            $app_img_file = $img_file; // 图片路径
            $img_info = getimagesize($app_img_file); // 取得图片的大小，类型等

            //echo '<pre>' . print_r($img_info, true) . '</pre><br>';
            $fp = fopen($app_img_file, "r"); // 图片是否可读权限

            if ($fp) {
                $filesize = filesize($app_img_file);
                $content = fread($fp, $filesize);
                $file_content = chunk_split(base64_encode($content)); // base64编码
                switch ($img_info[2]) {           //判读图片类型
                    case 1: $img_type = "gif";
                        break;
                    case 2: $img_type = "jpg";
                        break;
                    case 3: $img_type = "png";
                        break;
                }

                $img_base64 = 'data:image/' . $img_type . ';base64,' . $file_content;//合成图片的base64编码

            }
            fclose($fp);
        }

        return $img_base64; //返回图片的base64
    }

