<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 03/09/2018
 * Time: 8:13 PM
 */

namespace App\Repositories\Eloquent;


use App\Address;
use App\Repositories\RepositoryAbstract;
use App\Repositories\Contracts\AddressRepository;

class EloquentAddressRepository extends RepositoryAbstract implements AddressRepository
{
    public function entity()
    {
        return Address::class;
    }
}