<?php namespace Fadion\Rule\Facades;

use Illuminate\Support\Facades\Facade;

class RuleMessage extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rule.message';
    }
}