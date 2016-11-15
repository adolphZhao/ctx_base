<?php

namespace Ctx\Service\Ctx;

use Ctx\Basic\Ctx;
use Ctx\Basic\Exception;
use Tree6bee\Support\Ctx\Cache\Redis;
use Tree6bee\Support\Ctx\Db\Mysql;

/**
 * 框架存储辅助类
 *
 */
class Storage extends Ctx
{
    /**
     * 构造函数
     */
    public function __construct()
    {
    }

    /**
     * db实例，所有子类都会共享该属性
     */
    private static $mysqlObj = array();

    /**
     * 加载数据库mysql获取数据库操作对象
     * $this->loadDB();
     * $this->loadDB('mission.slave');
     */
    public function mysql($database = 'default.master')
    {
        if (! isset(self::$mysqlObj[$database])) {
            $config = $this->ctx->Ctx->getSConf($database . '@mysql');
            try {
                self::$mysqlObj[$database] = new Mysql($config);
            } catch (\Exception $e) {
                throw new Exception($database . '连接失败');
            }
        }
        return self::$mysqlObj[$database];
    }

    /**
     * redis实例
     */
    private static $redisObj = array();

    /**
     * 加载Redis对象
     * $this->ctx->loadRedis();
     * $this->ctx->loadRedis('test');
     */
    public function redis($redis = 'default')
    {
        if (! isset(self::$redisObj[$redis])) {
            $config = $this->ctx->Ctx->getSConf($redis . '@redis');
            self::$redisObj[$redis] = new Redis($config['host'], $config['port'], $config['timeout']);
        }
        return self::$redisObj[$redis];
    }
}
