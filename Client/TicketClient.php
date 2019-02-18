<?php

namespace Spyrit\Billetel\Client;

use Spyrit\Billetel\Client\AbstractClient;
use Spyrit\Billetel\Facade\TicketFacade;
use Spyrit\Billetel\Util\Util;

class TicketClient extends AbstractClient
{
    const BASE_URL = 'bol/api/booking/v2/clients';

    /**
     * @return SimpleXMLElement
     */
    public function getByTicket($clientId, $orderId, $itemId, TicketFacade $ticket)
    {
        $uri = self::BASE_URL. '/' . $clientId .'/orders/'. $orderId .'/item/'. $itemId .'/tickets/'. $ticket->id;

        $params = Util::getArrayFromObject($ticket);

        return $this->action('POST', $uri, $params);
    }

    /**
     * @return SimpleXMLElement
     */
    public function getByOrderDetail($clientId, $orderId, $itemId, $tickets)
    {
        $uri = self::BASE_URL. '/' . $clientId .'/orders/'. $orderId .'/item/'. $itemId .'/tickets';

        $params = [
            'tickets' => $tickets,
        ];

        return $this->action('POST', $uri, $params);
    }

    /**
     * @return SimpleXMLElement
     */
    public function getByOrder($clientId, $orderId)
    {
        $uri = self::BASE_URL. '/' . $clientId .'/orders/'. $orderId .'/tickets';

        return $this->action('POST', $uri);
    }
}