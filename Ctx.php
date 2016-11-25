<?php

namespace Ctx;

use Tree6bee\Ctx\Ctx as BasicCtx;

/**
 * Context 上下文
 *
 * @property \Ctx\Service\Ctx\CtxCtx $Ctx
 * @property \Ctx\Service\Cf\CfCtx $Cf
 */
class Ctx extends BasicCtx
{
    protected static $ctxInstance;
}
