<?php

namespace JrBarros\Packages\DataHook\Service;

use JrBarros\Packages\DataHook\Connectors\RedisConnector;
use JrBarros\Packages\DataHook\Connectors\HttpConnector;
use JrBarros\Packages\DataHook\Contractors\Sender;

class BuildDrivers
{
    public Sender $sender;


    /**
     * @throws \Exception
     */
    public function __construct(private readonly ?array $config = null)
    {
        $dataHook = config('data-hook');

        $driver = $this->config['driver'] ?? $dataHook['default'];

        $driverConfig = $dataHook['drivers'][$driver];

        $driverConfig['resource'] = $this->config['resource'];

        $this->make($driver, $driverConfig);
    }

    /**
     * @param $driver
     * @param $driverConfig
     * @return void
     * @throws \Exception
     */
    public function make($driver, $driverConfig): void
    {
       $this->sender =  match ($driver) {
            'http' => (new HttpConnector())->connect($driverConfig),
            'redis' => (new RedisConnector())->connect($driverConfig),
            default => throw new \Exception('Driver not found'),
        };
    }
}
