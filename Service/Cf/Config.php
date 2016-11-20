<?php

namespace Ctx\Service\Cf;

use Ctx\Basic\Ctx;
use Tree6bee\Cf\Contracts\Config as ConfigContract;

class Config extends Ctx implements ConfigContract
{
    /**
     * app config directory
     */
    private $dir;

    public function __construct($dir = '')
    {
        $this->dir = $dir;
    }

    public function init()
    {
        //默认替换掉main
        $this->replaceConfig('main');
    }

    protected function replaceConfig($file, $replace = true)
    {
        if ($this->dir) {
            //获取替换后的配置
            $config = include $this->dir . '/' . $file . '.php';
            if ($replace) { //只是部分替换
                $configTemplate = $this->getItem('', null, $file);
                $config = array_replace_recursive($configTemplate, $config);
            }
            //替换
            $this->setItem('', $config, $file);
        }
    }

    public function get($item = '', $default = null, $file = 'main')
    {
        return $this->getItem($item, $default, $file);
    }
}
