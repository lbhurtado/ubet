<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 07/09/2018
 * Time: 7:51 PM
 */

namespace App\Repositories\Eloquent;

use App\Permission;
use App\Repositories\RepositoryAbstract;
use App\Repositories\Contracts\PermissionRepository;

class EloquentPermissionRepository extends RepositoryAbstract implements PermissionRepository
{
    public function entity()
    {
        return Permission::class;
    }
}