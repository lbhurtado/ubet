<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 07/09/2018
 * Time: 8:50 PM
 */

namespace App\Repositories\Eloquent\Criteria;


use App\Repositories\Criteria\CriterionInterface;

class HasRole implements CriterionInterface
{
    private $roles;

    public function __construct(...$roles)
    {
        $this->roles = array_flatten($roles);
    }

    public function apply($entity)
    {
        return $entity->whereHas('roles', function ($query) {

           $query->whereIn('name', $this->roles);
        });
    }
}