<?php

namespace Spyrit\Billetel\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class BillingAddressFacade
 */
class BillingAddressFacade
{
    /**
     * @var string $street
     * @SerializedName("Street")
     * @Type("string")
     */
    public $street;

    /**
     * @var string $zipCode
     * @SerializedName("ZipCode")
     * @Type("string")
     */
    public $zipCode;

    /**
     * @var string $city
     * @SerializedName("City")
     * @Type("string")
     */
    public $city;

    /**
     * @var string $country
     * @SerializedName("Country")
     * @Type("string")
     */
    public $country;

    /**
     * @var string $phoneNumber
     * @SerializedName("PhoneNumber")
     * @Type("string")
     */
    public $phoneNumber;
}
