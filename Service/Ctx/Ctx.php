<?php

namespace Ctx\Service\Ctx;

use Ctx\Basic\Ctx;
use Tree6bee\Support\Ctx\Config\Config;

/**
 * 模块接口声明文件
 * 备注：文件命名跟模块中的其他类不同，因为要防止模块声明类只能被实例化一次
 * 也就是只能用ctx->模块 来实例化，不能用loadC来实例化更多
 */
class CtxCtx extends Ctx
{
    /**
     * 配置对象
     * 私有化config属性，防止外部模块直接使用此属性调用(不通过Ctx中的方法)config子类的方法，
     * 如:$this->ctx->Ctx->config->getConfig()
     *
     * @var Config
     */
    private $config;

    /**
     * security 配置对象
     *
     * @var Config
     */
    private $sconfig;

    /**
     * 存储对象
     * 私有化storage属性
     *
     * @var Storage
     */
    private $storage;

    public function init()
    {
        // 如果为公有属性可以等效于直接赋值给ctx节点
        // $this->ctx->Ctx->config = new Config(__DIR__ . '/../../config');
        $this->config = new Config(__DIR__ . '/../../config');
        $this->sconfig = new Config($this->getConf('security_path@Ctx/main'));
        $this->storage = $this->loadC('Storage');
    }

    /*--- 配置相关 不建议使用 ---*/
    /**
     * 获取配置
     *
     * @deprecated 不建议使用
     * 建议使用 CtxModel 基础类中的 $this->getItem(avatar.url) 和 $this->getCItem(upload.host) 来获取app相关配置信息
     * @example    getConf('upload.ip@common/main')
     *
     * @param $item
     * @param mixed $default
     * @return mixed
     */
    public function getConf($item, $default = null)
    {
        return $this->config->getConfig($item, $default);
    }

    /**
     * 设置配置
     * @deprecated 不建议使用
     * @example setConf('upload.ip@common/main', '192.168.0.1');
     *
     * @param $item
     * @param mixed $config
     * @return void
     */
    public function setConf($item, $config = null)
    {
        $this->config->setConfig($item, $config);
    }

    /**
     * 获取安全配置，主要是数据库等配置信息
     *
     * @deprecated 不建议使用
     * @example    getSConf('default.master@mysql')
     *
     * @param $item
     * @param mixed $default
     * @return mixed
     */
    public function getSConf($item, $default = null)
    {
        return $this->sconfig->getConfig($item, $default);
    }

    /**
     * 设置安全配置
     * @deprecated 不建议使用
     *
     * @param $item
     * @param mixed $config
     * @return void
     */
    public function setSConf($item, $config = null)
    {
        $this->sconfig->setConfig($item, $config);
    }

    /*--- 存储相关 ---*/
    /**
     * 获取mysql
     */
    public function loadDB($database = 'default.master')
    {
        return $this->storage->mysql($database);
    }

    /**
     * 获取redis
     */
    public function loadRedis($redis = 'default')
    {
        return $this->storage->redis($redis = 'default');
    }

    /*---其它---*/
    /**
     * @deprecated 调试代码
     */
    protected $rpc = array(
        'host'      => 'http://ctx.sh7ne.dev/public/rpc.php',
        'method'    => array(
            'debug',
        ),
    );

    /**
     * rpc 测试代码
     */
    private function debug($var = array()) { }
}
