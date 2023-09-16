<?php

namespace JrBarros\Packages\DataHook\Connectors;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Queue\Connectors\ConnectorInterface;
use JrBarros\Packages\DataHook\Contractors\Sender;
use Psr\Http\Message\ResponseInterface;

class HttpConnector implements ConnectorInterface, Sender
{

    private Client $client;
    private string $uri;

    /**
     * @param array $config
     * @return $this
     */
    public function connect(array $config): self
    {
        $this->uri = $config['resource'];

        $this->client =  (new Client([
            'base_uri' => $config['url'],
            'timeout' => $config['timeout'],
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $config['authorization'] ?? '',
            ],
        ]));

        return $this;
    }

    /**
     * @param $data
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function send($data): ResponseInterface
    {
        return $this->client->post($this->uri, [
            'json' => $data,
        ]);
    }
}
