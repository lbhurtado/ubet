<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 03/09/2018
 * Time: 8:54 PM
 */

namespace App\Repositories\Eloquent;


use App\Messenger;
use App\Repositories\RepositoryAbstract;
use App\Repositories\Contracts\MessengerRepository;


class EloquentMessengerRepository extends RepositoryAbstract implements MessengerRepository
{
    public function entity()
    {
        return Messenger::class;
    }
}