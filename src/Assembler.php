<?php


namespace Belt;


interface Assembler
{


    /**
     * @param array $item
     * @return void
     */
    public function receive(array $item);

}