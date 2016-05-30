<?php


namespace Tests;


use Belt\Data\DataBag;
use Belt\Exporter;
use Belt\Transformers\FlatteningTransformer;
use Tests\Resources\MemoryAssembler;
use Tests\Resources\MemoryProvider;

class ExporterTest extends TestCase
{

    public function test_export()
    {
        /* Given */
        $a = new DataBag();
        $a->add('key', 3);

        $b = new DataBag();
        $b->add('key', 7);

        $dataProvider = new MemoryProvider([$a, $b]);

        $transformer = new FlatteningTransformer();

        $memoryAssembler = new MemoryAssembler();

        /* When */
        Exporter::export($dataProvider, $transformer, $memoryAssembler);

        /* Then */
        $data = $memoryAssembler->getData();
        $this->assertCount(2, $data);
        $this->assertEquals(3, $data[0][0]);
        $this->assertEquals(7, $data[1][0]);
    }


}