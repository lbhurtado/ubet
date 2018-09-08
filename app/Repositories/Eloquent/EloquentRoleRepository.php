<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 07/09/2018
 * Time: 7:49 PM
 */

namespace App\Repositories\Eloquent;

use App\Role;
use App\Repositories\RepositoryAbstract;
use App\Repositories\Contracts\RoleRepository;

class EloquentRoleRepository extends RepositoryAbstract implements RoleRepository
{
    public function entity()
    {
        return Role::class;
    }
}