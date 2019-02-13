<?php

namespace Spyrit\Billetel\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class ExternalPaymentFacade
 */
class ExternalPaymentFacade
{
    /**
     * @var string $customerCardControl
     * @SerializedName("CustomerCardControl")
     * @Type("string")
     */
    public $customerCardControl;

    /**
     * @var string $externalOrderId
     * @SerializedName("ExternalOrderId")
     * @Type("string")
     */
    public $externalOrderId;

    /**
     * @var string $externalInformation
     * @SerializedName("ExternalInformation")
     * @Type("string")
     */
    public $externalInformation;
}