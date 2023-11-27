<?php

use App\Events\SendReminder;
use App\Models\Reminder;
use App\Scheduler\Kernel;

require_once __DIR__ . '/bootstrap/app.php';

while (true) {
    $kernel = new Kernel;

    Reminder::get()->each(function ($reminder) use ($kernel, $container) {
        $kernel->add(new SendReminder($reminder, $container->guzzle, $container->settings))->cron($reminder->expression);
    });

    $kernel->run();

    sleep(60);
}
