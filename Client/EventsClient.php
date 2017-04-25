<?php

namespace Spyrit\Billetel\Client;

use Spyrit\Billetel\Client\AbstractClient;

class EventsClient extends AbstractClient
{
    /**
     * @return SimpleXMLElement
     */
    public function get()
    {
        $uri = '/bol/api/catalog/v2/repositories/files/events';
        $res = $this->action('GET', $uri);

        return simplexml_load_string($res);
    }
}