<?php

use JrBarros\Packages\DataHook\Listeners\SendStudentCreate;
use JrBarros\Packages\DataHook\Listeners\SendStudentUpdate;

return [
    SendStudentCreate::class => [
        'driver' => env('DATA_HOOK_SEND_STUDENT_CREATE_DRIVER', 'http'),
        'resource' => env('DATA_HOOK_SEND_STUDENT_CREATE_RESOURCE', 'student/create'),
    ],

    SendStudentUpdate::class => [
        'driver' => env('DATA_HOOK_SEND_STUDENT_UPDATE_DRIVER', 'http'),
        'resource' => env('DATA_HOOK_SEND_STUDENT_UPDATE_RESOURCE', 'student/update'),
    ],
];
