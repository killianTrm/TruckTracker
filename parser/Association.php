<?php

/**
 * Created by PhpStorm.
 * User: ysabelle
 * Date: 20/10/2016
 * Time: 15:09
 */
class Association
{
    var $name;
    var $idAssociation;
    var $address;
    var $description;
    var $theme;

    public function __construct($name, $idAssociation, $address, $description, $theme){
        $this->name = $name;
        $this->idAssociation = $idAssociation;
        $this->address = $address;
        $this->description = $description;
        $this->theme = $theme;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdAssociation()
    {
        return $this->idAssociation;
    }

    /**
     * @param mixed $idAssociation
     */
    public function setIdAssociation($idAssociation)
    {
        $this->idAssociation = $idAssociation;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function addDescription($description)
    {
        $this->description = $this->description.$description;
    }

    /**
     * @return mixed
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param mixed $theme
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;
    }

}