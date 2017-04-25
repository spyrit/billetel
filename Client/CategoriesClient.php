<?php

namespace Spyrit\Billetel\Client;

use Spyrit\Billetel\Client\AbstractClient;

class CategoriesClient extends AbstractClient
{
    /**
     * @return SimpleXMLElement
     */
    public function get()
    {
        $uri = '/bol/api/catalog/v2/repositories/files/categories';
        $res = $this->action('GET', $uri);

        return simplexml_load_string($res);
    }
}