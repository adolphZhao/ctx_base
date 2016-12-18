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
        //配置测试
        $this->ctx->Ctx->setConf('security_path@Ctx/main', $this->ctxTestsDir . '/security');
        $this->assertEquals($this->ctxTestsDir . '/security', $this->ctx->Ctx->getConf('security_path@Ctx/main'));

        //@todo rpc测试，mock
        // $this->assertEquals('Rpc:123', $this->ctx->Ctx->debug(123));
    }
}
