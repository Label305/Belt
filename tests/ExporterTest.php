<?php


namespace Tests;


use Belt\Assemblers\CsvAssembler;
use Belt\Assemblers\MemoryAssembler;
use Belt\Exporter;
use Belt\Providers\MemoryProvider;
use Belt\Transformers\FlatteningTransformer;

class ExporterTest extends TestCase
{

    public function test_export()
    {
        /* Given */
        $a = [
            'key' => 3
        ];
        $b = [
            'key' => 7
        ];
        $dataProvider = new MemoryProvider([$a, $b]);
        $transformer = new FlatteningTransformer();
        $memoryAssembler = new MemoryAssembler();

        /* When */
        Exporter::export($dataProvider, $transformer, $memoryAssembler);

        /* Then */
        $data = $memoryAssembler->getData();
        $this->assertCount(2, $data);
        $this->assertEquals(3, $data[0]['key']);
        $this->assertEquals(7, $data[1]['key']);
    }

}