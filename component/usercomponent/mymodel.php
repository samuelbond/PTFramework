<?php
/**
 * @author bond
 * copyright 12/1/13
 */

namespace usercomponent;


class mymodel {

    private $registry;
    private $error;

    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    public function insertNewUser($usercomponent)
    {

        $sql = "INSERT INTO user (`user_id`, `firstname`, `lastname`, `email`, `mobile`, `landline`, `address`, `city`, `country`,
        `date_created`) values (?,?,?,?,?,?,?,?,?,?) ";

            if($stmt = $this->registry->model->prepare($sql)){

                if($stmt->bind_param("ssssssssss",$usercomponent->getUserid(), $usercomponent->getFirstname(), $usercomponent->getLastname(), $usercomponent->getEmail(),
                    $usercomponent->getMobile(), $usercomponent->getLandline(), $usercomponent->getAddress(), $usercomponent->getCity(),
                    $usercomponent->getCountry(), $usercomponent->getDatecreated()))
                {
                    if($stmt->execute()){
                        return true;
                    }
                }

            }

        $this->error = true;
        return false;
    }


    public function updateUser($usercomponent)
    {

        $sql = "UPDATE `user` SET `firstname`=?,`lastname`=?,`email`=?,`mobile`=?,`landline`=?,`address`=?,`city`=?,`country`=?,
                `date_created`=? WHERE user_id = ?";

        if($stmt = $this->registry->model->prepare($sql)){

            if($stmt->bind_param("ssssssssss", $usercomponent->getFirstname(), $usercomponent->getLastname(), $usercomponent->getEmail(),
                $usercomponent->getMobile(), $usercomponent->getLandline(), $usercomponent->getAddress(), $usercomponent->getCity(),
                $usercomponent->getCountry(), $usercomponent->getDatecreated(), $usercomponent->getUserid()))
            {
                if($stmt->execute()){
                    return true;
                }
            }

        }

        $this->error = true;
        return false;
    }


    public function findUser($usercomponent)
    {

        $userid = $fname = $lname = $email = $mobile = $landline = $address = $city = $country = $date_created = $modified = "";
        $sql = "SELECT * FROM user WHERE user_id = ?";

        if($stmt = $this->registry->model->prepare($sql)){

            if($stmt->bind_param("s",$usercomponent->getUserid()))
            {
                if($stmt->execute()){
                    $stmt->bind_result($userid, $fname, $lname, $email, $mobile, $landline, $address, $city, $country, $date_created, $modified);
                    $stmt->fetch();
                    $usercomponent->setUserid($userid);
                    $usercomponent->setEmail($email);
                    $usercomponent->setFirstname($fname);
                    $usercomponent->setLastname($lname);
                    $usercomponent->setMobile($mobile);
                    $usercomponent->setLandline($landline);
                    $usercomponent->setAddress($address);
                    $usercomponent->setCity($city);
                    $usercomponent->setCountry($country);
                    $usercomponent->setDatecreated($date_created);
                    $usercomponent->setLastmodified($modified);
                    return $usercomponent;
                }
            }

        }
        $this->error = true;
        return false;
    }


    public function insertNewRole($roleObject)
    {
        $sql = "INSERT INTO roles (`role_id`, `role_desc`) values (?,?) ";

        if($stmt = $this->registry->model->prepare($sql)){

            if($stmt->bind_param("ss",$roleObject->getRoleid(), $roleObject->getRoledesc()))
            {
                if($stmt->execute()){
                    return true;
                }
            }

        }
        $this->error = true;
        return false;
    }


    public function insertNewPermission($permObject)
    {

        $sql = "INSERT INTO permissions (`perm_id`, `perm_desc`) values (?,?) ";

        if($stmt = $this->registry->model->prepare($sql)){

            if($stmt->bind_param("ss",$permObject->getPermid(), $permObject->getPermdesc()))
            {
                if($stmt->execute()){
                    return true;
                }
            }

        }
        $this->error = true;
        return false;
    }


    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }


}