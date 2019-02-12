<?php

namespace Tests\Util;

use PHPUnit\Framework\TestCase;
use Spyrit\Billetel\Facade\HolderFacade;
use Spyrit\Billetel\Util\Util;
use Spyrit\Billetel\Facade\PaymentCardFacade;
use Spyrit\Billetel\Facade\OwnerFacade;
use Spyrit\Billetel\Facade\BillingAddressFacade;

class UtilTest extends TestCase
{
    public function testGetArrayFromObject()
    {
        $holder = new HolderFacade();
        $holder->lastName = 'LastName';
        $holder->firstName = 'FirstName';

        $result = Util::getArrayFromObject($holder);
        $expectedResult = [
            'lastName' => 'LastName',
            'firstName' => 'FirstName',
        ];

        $this->assertEquals($expectedResult, $result);

        $billingAddress = new BillingAddressFacade();
        $billingAddress->street = 'street';
        $billingAddress->zipCode = 'zipCode';
        $billingAddress->city = 'city';
        $billingAddress->country = 'country';
        $billingAddress->phoneNumber = 'phoneNumber';
        $owner = new OwnerFacade();
        $owner->firstName = 'firstName';
        $owner->lastName = 'lastName';
        $owner->billingAddress = $billingAddress;
        $paymentCard = new PaymentCardFacade();
        $paymentCard->cardTypeId = 'cardTypeId';
        $paymentCard->paymentCardNumber = 'paymentCardNumber';
        $paymentCard->customerCardControl = 'customerCardControl';
        $paymentCard->paymentCardExpirationDate = 'paymentCardExpirationDate';
        $paymentCard->paymentCardCVV = 'paymentCardCVV';
        $paymentCard->owner = $owner;

        $result = Util::getArrayFromObject($paymentCard);
        $expectedResult = [
            'cardTypeId' => 'cardTypeId',
            'paymentCardNumber' => 'paymentCardNumber',
            'customerCardControl' => 'customerCardControl',
            'paymentCardExpirationDate' => 'paymentCardExpirationDate',
            'paymentCardCVV' => 'paymentCardCVV',
            'owner' => [
                'firstName' => 'firstName',
                'lastName' => 'lastName',
                'billingAddress' => [
                    'street' => 'street',
                    'zipCode' => 'zipCode',
                    'city' => 'city',
                    'country' => 'country',
                    'phoneNumber' => 'phoneNumber',
                ],
            ],
        ];

        $this->assertEquals($expectedResult, $result);
    }
}