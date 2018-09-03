<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 30/08/2018
 * Time: 7:05 PM
 */

namespace App\Repositories\Criteria;

interface CriteriaInterface
{
    public function withCriteria(...$criteria);
}