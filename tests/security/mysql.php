<?php
return array(
    'default' => array(
        'master' => array(  //默认数据库
            'host'      => '127.0.0.1',
            'port'      => '3306',
            'timeout'   => 3,
            'user'      => 'uuu',
            'psw'       => '000',
            'dbname'    => 'test',
            'charset'   => 'utf8',
            'prefix'    => '',
        ),
        'slave' => array(
            'host'      => array_rand(array('10.0.0.0' => 1, '10.0.0.1' => 1)),
            'port'      => '3306',
            'timeout'   => 3,
            'user'      => 'uuu',
            'psw'       => '000',
            'dbname'    => 'test',
            'charset'   => 'utf8',
            'prefix'    => '',
        )
    ),
    // 'MDB_MISSION'
    'mission' => array(
        'master' => array(
            'host'      => '127.0.0.1',
            'port'      => '3306',
            'timeout'   => 3,
            'user'      => 'mission_master',
            'psw'       => '6D!=dbpwd^s',
            'dbname'    => 'mission',
            'charset'   => 'utf8',
            'prefix'    => 'ctx_',
        ),
        'slave' => array(
            'host'      => '127.0.0.1',
            'port'      => '3306',
            'timeout'   => 3,
            'user'      => 'mission_slave',
            'psw'       => '6D!=dbpwd^s',
            'dbname'    => 'mission',
            'charset'   => 'utf8',
            'prefix'    => 'ctx_',
        )
    ),
);
