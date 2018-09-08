<?php

use App\User;
use App\Server;

$factory->define(Server::class, function () {
    return factory(User::class)->raw();
});