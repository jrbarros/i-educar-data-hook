<?php

namespace JrBarros\Packages\DataHook\Tests\Providers;

use App\Events\StudentCreated;
use Illuminate\Support\Facades\Event;
use JrBarros\Packages\DataHook\Listeners\SendStudentCreate;
use Tests\TestCase;

class DataHookServiceProviderTest extends TestCase
{

    public function test_is_attached_to_event()
    {
        Event::fake();

        Event::assertListening(
            StudentCreated::class,
            SendStudentCreate::class
        );
    }
}
