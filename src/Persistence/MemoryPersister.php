<?php


namespace Belt\Persistence;


use Belt\StringPersister;

class MemoryPersister implements StringPersister
{

    private $str = '';

    /**
     * @param string $item
     * @return void
     */
    public function append(string $item)
    {
        $this->str .= $item;
    }

    /**
     * @return string
     */
    public function getString():string
    {
        return $this->str;
    }
}