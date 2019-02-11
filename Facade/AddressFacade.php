<?php

namespace Spyrit\Billetel\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class AddressFacade
 */
class AddressFacade
{
    /**
     * @var string $gender
     * @SerializedName("Gender")
     * @Type("string")
     */
    public $gender;

    /**
     * @var string $lastName
     * @SerializedName("LastName")
     * @Type("string")
     */
    public $lastName;

    /**
     * @var string $firstName
     * @SerializedName("firstName")
     * @Type("string")
     */
    public $firstName;

    /**
     * @var string $addressTypeId
     * @SerializedName("AddressTypeId")
     * @Type("string")
     */
    public $addressTypeId;

    /**
     * @var string $companyName
     * @SerializedName("CompanyName")
     * @Type("string")
     */
    public $companyName;

    /**
     * @var string $addressLine1
     * @SerializedName("AddressLine1")
     * @Type("string")
     */
    public $addressLine1;

    /**
     * @var string $addressLine2
     * @SerializedName("AddressLine2")
     * @Type("string")
     */
    public $addressLine2;

    /**
     * @var string $addressLine3
     * @SerializedName("AddressLine3")
     * @Type("string")
     */
    public $addressLine3;

    /**
     * @var string $addressLine4
     * @SerializedName("AddressLine4")
     * @Type("string")
     */
    public $addressLine4;

    /**
     * @var string $city
     * @SerializedName("City")
     * @Type("string")
     */
    public $city;

    /**
     * @var string $zipCode
     * @SerializedName("ZipCode")
     * @Type("string")
     */
    public $zipCode;

    /**
     * @var string $country
     * @SerializedName("Country")
     * @Type("string")
     */
    public $country;
}
