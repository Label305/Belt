<?php


namespace Belt;


use Belt\Data\DataBag;

interface Transformer
{

    /**
     * @param DataBag $dataBag
     * @return array
     */
    public function transform(DataBag $dataBag):array;

}