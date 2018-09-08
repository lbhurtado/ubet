<?php

use App\User;
use App\Client;

$factory->define(Client::class, function () {
    return factory(User::class)->raw();
});
