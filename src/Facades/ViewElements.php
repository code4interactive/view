<?php
namespace Code4\ViewElements\Facades;

use Illuminate\Support\Facades\Facade;

class ViewElements extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'viewElements';
    }
}