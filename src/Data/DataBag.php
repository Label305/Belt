<?php


namespace Belt\Data;


class DataBag
{

    /**
     * @var mixed[]
     */
    private $data = [];

    /**
     * @param string $key
     * @param mixed $value
     */
    public function add(string $key, $value): void
    {
        $this->data[$key] = $value;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function get(string $key)
    {
        return $this->data[$key] ?? null;
    }

    /**
     * @return mixed[]
     */
    public function dump(): array
    {
        return $this->data;
    }
}