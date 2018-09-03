<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 30/08/2018
 * Time: 7:53 PM
 */

namespace App\Traits\Eloquent;


use Illuminate\Database\Eloquent\Builder;

trait HasImage
{
    public function scopeHasImage(Builder $builder)
    {
        return $builder->whereRaw("image_url REGEXP '\.(jpg|jpeg|gif|png)'");
    }
}