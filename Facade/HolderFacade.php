<?php

namespace Spyrit\Billetel\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class HolderFacade
 */
class HolderFacade
{
    /**
     * @var string $lastName
     * @SerializedName("LastName")
     * @Type("string")
     */
    public $lastName;

    /**
     * @var string $firstName
     * @SerializedName("FirstName")
     * @Type("string")
     */
    public $firstName;
}
