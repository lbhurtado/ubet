<?php

namespace App;

use App\Traits\HasParentModel;

class Admin extends User
{
    use HasParentModel;

    protected static $roleName = 'admin';
}
