<?php


namespace Belt;


class Exporter
{

    /**
     * @param Provider    $provider
     * @param Transformer $transformer
     * @param Assembler   $assembler
     */
    public static function export(Provider $provider, Transformer $transformer, Assembler $assembler): void
    {
        foreach ($provider->next() as $item) {
            $data = $transformer->transform($item);

            $assembler->receive($data);
        }
    }

}