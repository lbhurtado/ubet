<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Middleware\ApiAi;
use BotMan\BotMan\BotMan;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->middleware->received(ApiAi::create('a3642c76b1ef4cbbb9ea5a8a34fb9e48'));

$botman->fallback(function (BotMan $bot){
    return $bot->reply($bot->getMessage()->getExtras('apiReply'));
});