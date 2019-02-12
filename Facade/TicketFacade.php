<?php

namespace Spyrit\Billetel\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class TicketFacade
 */
class TicketFacade
{
    /**
     * @var string $id
     * @SerializedName("Id")
     * @Type("string")
     */
    public $id;

    /**
     * @var string $ticketType
     * @SerializedName("TicketType")
     * @Type("string")
     */
    public $ticketType;

    /**
     * @var string $width
     * @SerializedName("Width")
     * @Type("string")
     */
    public $width;

    /**
     * @var string $height
     * @SerializedName("Height")
     * @Type("string")
     */
    public $height;
}
