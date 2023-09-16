<?php

namespace JrBarros\Packages\DataHook\Listeners;

use App\Events\StudentUpdated;

class SendStudentUpdate
{

    public function __construct()
    {
    }

    public function handle(StudentUpdated $event)
    {
        $student = $event->student;

    }
}