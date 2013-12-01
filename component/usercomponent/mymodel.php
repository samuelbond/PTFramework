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

    public function insertNewUser($usercomponent){

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

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }


}