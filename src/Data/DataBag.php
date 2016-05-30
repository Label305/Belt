<?php


namespace Belt\Data;


class DataBag
{

    /**
     * @var array
     */
    private $data = [];

    /**
     * @param string $key
     * @param        $value
     */
    public function add(string $key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function get(string $key)
    {
        return $this->data[$key] ?? null;
    }

    /**
     * @return array
     */
    public function dump():array
    {
        return $this->data;
    }
}