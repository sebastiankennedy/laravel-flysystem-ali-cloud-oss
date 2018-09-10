<?php

namespace SebastianKennedy\LaravelFlySystemAliCloudOss\Tests;

use OSS\Core\OssException;
use OSS\OssClient;
use PHPUnit\Framework\TestCase;

class AliCloudOssAdapterTest  extends TestCase
{
    public function testNewOssClientWithInvalidAccessKeyId()
    {
        // 断言会抛出此异常类
        $this->expectException(OssException::class);

        // 断言异常消息
        $this->expectExceptionMessage("access key id is empty");

        // 实例化 OssClient
        new OssClient('', '', '');

        // 如果没有抛出异常，标记当前测试没有成功
        $this->fail("Failed to assert new oss client class throw exception with invalid access key id.");
    }

    public function testNewOssClientWithInvalidAccessKeySecret()
    {
        // 断言会抛出此异常类
        $this->expectException(OssException::class);

        // 断言异常消息
        $this->expectExceptionMessage("access key secret is empty");

        // 实例化 OssClient
        new OssClient('accessKeyId', '' ,'');

        // 如果没有抛出异常，标记当前测试没有成功
        $this->fail("Failed to assert new oss client class throw exception with invalid access key secret.");
    }

    public function testNewOssClientWithInvalidEndpoint()
    {
        // 断言会抛出此异常类
        $this->expectException(OssException::class);

        // 断言异常消息
        $this->expectExceptionMessage("endpoint is empty");

        // 实例化 OssClient
        new OssClient('accessKeyId', 'accessKeySecret', '');

        // 如果没有抛出异常，标记当前测试没有成功
        $this->fail("Failed to assert new oss client class throw exception with invalid endpoint.");
    }

    public function testNewOssClient()
    {
        // 实例化 OssClient
        $ossClient = new OssClient('accessKeyId', 'accessKeySecret','endpoint');

        // 断言对象
        $this->assertInstanceOf(OssClient::class, $ossClient, "oss client instance failed");
    }
}