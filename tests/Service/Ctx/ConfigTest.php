<?php

namespace Tests\Ctx\Service\Ctx;

use Ctx\Service\Ctx\Config;
use Tests\Ctx\TestCase;

class ConfigTest extends TestCase
{
    private $config;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        //初始化用于测试的config对象
        // echo realpath(__DIR__ . '/../../');exit;
        $this->config = new Config($this->ctxTestsDir . '/config');
    }

    public function testGetConfig()
    {
        //测试修改配置
        $this->config->setConfig('a@Ctx/main', 2);
        $this->assertEquals(2, $this->config->getConfig('a@Ctx/main'));
        //测试获取子配置
        $this->assertEquals(2, $this->config->getConfig('b.ba@Ctx/main'));
        //测试获取不存在的配置
        $this->assertEquals(3, $this->config->getConfig('b.bb@Ctx/main', 3));
    }

    public function testGetConfigWithCtx()
    {
        //普通配置
        $this->ctx->Ctx->setConf('security_path@Ctx/main', $this->ctxTestsDir . '/security');
        $this->assertEquals($this->ctxTestsDir . '/security', $this->ctx->Ctx->getConf('security_path@Ctx/main'));

        //security配置
        $this->assertEquals(6379, $this->ctx->Ctx->getSConf('default.port@redis'));
        $this->ctx->Ctx->setSConf('default.master.port@mysql', 3307);
        $this->assertEquals(3307, $this->ctx->Ctx->getSConf('default.master.port@mysql'));
        $this->assertEquals('127.0.0.1', $this->ctx->Ctx->getSConf('default.master.host@mysql'));

        //@todo rpc测试，mock
        // $this->assertEquals('Rpc:123', $this->ctx->Ctx->debug(123));
    }
}
