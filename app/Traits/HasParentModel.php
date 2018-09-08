<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 08/09/2018
 * Time: 6:58 PM
 */

namespace App\Traits;

use App\Role;
use App\Repositories\Exceptions\InvalidRoleName;
use App\Repositories\Exceptions\NoRoleNameDefined;
use Tightenco\Parental\HasParentModel as BaseHasParentModel;

trait HasParentModel
{
    use BaseHasParentModel {
        BaseHasParentModel::bootHasParentModel as parentBootHasParentModel;
    }

    public static function bootHasParentModel()
    {
        static::parentBootHasParentModel();

        static::created(function ($model) {
            $role = Role::firstOrCreate(['name' => static::getRoleName()]);
            $model->roles()->detach($role);
            $model->roles()->attach($role);
        });

        static::addGlobalScope(function ($query) {
            $query->whereHas('roles', function ($q) {
                $q->whereIn('name', [static::getRoleName()]);
            });
        });
    }

    protected static function getRoleName()
    {
        if (!isset(self::$roleName))
            throw new NoRoleNameDefined();

        if (!array_key_exists(self::$roleName, config('permission.roles')))
            throw new InvalidRoleName();

        return self::$roleName;
    }
}