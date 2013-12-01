<?php
/**
 * @author bond
 * copyright 12/1/13
 */

namespace usercomponent;


class role {

    private $roleid;
    private $roledesc;



    /**
     * @param mixed $roledesc
     */
    public function setRoledesc($roledesc)
    {
        $this->roledesc = $roledesc;
    }

    /**
     * @return mixed
     */
    public function getRoledesc()
    {
        return $this->roledesc;
    }

    /**
     * @param mixed $roleid
     */
    public function setRoleid($roleid)
    {
        $this->roleid = $roleid;
    }

    /**
     * @return mixed
     */
    public function getRoleid()
    {
        return $this->roleid;
    }




}