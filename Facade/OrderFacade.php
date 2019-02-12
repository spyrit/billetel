<?php

namespace Spyrit\Billetel\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class OrderFacade
 */
class OrderFacade
{
    /**
     * @var string $cartId
     * @SerializedName("CartId")
     * @Type("string")
     */
    public $cartId;

    /**
     * @var string $totalPrice
     * @SerializedName("TotalPrice")
     * @Type("string")
     */
    public $totalPrice;

    /**
     * @var string $items
     * @SerializedName("Items")
     * @Type("array")
     */
    public $items;
}
