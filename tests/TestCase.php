<?php

namespace Tests\Ctx;

class TestCase extends \PHPUnit_Framework_TestCase
{
    protected $ctx;

    /**
     * ctx测试目录 
     * @var $ctxTestsDir
     */
    protected $ctxTestsDir;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        //初始化用于测试的ctx单例对象
        $this->ctx = \Tree6bee\Ctx\Ctx::getInstance(dirname(__DIR__));

        $this->ctxTestsDir = dirname(__DIR__) . '/tests';
    }
}
