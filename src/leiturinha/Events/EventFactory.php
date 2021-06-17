<?php

namespace Leiturinha\Events;

use Leiturinha\Traits\ManagesFirehoseFb;

class EventFactory implements EventFactoryInterface
{
    use ManagesFirehoseFb;

    protected $client;

    public function __construct()
    {
        $this->client = getenv('EVENT_CLIENT');
    }

    public function handle($data)
    {
        switch ($this->client) {
            case 'firehoseFb':
                $this->resolveFirehoseFb($data);
                break;
        }
    }
}
