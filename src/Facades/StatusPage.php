<?php

namespace Eazybright\StatusPage\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Eazybright\StatusPage\StatusPage
 */
class StatusPage extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Eazybright\StatusPage\StatusPage::class;
    }
}
