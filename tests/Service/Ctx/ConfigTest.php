<?php

namespace Tests\Ctx\Service\Ctx;

use Tests\Ctx\TestCase;

class ConfigTest extends TestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
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
