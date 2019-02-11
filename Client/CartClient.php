<?php

namespace Spyrit\Billetel\Client;

use Spyrit\Billetel\Client\AbstractClient;

class CartClient extends AbstractClient
{
    /**
     * @return SimpleXMLElement
     */
    public function getCart($cartId)
    {
        $uri = 'bol/api/booking/v2/carts/'. $cartId;

        return $this->action('GET', $uri);
    }

    /**
     * @return SimpleXMLElement
     */
    public function addDetailToNewCart($eventId, $sessionId, $customerClassId, $ticketQuantity)
    {
        $uri = 'bol/api/booking/v2/carts/events';

        $params = [
            'eventId' => $eventId,
            'sessionId' => $sessionId,
            'customerClassId' => $customerClassId,
            'ticketQuantity' => $ticketQuantity,
        ];

        return $this->action('POST', $uri, $params);
    }

    /**
     * @return SimpleXMLElement
     */
    public function addDetailToExistingCart($cartId, $eventId, $sessionId, $customerClassId, $ticketQuantity)
    {
        $uri = 'bol/api/booking/v2/carts/events/'. $cartId;

        $params = [
            'eventId' => $eventId,
            'sessionId' => $sessionId,
            'customerClassId' => $customerClassId,
            'ticketQuantity' => $ticketQuantity,
        ];

        return $this->action('POST', $uri, $params);
    }

    /**
     * @return SimpleXMLElement
     */
    public function deleteCart($cartId)
    {
        $uri = 'bol/api/booking/v2/carts/'. $cartId;

        return $this->action('DELETE', $uri);
    }

    /**
     * @return SimpleXMLElement
     */
    public function deleteCartDetail($cartId, $itemId)
    {
        $uri = 'bol/api/booking/v2/carts/'. $cartId .'/items/'. $itemId;

        return $this->action('DELETE', $uri);
    }
}
