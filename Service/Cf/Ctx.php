<?php

namespace Ctx\Service\Cf;

use Ctx\Basic\Ctx;
use Tree6bee\Cf\Foundation\Application;
use Tree6bee\Cf\Http\Request;

/**
 * 应用框架入口
 *
 * @copyright sh7ning 2016.1
 * @author    sh7ning
 * @version   0.0.1
 */
class CfCtx extends Ctx
{
    public function getConfiguration($dir)
    {
        return $this->loadC('Config', $dir);
    }
}
