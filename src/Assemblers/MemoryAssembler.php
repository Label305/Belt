<?php

namespace Belt\Assemblers;


use Belt\Assembler;

class MemoryAssembler implements Assembler
{

    /**
     * @var mixed[]
     */
    private $data = [];

    /**
     * @param mixed[] $item
     * @return void
     */
    public function receive(array $item): void
    {
        $this->data[] = $item;
    }

    /**
     * @return mixed[]
     */
    public function getData(): array
    {
        return $this->data;
    }
}