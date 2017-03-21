<?php

namespace Ctx\Service\Ctx;

use Ctx\Basic\Ctx;
use Ctx\Basic\Exception;
use Tree6bee\Support\Ctx\Cache\Redis;
use Tree6bee\Support\Ctx\Db\Mysql;
use Tree6bee\Support\Ctx\Db\Pgsql;

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
    private static $dbObj = array();

    /**
     * 加载数据库mysql获取数据库操作对象
     * $this->loadDB();
     * $this->loadDB('mission.slave');
     *
     * @param string $database
     * @return \Tree6bee\Support\Ctx\Db\Connection
     * @throws Exception
     */
    public function db($database = 'default.master')
    {
        if (! isset(self::$dbObj[$database])) {
            $config = $this->ctx->Ctx->getSConf($database . '@db');
            try {
                if ($config['driver'] == 'mysql') {
                    self::$dbObj[$database] = new Mysql($config['dsn'], $config['user'], $config['psw']);
                } else {    //默认mysql
                    self::$dbObj[$database] = new Pgsql($config['dsn'], $config['user'], $config['psw']);
                }
            } catch (\Exception $e) {
                throw new Exception($database . '连接失败');
            }
        }
        return self::$dbObj[$database];
    }

    /**
     * redis实例
     */
    private static $redisObj = array();

    /**
     * 加载Redis对象
     * $this->ctx->loadRedis();
     * $this->ctx->loadRedis('test');
     *
     * @param string $redis
     * @return Redis
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
