<?php

namespace App;

use App\Traits\HasParentModel;

class Merchant extends User
{
    use HasParentModel;

    protected static $roleName = 'merchant';
}
