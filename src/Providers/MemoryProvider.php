<?php

namespace Belt\Providers;


use Belt\Data\DataBag;
use Belt\Provider;

class MemoryProvider implements Provider
{
    /**
     * @var mixed[]
     */
    private $data;

    /**
     * MemoryProvider constructor.
     * @param mixed[] $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return DataBag[]
     */
    public function next(): iterable
    {
        foreach ($this->data as $item) {
            $dataBag = new DataBag();
            foreach ($item as $key => $value) {
                $dataBag->add($key, $value);
            }
            yield $dataBag;
        }
    }
}