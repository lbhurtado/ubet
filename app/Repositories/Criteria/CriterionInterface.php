<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 30/08/2018
 * Time: 7:20 PM
 */

namespace App\Repositories\Criteria;

interface CriterionInterface
{
    public function apply($entity);
}