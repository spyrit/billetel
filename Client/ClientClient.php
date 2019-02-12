<?php

namespace Spyrit\Billetel\Client;

use Spyrit\Billetel\Client\AbstractClient;
use Spyrit\Billetel\Facade\ClientFacade;
use Spyrit\Billetel\Util\Util;

class ClientClient extends AbstractClient
{
    const BASE_URL = 'bol/api/booking/v2/clients';

    /**
     * @return SimpleXMLElement
     */
    public function create(ClientFacade $client)
    {
        $uri = self::BASE_URL;

        $params = Util::getArrayFromObject($client);

        return $this->action('POST', $uri, $params);
    }

    /**
     * @return SimpleXMLElement
     */
    public function update($clientId, ClientFacade $client)
    {
        $uri = self::BASE_URL .'/'. $clientId;

        $params = Util::getArrayFromObject($client);

        return $this->action('PUT', $uri, $params);
    }
}
