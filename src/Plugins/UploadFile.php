<?php

namespace SebastianKennedy\LaravelFlySystemAliCloudOss\Plugins;

use League\Flysystem\Config;
use League\Flysystem\Plugin\AbstractPlugin;

class UploadFile extends AbstractPlugin
{
    public function getMethod()
    {
        return 'uploadFile';
    }

    public function handle($object, $filePath, array $config = [])
    {
        if (!method_exists($this->filesystem, 'getAdapter')) {
            return false;
        }

        if (!method_exists($this->filesystem->getAdapter(), 'uploadFile')) {
            return false;
        }
        $config = new Config($config);

        return $this->filesystem->getAdapter()->uploadFile($object, $filePath, $config);
    }
}