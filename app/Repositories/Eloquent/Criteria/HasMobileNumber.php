<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 06/09/2018
 * Time: 7:51 PM
 */

namespace App\Repositories\Eloquent\Criteria;

use App\Generators\Identifier;
use App\Repositories\Criteria\CriterionInterface;
use Illuminate\Support\Facades\DB;

class HasMobileNumber implements CriterionInterface
{

    public function apply($entity)
    {
        return $entity
            ->join('phone_numbers', function($join) {
                $join->on('phone_numbers.identifier', '=', DB::raw(Identifier::getSqlAlgorithm()));
            });
    }
}