<?php


namespace Tests\Resources;


use Belt\Data\DataBag;
use Belt\Provider;

class MemoryProvider implements Provider
{
    /**
     * @var array
     */
    private $data;

    /**
     * MemoryProvider constructor.
     * @param DataBag[] $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return DataBag
     */
    public function next()
    {
        foreach ($this->data as $item) {
            yield $item;
        }
    }
}