<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 30/08/2018
 * Time: 7:47 PM
 */

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

class HasImage implements CriterionInterface
{
    public function apply($entity)
    {
        return $entity->hasImage();
    }
}