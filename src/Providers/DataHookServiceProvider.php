<?php

namespace JrBarros\Packages\DataHook\Providers;

use App\Events\StudentCreated;
use JrBarros\Packages\DataHook\Listeners\SendStudentCreate;
use JrBarros\Packages\DataHook\Listeners\SendStudentUpdate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\StudentUpdated;

class DataHookServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/data_hook.php', 'data-hook');
        $this->mergeConfigFrom(__DIR__ . '/../../config/listeners_config.php', 'data-hook-listeners');
        $this->loadEvents();
    }
    private function loadEvents(): void
    {

        Event::listen(
            StudentCreated::class,
            SendStudentCreate::class
        );

        Event::listen(
            StudentUpdated::class,
            SendStudentUpdate::class
        );
    }
}
