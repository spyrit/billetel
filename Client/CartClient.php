<?php

namespace Spyrit\Billetel\Client;

use Spyrit\Billetel\Client\AbstractClient;
use Spyrit\Billetel\Facade\AddressFacade;
use Spyrit\Billetel\Facade\HolderFacade;
use Spyrit\Billetel\Facade\OrderDetailRequestFacade;
use Spyrit\Billetel\Util\Util;

class CartClient extends AbstractClient
{
    const BASE_URL = 'bol/api/booking/v2/carts';

    /**
     * @return SimpleXMLElement
     */
    public function getCart($cartId)
    {
        $uri = self::BASE_URL . $cartId;

        return $this->action('GET', $uri);
    }

    /**
     * @return SimpleXMLElement
     */
    public function addDetailToNewCart($eventId, $sessionId, $orderDetailRequests)
    {
        $uri = self::BASE_URL . 'events';

        $params = [
            'eventId' => $eventId,
            'sessionId' => $sessionId,
            'items' => $orderDetailRequests,
        ];

        return $this->action('POST', $uri, $params);
    }

    /**
     * @return SimpleXMLElement
     */
    public function addDetailToExistingCart($cartId, $eventId, $sessionId, $orderDetailRequests)
    {
        $uri = self::BASE_URL . 'events/'. $cartId;

        $params = [
            'eventId' => $eventId,
            'sessionId' => $sessionId,
            'items' => $orderDetailRequests,
        ];

        return $this->action('POST', $uri, $params);
    }

    /**
     * @return SimpleXMLElement
     */
    public function deleteCart($cartId)
    {
        $uri = self::BASE_URL . $cartId;

        return $this->action('DELETE', $uri);
    }

    /**
     * @return SimpleXMLElement
     */
    public function deleteCartDetail($cartId, $itemId)
    {
        $uri = self::BASE_URL . $cartId .'/items/'. $itemId;

        return $this->action('DELETE', $uri);
    }

    /**
     * @return SimpleXMLElement
     */
    public function setDeliveryMode($cartId, $deliveryModeId)
    {
        $uri = self::BASE_URL . $cartId .'/deliveryMode/'. $deliveryModeId;

        return $this->action('POST', $uri);
    }

    /**
     * @return SimpleXMLElement
     */
    public function setDeliveryAddress($cartId, AddressFacade $address)
    {
        $uri = self::BASE_URL . $cartId .'/deliveryAddress';

        $params = Util::getArrayFromObject($address);

        return $this->action('POST', $uri, $params);
    }

    /**
     * @return SimpleXMLElement
     */
    public function setHolder($cartId, $itemId, $tickets)
    {
        $uri = self::BASE_URL . $cartId .'/holders';

        $params = [
            'itemId' => $itemId,
            'tickets' => $tickets,
        ];

        return $this->action('POST', $uri, $params);
    }

    /**
     * @return SimpleXMLElement
     */
    public function setDetailInsurance($cartId, $isSelected)
    {
        $uri = self::BASE_URL . $cartId .'/items/'. $itemId .'/insurances/'. $isSelected;

        return $this->action('POST', $uri);
    }

    /**
     * @return SimpleXMLElement
     */
    public function setCartInsurance($cartId, $insurances)
    {
        $uri = self::BASE_URL . $cartId .'/items/insurances';

        $params = [
            'insurances' => $insurances,
        ];

        return $this->action('POST', $uri, $params);
    }
}
