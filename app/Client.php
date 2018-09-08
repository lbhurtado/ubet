<?php

namespace App;

use App\Traits\HasParentModel;

class Client extends User
{
    use HasParentModel;

    protected static $roleName = 'client';
}
