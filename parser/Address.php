<?php

/**
 * Created by PhpStorm.
 * User: Jordi
 * Date: 24/10/2016
 * Time: 23:26
 */
class Address
{
    var $street;
    var $zipcode;
    var $city;

    /**
     * Address constructor.
     * @param $street
     * @param $zipcode
     * @param $city
     */
    public function __construct($address)
    {
        if(count($address) == 5){
            $street = "rue non connue";
            $zipcode = "$address";
            $city = "";
        }
        else {
            $addressArray = explode(",", $address);
            if (count($addressArray) > 2) {
                $street = $addressArray[0] . ", " . $addressArray[1];
                $zipcodeAndCity = explode(" ", $addressArray[2]);
                if (count($zipcodeAndCity) <= 2) {
                    $city = $zipcodeAndCity[1];
                    $zipcode = "";
                } else {
                    $zipcode = $zipcodeAndCity[1];
                    $city = $zipcodeAndCity[2];
                }
            } else if (count($addressArray) == 1) {
                $street = "";
                $zipcodeAndCity = explode(" ", $addressArray[0]);
                if (count($zipcodeAndCity) <= 2) {
                    $city = $zipcodeAndCity[1];
                    $zipcode = "";
                } else {
                    $zipcode = $zipcodeAndCity[1];
                    $city = $zipcodeAndCity[2];
                }
            } else {
                $street = $addressArray[0];
                if ($addressArray[1] != "") {
                    $zipcodeAndCity = explode(" ", $addressArray[1]);
                    if (count($zipcodeAndCity) <= 2) {
                        if ($zipcodeAndCity[1] != "") {
                            $city = $zipcodeAndCity[1];
                            $zipcode = "";
                        } else {
                            $city = "";
                            $zipcode = "";
                        }

                    } else {
                        $zipcode = $zipcodeAndCity[1];
                        $city = $zipcodeAndCity[2];
                    }
                } else {
                    $city = "";
                    $zipcode = "";
                }
            }
        }
        $this->street = $street;
        $this->zipcode = $zipcode;
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param mixed $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }


}