<?php


namespace Tests\Resources;


use Belt\Assembler;

class MemoryAssembler implements Assembler
{

    /**
     * @var array
     */
    private $data = [];

    /**
     * @param array $item
     * @return void
     */
    public function receive(array $item)
    {
        $this->data[] = $item;
    }

    /**
     * FOR TESTING PURPOSES!
     * @return array
     */
    public function getData():array
    {
        return $this->data;
    }
}