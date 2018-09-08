<?php

namespace App;

use App\Traits\HasParentModel;

class Server extends User
{
    use HasParentModel;

    protected static $roleName = 'server';
}
