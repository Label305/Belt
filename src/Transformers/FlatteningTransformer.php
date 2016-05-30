<?php


namespace Belt\Transformers;


use Belt\Data\DataBag;
use Belt\Transformer;

class FlatteningTransformer implements Transformer
{

    /**
     * @param DataBag $dataBag
     * @return string
     */
    public function transform(DataBag $dataBag):array
    {
        $result = [];
        $data = $dataBag->dump();
        foreach ($data as $key => $value) {
            if ($value instanceof DataBag) {
                $result = array_merge($result, $this->transform($value));
            } else {
                $result[$key] = $value;
            }
        }

        return $result;
    }
}