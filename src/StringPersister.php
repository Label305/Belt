<?php


namespace Belt;


interface StringPersister
{

    /**
     * @param string $item
     * @return void
     */
    public function append(string $item);
}