<?php

namespace Ctx\Rpc;

class Ctx
{
    public function debug($var = array())
    {
        return 'Rpc: ' . print_r($var, true);
    }
}
