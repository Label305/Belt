<?php


namespace Belt\Assemblers;


use Belt\Assembler;
use Belt\StringPersister;

class CsvAssembler implements Assembler
{
    /**
     * @var StringPersister
     */
    private $persister;

    /**
     * CsvAssembler constructor.
     * @param StringPersister $persister
     */
    public function __construct(StringPersister $persister)
    {
        $this->persister = $persister;
    }

    /**
     * @param array $item
     * @return void
     */
    public function receive(array $item)
    {
        // TODO: Implement receive() method.
    }
}