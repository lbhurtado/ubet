<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 05/09/2018
 * Time: 1:57 PM
 */

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Authy extends Facade
{
    protected static function getFacadeAccessor()
    {
       return 'authy';
    }
}