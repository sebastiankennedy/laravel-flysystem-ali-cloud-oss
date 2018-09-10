<h1 align="center"> :floppy_disk: laravel-flysystem-ali-cloud-oss </h1>

<p align="center">一个针对阿里云 OSS 的 Laravel Flysystem Adapter</p>

<p align="center">
[![Build Status](https://travis-ci.org/sebastiankennedy/laravel-flysystem-ali-cloud-oss.svg?branch=master)](https://travis-ci.org/sebastiankennedy/laravel-flysystem-ali-cloud-oss)
[![StyleCI](https://github.styleci.io/repos/148092914/shield?branch=master)](https://github.styleci.io/repos/148092914)
</p>

## 要求 - Requirement

- PHP >= 7.0
- Laravel >= 5.5

## 安装 - Installing

```shell
$ composer require sebastiankennedy/laravel-flysystem-ali-cloud-oss -vvv
```

## 使用 - Usage
1`.env`
```env
ALI_CLOUD_OSS_ACCESS_KEY_ID=accessKeyId
ALI_CLOUD_OSS_ACCESS_KEY_SECRET=accessKeySecret
ALI_CLOUD_OSS_ENDPOINT=endpoint
ALI_CLOUD_OSS_BUCKET=bucket
```

2 `filesystem.php`
```
'ali_cloud_oss' => [
    'driver' => 'ali_cloud_oss',
    'access_key_id' => env('ALI_CLOUD_OSS_ACCESS_KEY_ID'),
    'access_key_secret' => env('ALI_CLOUD_OSS_ACCESS_KEY_SECRET'),
    'endpoint' => env('ALI_CLOUD_OSS_ENDPOINT'),
    'bucket' => env('ALI_CLOUD_OSS_BUCKET'),
],
```
3 `usage`
```
$storage = \Storage->disk('ali_cloud_oss');
$storage->write($object, $path);
```

## License

MIT