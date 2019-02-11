<?php

namespace Spyrit\Billetel\Client;

use Spyrit\Billetel\Client\AbstractClient;
use Spyrit\Billetel\Facade\ClientFacade;

class ClientClient extends AbstractClient
{
    const BASE_URL = 'bol/api/booking/v2/clients';

    /**
     * @return SimpleXMLElement
     */
    public function create(ClientFacade $client)
    {
        $uri = self::BASE_URL;

        $params = [];

        foreach ($client as $property => $value) {
            $params[$property] = $value;
        }

        return $this->action('POST', $uri, $params);
    }

    /**
     * @return SimpleXMLElement
     */
    public function update($clientId, ClientFacade $client)
    {
        $uri = self::BASE_URL .'/'. $clientId;

        $params = [];

        foreach ($client as $property => $value) {
            $params[$property] = $value;
        }

        return $this->action('PUT', $uri, $params);
    }
}
