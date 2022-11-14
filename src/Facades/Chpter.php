<?php

namespace KiplingKelvin\ChpterLaravelSdk\Facades;

use Illuminate\Support\Facades\Facade;

class Chpter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'kipling-chpter';
    }
}
