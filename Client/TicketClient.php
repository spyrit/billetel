<?php

namespace Spyrit\Billetel\Client;

use Spyrit\Billetel\Client\AbstractClient;

class TicketClient extends AbstractClient
{
    const BASE_URL = 'bol/api/booking/v2/clients';

    /**
     * @return SimpleXMLElement
     */
    public function getByTicket($clientId, $orderId, $itemId, $ticketId, $ticketType, $width, $height)
    {
        $uri = self::BASE_URL. $clientId .'/orders/'. $orderId .'/item/'. $itemId .'/tickets/'. $ticketId;

        $params = [
            'ticketType' => $ticketType,
            'width' => $width,
            'height' => $height,
        ];

        return $this->action('POST', $uri, $params);
    }

    /**
     * @return SimpleXMLElement
     */
    public function getByOrderDetail($clientId, $orderId, $itemId)
    {
        $uri = self::BASE_URL. $clientId .'/orders/'. $orderId .'/item/'. $itemId .'/tickets';

        // TODO tickets

        return $this->action('POST', $uri);
    }

    /**
     * @return SimpleXMLElement
     */
    public function getByOrder($clientId, $orderId)
    {
        $uri = self::BASE_URL. $clientId .'/orders/'. $orderId .'/tickets';

        return $this->action('POST', $uri);
    }
}