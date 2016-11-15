<?php

namespace Ctx\Basic;

use Tree6bee\Ctx\Basic\Ctx as BasicCtx;

/**
 * Ctx基类
 */
abstract class Ctx extends BasicCtx
{
    /*--- part.2 非框架核心 ---*/

    /**
     * 获取配置文件
     *
     * @example $this->getItem('avatar.url')
     */
    protected function getItem($item = null, $default = null, $file = 'main')
    {
        $path = '@' . $this->getModName() . '/' . $file;
        return $this->ctx->Ctx->getConf($item . $path, $default);
    }

    /**
     * 设置配置
     *
     * @example $this->setItem('port', '8080')
     */
    protected function setItem($item = null, $config = null, $file = 'main')
    {
        $path = '@' . $this->getModName() . '/' . $file;
        return $this->ctx->Ctx->setConf($item . $path, $config);
    }

    /**
     * 获取公共配置文件
     *
     * @example $this->getCItem('upload.host')
     */
    protected function getCItem($item = null, $default = null, $file = 'main')
    {
        $path = '@common/' . $file;
        return $this->ctx->Ctx->getConf($item . $path, $default);
    }
}
