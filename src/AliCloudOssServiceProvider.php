<?php

namespace SebastianKennedy\LaravelFlySystemAliCloudOss;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use OSS\OssClient;

class AliCloudOssServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        Storage::extend('ali_cloud_oss', function ($app, $config) {
            $accessKeyId = $config['access_key_id'];
            $accessKeySecret = $config['access_key_secret'];
            $endpoint = $config['endpoint'];
            $bucket = $config['bucket'];

            $client = new OssClient($accessKeyId, $accessKeySecret, $endpoint);
            $adapter = new AliCloudOssAdapter($client, $bucket);
            $fileSystem = new Filesystem($adapter);

            return $fileSystem;
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }
}
