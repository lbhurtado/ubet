<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 06/09/2018
 * Time: 8:52 AM
 */

namespace App\Repositories\Eloquent;

use App\DiallingCode;
use App\Repositories\RepositoryAbstract;
use App\Repositories\Contracts\DiallingCodeRepository;

class EloquentDiallingCodeRepository extends RepositoryAbstract implements DiallingCodeRepository
{
    public function entity()
    {
        return DiallingCode::class;
    }
}
