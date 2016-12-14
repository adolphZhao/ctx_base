<?php

/**
 * 项目级别配置
 */
return array(
    //development(开发模式), testing(单测模式暂时不考虑), production(生产环境),maintenance(维护模式)
    'environment'       => 'development',
    'namespace'         => 'App',
    'app_path'          => dirname(dirname(__FILE__)) . '/app',
    'storage_path'      => dirname(dirname(__FILE__)) . '/storage',
    'xhprof_dir'        =>  dirname(dirname(__FILE__)) . '/public/xhprof',
    'static'            => 'http://s.sh7nestatic.com', //静态资源
    //--end--
    'timezone'          => 'Asia/Shanghai',
    'dispatch'          => array( //路由相关配置
        'default_module'        => 'home',  //模块
        'default_controller'    => 'index', //控制器
        'default_action'        => 'index', //方法
        'url_suffix'            => '', //此处数组为配置文件，URL伪静态后缀设置 URL_HTML_SUFFIX:html/html/asp/jsp/cgi
        'path_separator'        => '/', //可以为 /|-|~
        'url_var'               => '_URI_',
    ),
    'cookie_salt'       => 'c!o*o^k#i-e_s%a$l@t',   //cookie加密盐
    'session'           => array( //session设置 这里以memc为例
        'cookie_domain'         => '',   //如 .domain.com
        'save_handler'          => '',  //如 memcache | redis
        'save_path'             => '',  //如 tcp://192.168.1.107:11211
        'name'                  => 'Tree6BSESSID',  //如 PHPSESSID | JSESSIONID 会话名称至少需要一个字母，不能全部都使用数字
    ),
);
