<?php

namespace Spyrit\Billetel\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class AcsFormDataFacade
 */
class AcsFormDataFacade
{
    /**
     * @var string $paResValue
     * @SerializedName("PaResValue")
     * @Type("string")
     */
    public $paResValue;

    /**
     * @var string $mdValue
     * @SerializedName("MdValue")
     * @Type("string")
     */
    public $mdValue;
}
