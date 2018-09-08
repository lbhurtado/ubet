<?php

use App\User;
use App\Merchant;

$factory->define(Merchant::class, function () {
    return factory(User::class)->raw();
});
