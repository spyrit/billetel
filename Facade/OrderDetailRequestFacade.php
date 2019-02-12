<?php

namespace Spyrit\Billetel\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class OrderDetailRequestFacade
 */
class OrderDetailRequestFacade
{
    /**
     * @var string $customerClassId
     * @SerializedName("CustomerClassId")
     * @Type("string")
     */
    public $customerClassId;

    /**
     * @var string $ticketQuantity
     * @SerializedName("TicketQuantity")
     * @Type("string")
     */
    public $ticketQuantity;
}
