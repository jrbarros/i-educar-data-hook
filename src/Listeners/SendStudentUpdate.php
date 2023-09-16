<?php

namespace JrBarros\Packages\DataHook\Listeners;

use App\Events\StudentUpdated;

class SendStudentUpdate
{
    use BuildDriversTrait;

    /**
     * @param StudentUpdated $event
     * @return void
     */
    public function handle(StudentUpdated $event): void
    {
        $this->send($event->student->toArray());
    }
}
