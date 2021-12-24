腾讯云图像分析之图像搜索相关实战 DEMO

[查看腾讯云文档](https://cloud.tencent.com/document/api/865/63482)

## 思路理解

> 
> 1、创建图片库
> 
> 2、向图片库中上传图片
> 
> 3、搜索对应图片库中相似的图片，按照图片的相似度返回图片列表数据

## 步骤

### 安装

```shell
composer require tencentcloud/tencentcloud-sdk-php
```

[Github Repository](https://github.com/TencentCloud/tencentcloud-sdk-php)

### 调试接口

[https://cloud.tencent.com/document/api/865/63488](https://cloud.tencent.com/document/api/865/63488)

## 运行当前 DEMO

1、配置参数
```
SecretId【 tencentSearchImageService.php:19 】
SecretKey【 tencentSearchImageService.php:20 】
```

2、必须环境：`php version >= 7.0`

3、入口文件: `index.php`
