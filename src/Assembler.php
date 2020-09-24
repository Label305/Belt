<?php


namespace Belt;


interface Assembler
{


    /**
     * @param mixed[] $item
     * @return void
     */
    public function receive(array $item): void;

}