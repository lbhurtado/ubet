<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 30/08/2018
 * Time: 7:23 PM
 */

namespace App\Repositories\Eloquent\Criteria;


use App\Repositories\Criteria\CriterionInterface;

class LatestFirst implements CriterionInterface
{
    public function apply($entity)
    {
        return $entity->latest();
    }
}