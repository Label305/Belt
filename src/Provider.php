<?php


namespace Belt;


use Belt\Data\DataBag;

interface Provider
{

    /**
     * @return DataBag
     */
    public function next();

}