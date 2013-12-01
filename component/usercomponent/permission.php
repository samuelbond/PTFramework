<?php
/**
 * @author bond
 * copyright 12/1/13
 */

namespace usercomponent;


class permission {

    private $permid;
    private $permdesc;


    /**
     * @param mixed $permdesc
     */
    public function setPermdesc($permdesc)
    {
        $this->permdesc = $permdesc;
    }

    /**
     * @return mixed
     */
    public function getPermdesc()
    {
        return $this->permdesc;
    }

    /**
     * @param mixed $permid
     */
    public function setPermid($permid)
    {
        $this->permid = $permid;
    }

    /**
     * @return mixed
     */
    public function getPermid()
    {
        return $this->permid;
    }




}