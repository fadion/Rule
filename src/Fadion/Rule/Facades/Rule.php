<?php namespace Fadion\Rule\Facades;

use Illuminate\Support\Facades\Facade;

class Rule extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rule';
    }
}