<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 03/09/2018
 * Time: 3:37 PM
 */

namespace App\Traits\Eloquent;


use App\Generators\Identifier;

trait GeneratesIdentifier
{
    public function generateIdentifier($id)
    {
        return app(Identifier::class)->generate($id);
    }
}