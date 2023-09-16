<?php

namespace JrBarros\Packages\DataHook\Listeners;

use App\Events\StudentCreated;

class SendStudentCreate
{
    use BuildDriversTrait;

    /**
     * @param StudentCreated $event
     * @return void
     */
    public function handle(StudentCreated $event): void
    {
        $this->send($event->student->toArray());
    }
}
