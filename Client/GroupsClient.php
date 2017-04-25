<?php

namespace Spyrit\Billetel\Client;

use Spyrit\Billetel\Client\AbstractClient;

class GroupsClient extends AbstractClient
{
    /**
     * @return SimpleXMLElement
     */
    public function get()
    {
        $uri = '/bol/api/catalog/v2/repositories/files/groups';
        $res = $this->action('GET', $uri);

        return simplexml_load_string($res);
    }
}