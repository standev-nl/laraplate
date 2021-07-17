<?php

namespace StanDev\Laraplate;

use Illuminate\Support\Facades\Facade;

/**
 * @see \StanDev\Laraplate\Skeleton\SkeletonClass
 */
class LaraplateFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laraplate';
    }
}
