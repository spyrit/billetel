<?php

namespace Spyrit\Billetel\Client;

use Spyrit\Billetel\Client\AbstractClient;
use Spyrit\Billetel\Facade\PaymentCardFacade;
use Spyrit\Billetel\Facade\OwnerFacade;
use Spyrit\Billetel\Facade\BillingAddressFacade;
use Spyrit\Billetel\Facade\AcsFormDataFacade;
use Spyrit\Billetel\Facade\OrderFacade;
use Spyrit\Billetel\Util\Util;

class OrderClient extends AbstractClient
{
    const BASE_URL = 'bol/api/booking/v2/clients';

    /**
     * @return SimpleXMLElement
     */
    public function get($clientId, $orderId)
    {
        $uri = self::BASE_URL . $clientId .'/orders/'. $orderId;

        return $this->action('GET', $uri);
    }

    /**
     * @return SimpleXMLElement
     */
    public function validate($clientId, $clientIpAddress, OrderFacade $order, PaymentCardFacade $paymentCard)
    {
        $uri = self::BASE_URL . $clientId .'/orders';

        $params = [
            'clientIpAddress' => $clientIpAddress,
        ];

        $params = array_merge($params, Util::getArrayFromObject($order));
        $params = array_merge($params, Util::getArrayFromObject($paymentCard));

        return $this->action('POST', $uri, $params);
    }

    /**
     * @return SimpleXMLElement
     */
    public function validateSecure($clientId, $clientIpAddress, OrderFacade $order, AcsFormDataFacade $acsFormData)
    {
        $uri = self::BASE_URL . $clientId .'/orders/3DSecure';

        $params = [
            'clientIpAddress' => $clientIpAddress,
            'cartId' => $cartId,
            'totalPrice' => $totalPrice,
        ];

        $params = array_merge($params, Util::getArrayFromObject($order));
        $params = array_merge($params, Util::getArrayFromObject($acsFormData));

        return $this->action('POST', $uri, $params);
    }
}