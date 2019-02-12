<?php

namespace Spyrit\Billetel\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Spyrit\Billetel\Facade\BillingAddressFacade;

/**
 * Class OwnerFacade
 */
class OwnerFacade
{
    /**
     * @var string $firstName
     * @SerializedName("FirstName")
     * @Type("string")
     */
    public $firstName;

    /**
     * @var string $lastName
     * @SerializedName("LastName")
     * @Type("string")
     */
    public $lastName;

    /**
     * @var BillingAddressFacade $billingAddress
     * @SerializedName("BillingAddress")
     * @Type("BillingAddressFacade")
     */
    public $billingAddress;
}