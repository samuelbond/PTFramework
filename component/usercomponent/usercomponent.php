<?php
/**
 * @author bond
 * copyright 12/1/13
 */

namespace usercomponent;
include "mymodel.php";

use application\basecomponent;

class usercomponent extends basecomponent{

    private $userid;
    private $firstname;
    private $lastname;
    private $email;
    private $mobile;
    private $landline;
    private $address;
    private $city;
    private $country;
    private $datecreated;
    private $lastmodified;
    private $mymodel;
    private $actionError;


    public function init()
    {
        $this->mymodel = new mymodel($this->registry);
        $this->datecreated = date("Y.m.d");
        $this->actionError = false;
    }


    public function __toString()
    {
        return "usercomponent";
    }


    public function registerNewUser(){
        if($this->mymodel->insertNewUser($this)){
           return true;
        }
        $this->actionError = true;
        return false;
    }


    public function getUser()
    {
        if(!($object = $this->mymodel->findUser($this)))
        {
            $this->actionError = true;
            return null;
        }

        return $object;
    }

    public function editUser()
    {
        if($this->mymodel->updateUser($this))
        {
            return true;
        }

        $this->actionError = true;
        return false;
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
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }


    /**
     * @return mixed
     */
    public function getDatecreated()
    {
        return $this->datecreated;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $landline
     */
    public function setLandline($landline)
    {
        $this->landline = $landline;
    }

    /**
     * @return mixed
     */
    public function getLandline()
    {
        return $this->landline;
    }


    /**
     * @return mixed
     */
    public function getLastmodified()
    {
        return $this->lastmodified;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }


    /**
     * @param mixed $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param mixed $lastmodified
     */
    public function setLastmodified($lastmodified)
    {
        $this->lastmodified = $lastmodified;
    }

    /**
     * @param mixed $datecreated
     */
    public function setDatecreated($datecreated)
    {
        $this->datecreated = $datecreated;
    }





}