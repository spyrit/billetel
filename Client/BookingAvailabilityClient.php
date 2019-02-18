<?php

namespace Spyrit\Billetel\Client;

use Spyrit\Billetel\Client\AbstractClient;

class AvailabilityBookingClient extends AbstractClient
{
    /**
     * @return SimpleXMLElement
     */
    public function get($eventId, $sessionId)
    {
        $uri = 'bol/api/booking/v2/events/'. $eventId .'/sessions/'. $sessionId .'/availability';

        return $this->action('GET', $uri);
    }
}
