<?php

namespace Belt\Providers;


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
            $dataBag = new DataBag();
            foreach ($item as $key => $value) {
                $dataBag->add($key, $value);
            }
            yield $dataBag;
        }
    }
}