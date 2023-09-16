<?php

namespace JrBarros\Packages\DataHook\Listeners;

use Exception;
use JrBarros\Packages\DataHook\Service\BuildDrivers;

trait BuildDriversTrait
{
    public BuildDrivers $driver;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $config = config('data-hook-listeners.' . self::class);

        $this->driver = new BuildDrivers($config);
    }

    /**
     * @param array $data
     * @return void
     */
    public function send(array $data): void
    {
        $this->driver->sender->send($data);
    }

}
