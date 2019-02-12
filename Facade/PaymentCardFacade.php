<?php

namespace Spyrit\Billetel\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Spyrit\Billetel\Facade\OwnerFacade;

/**
 * Class PaymentCardFacade
 */
class PaymentCardFacade
{
    /**
     * @var string $cardTypeId
     * @SerializedName("CardTypeId")
     * @Type("string")
     */
    public $cardTypeId;

    /**
     * @var string $paymentCardNumber
     * @SerializedName("PaymentCardNumber")
     * @Type("string")
     */
    public $paymentCardNumber;

    /**
     * @var string $customerCardControl
     * @SerializedName("CustomerCardControl")
     * @Type("string")
     */
    public $customerCardControl;

    /**
     * @var string $paymentCardExpirationDate
     * @SerializedName("PaymentCardExpirationDate")
     * @Type("string")
     */
    public $paymentCardExpirationDate;

    /**
     * @var string $paymentCardCVV
     * @SerializedName("PaymentCardCVV")
     * @Type("string")
     */
    public $paymentCardCVV;

    /**
     * @var OwnerFacade $owner
     * @SerializedName("Owner")
     * @Type("OwnerFacade")
     */
    public $owner;
}