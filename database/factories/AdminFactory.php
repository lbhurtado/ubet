<?php

use App\User;
use App\Admin;

$factory->define(Admin::class, function () {
    return factory(User::class)->raw();
});
