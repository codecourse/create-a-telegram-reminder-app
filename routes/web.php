<?php

use App\Controllers\ReminderController;

$app->get('/', ReminderController::class . ':index')->setName('reminders.index');
$app->post('/', ReminderController::class . ':store')->setName('reminders.store');
$app->post('/{reminder}/destroy', ReminderController::class . ':destroy')->setName('reminders.destroy');
