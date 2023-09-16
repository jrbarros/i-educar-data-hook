<?php

namespace JrBarros\Packages\DataHook\Listeners;

use App\Events\StudentCreated;

class SendStudentCreate
{
    public function __construct()
    {
    }

    public function handle(StudentCreated $event)
    {
        $student = $event->student;
    }
}
