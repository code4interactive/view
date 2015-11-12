<?php
namespace Code4\View\Facades;

use Illuminate\Support\Facades\Facade;

class ViewHelper extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'viewHelper';
    }
}