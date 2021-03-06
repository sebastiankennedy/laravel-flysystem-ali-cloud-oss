<?php

namespace SebastianKennedy\LaravelFlySystemAliCloudOss;

use League\Flysystem\Config;
use League\Flysystem\Adapter\AbstractAdapter;
use OSS\Core\OssException;
use OSS\OssClient;

/**
 * Class AliCloudOssAdapter.
 */
class AliCloudOssAdapter extends AbstractAdapter
{
    /**
     * @var \OSS\OssClient
     */
    protected $ossClient;
    /**
     * @var string
     */
    protected $bucket;
    /**
     * @var array
     */
    protected $options = [];
    /**
     * @var array
     */
    protected static $mappingOptions = [
        'mimetype' => OssClient::OSS_CONTENT_TYPE,
        'size' => OssClient::OSS_LENGTH,
        'filename' => OssClient::OSS_CONTENT_DISPOSTION,
    ];

    /**
     * AliCloudOssAdapter constructor.
     *
     * @param OssClient $ossClient
     * @param string    $bucket
     *
     * @return mixed
     */
    public function __construct(OssClient $ossClient, string $bucket)
    {
        $this->ossClient = $ossClient;
        $this->bucket = $bucket;
    }

    /**
     * Upload a new file
     *
     * @param        $object
     * @param        $filePath
     * @param Config $config
     *
     * @return bool|null
     */
    public function uploadFile($object, $filePath, Config $config)
    {
        try {
            $config = $this->getOptionsFromConfig($config);
            $response = $this->ossClient->uploadFile($this->bucket, $object, $filePath, $config);

            return $response;
        } catch (OssException $e) {
            return false;
        }
    }

    /**
     * Get oss options from config
     *
     * @param Config $config
     *
     * @return array
     */
    public function getOptionsFromConfig(Config $config)
    {
        $options = $this->options;
        foreach (static::$mappingOptions as $option => $ossOption) {
            if (!$config->has($option)) {
                continue;
            }
            $options[$ossOption] = $config->get($option);
        }

        return $options;
    }

    /**
     * Write a new file.
     *
     * @param string $path
     * @param string $contents
     * @param Config $config Config object
     *
     * @return array|false false on failure file meta data on success
     */
    public function write($path, $contents, Config $config)
    {
        return true;
    }

    /**
     * Write a new file using a stream.
     *
     * @param string   $path
     * @param resource $resource
     * @param Config   $config Config object
     *
     * @return array|false false on failure file meta data on success
     */
    public function writeStream($path, $resource, Config $config)
    {
        return false;
    }

    /**
     * Update a file.
     *
     * @param string $path
     * @param string $contents
     * @param Config $config Config object
     *
     * @return array|false false on failure file meta data on success
     */
    public function update($path, $contents, Config $config)
    {
        return false;
    }

    /**
     * Update a file using a stream.
     *
     * @param string   $path
     * @param resource $resource
     * @param Config   $config Config object
     *
     * @return array|false false on failure file meta data on success
     */
    public function updateStream($path, $resource, Config $config)
    {
        return false;
    }

    /**
     * Rename a file.
     *
     * @param string $path
     * @param string $newpath
     *
     * @return bool
     */
    public function rename($path, $newpath)
    {
        return false;
    }

    /**
     * Copy a file.
     *
     * @param string $path
     * @param string $newpath
     *
     * @return bool
     */
    public function copy($path, $newpath)
    {
        return false;
    }

    /**
     * Delete a file.
     *
     * @param string $path
     *
     * @return bool
     */
    public function delete($path)
    {
        return false;
    }

    /**
     * Delete a directory.
     *
     * @param string $dirname
     *
     * @return bool
     */
    public function deleteDir($dirname)
    {
        return false;
    }

    /**
     * Create a directory.
     *
     * @param string $dirname directory name
     * @param Config $config
     *
     * @return array|false
     */
    public function createDir($dirname, Config $config)
    {
        return false;
    }

    /**
     * Set the visibility for a file.
     *
     * @param string $path
     * @param string $visibility
     *
     * @return array|false file meta data
     */
    public function setVisibility($path, $visibility)
    {
        return false;
    }

    /**
     * Check whether a file exists.
     *
     * @param string $path
     *
     * @return array|bool|null
     */
    public function has($path)
    {
        return false;
    }

    /**
     * Read a file.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function read($path)
    {
        return false;
    }

    /**
     * Read a file as a stream.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function readStream($path)
    {
        return false;
    }

    /**
     * List contents of a directory.
     *
     * @param string $directory
     * @param bool   $recursive
     *
     * @return array
     */
    public function listContents($directory = '', $recursive = false)
    {
        return [];
    }

    /**
     * Get all the meta data of a file or directory.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getMetadata($path)
    {
        return false;
    }

    /**
     * Get the size of a file.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getSize($path)
    {
        return false;
    }

    /**
     * Get the mimetype of a file.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getMimetype($path)
    {
        return false;
    }

    /**
     * Get the last modified time of a file as a timestamp.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getTimestamp($path)
    {
        return false;
    }

    /**
     * Get the visibility of a file.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getVisibility($path)
    {
        return false;
    }
}
