<?php

namespace Spyrit\Billetel\Client;

use Spyrit\Billetel\Client\AbstractClient;
use Spyrit\Billetel\Facade\OwnerFacade;
use Spyrit\Billetel\Facade\BillingAddressFacade;
use Spyrit\Billetel\Facade\OrderFacade;
use Spyrit\Billetel\Facade\ExternalPaymentFacade;
use Spyrit\Billetel\Util\Util;

class OrderClient extends AbstractClient
{
    const BASE_URL = 'bol/api/booking/v2/clients';

    /**
     * @return SimpleXMLElement
     */
    public function get($clientId, $orderId)
    {
        $uri = self::BASE_URL . '/' . $clientId .'/orders/'. $orderId;

        return $this->action('GET', $uri);
    }

    /**
     * @return SimpleXMLElement
     */
    public function validateExternalPayment($clientId, $clientIpAddress, OrderFacade $order, ExternalPaymentFacade $externalPayment)
    {
        $uri = self::BASE_URL . '/' . $clientId .'/orders/externalPayment';

        $params = [
            'clientIpAddress' => $clientIpAddress,
        ];

        $params = array_merge($params, Util::getArrayFromObject($order));
        $params = array_merge($params, Util::getArrayFromObject($externalPayment));

        return $this->action('POST', $uri, $params);
    }
}