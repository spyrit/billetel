<?php

namespace Spyrit\Billetel\Client;

use Spyrit\Billetel\Client\AbstractClient;
use Spyrit\Billetel\Facade\PaymentCardFacade;
use Spyrit\Billetel\Facade\OwnerFacade;
use Spyrit\Billetel\Facade\BillingAddressFacade;
use Spyrit\Billetel\Facade\AcsFormDataFacade;

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
    public function validate($clientId, $clientIpAddress, $cartId, $totalPrice, PaymentCardFacade $paymentCard, OwnerFacade $owner, BillingAddressFacade $billingAddress)
    {
        $uri = self::BASE_URL . $clientId .'/orders';

        $params = [
            'clientIpAddress' => $clientIpAddress,
            'cartId' => $cartId,
            'totalPrice' => $totalPrice,
        ];

        // TODO items

        foreach ($paymentCard as $property => $value) {
            $params[$property] = $value;
        }

        foreach ($owner as $property => $value) {
            $params[$property] = $value;
        }

        foreach ($billingAddress as $property => $value) {
            $params[$property] = $value;
        }

        return $this->action('POST', $uri, $params);
    }

    /**
     * @return SimpleXMLElement
     */
    public function validateSecure($clientId, $clientIpAddress, $cartId, $totalPrice, AcsFormDataFacade $acsFormData)
    {
        $uri = self::BASE_URL . $clientId .'/orders/3DSecure';

        $params = [
            'clientIpAddress' => $clientIpAddress,
            'cartId' => $cartId,
            'totalPrice' => $totalPrice,
        ];

        // TODO items

        foreach ($acsFormData as $property => $value) {
            $params[$property] = $value;
        }

        return $this->action('POST', $uri, $params);
    }
}