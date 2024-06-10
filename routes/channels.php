<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('messages', function () {
    return true;
});
Broadcast::channel('my-channel', function () {
    return true;
});
Broadcast::channel('user-status', function ($user) {
    return $user;
});
