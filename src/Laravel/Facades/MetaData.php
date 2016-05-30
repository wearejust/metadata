<?php

namespace Just\MetaData\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Just\MetaData\MetaDataWrapper;

class MetaData extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return MetaDataWrapper::class;
    }
}
