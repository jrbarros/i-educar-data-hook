<?php

namespace JrBarros\Packages\DataHook\Contractors;

interface Sender
{
    public function connect(array $config): self;
    public function send($data);
}
