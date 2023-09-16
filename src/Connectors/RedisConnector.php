<?php

namespace JrBarros\Packages\DataHook\Connectors;

use Illuminate\Contracts\Redis\Factory as Redis;
use Illuminate\Queue\RedisQueue;
use JrBarros\Packages\DataHook\Contractors\Sender;

class RedisConnector extends \Illuminate\Queue\Connectors\RedisConnector implements Sender
{
    private RedisQueue $sender;

    public function __construct()
    {
        $this->redis = app(Redis::class);
        $this->connection = config('data-hook.drivers.redis.connection');

        parent::__construct($this->redis, $this->connection);
    }

    /**
     * @param array $config
     * @return $this
     */
    public function connect(array $config): self
    {
        $this->sender = (new RedisQueue(
            $this->redis,  $config['resource'], // 'queue',
            $config['connection'] ?? $this->connection,
            $config['retry_after'] ?? 60,
            $config['block_for'] ?? null,
            $config['after_commit'] ?? null,
            $config['migration_batch_size'] ?? -1
        ));

        return $this;
    }

    /**
     * @param $data
     * @return mixed|null
     */
    public function send($data): mixed
    {
        return $this->sender->pushRaw(json_encode($data));
    }
}
