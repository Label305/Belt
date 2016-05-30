<?php


namespace Tests\Assemblers;


use Belt\Assemblers\CsvAssembler;
use Belt\Exporter;
use Belt\Persistence\MemoryPersister;
use Belt\Providers\MemoryProvider;
use Belt\Transformers\FlatteningTransformer;
use Tests\TestCase;

class CsvAssemblerTest extends TestCase
{

    public function test_export_csv()
    {
        /* Given */
        $a = [
            'first_name' => 'Joris',
            'last_name' => 'Blaak'
        ];
        $b = [
            'first_name' => 'Jisca',
            'last_name' => 'Klok'
        ];
        $provider = new MemoryProvider([$a, $b]);
        $transformer = new FlatteningTransformer();
        $persister = new MemoryPersister();

        $csvAssembler = new CsvAssembler($persister);

        /* When */
        Exporter::export($provider, $transformer, $csvAssembler);

        /* Then */
        $expected = <<<CSV
first_name,last_name
Joris,Blaak
Jisca,Klok
CSV;
        $this->assertEquals($expected, trim($persister->getString()));
    }

    public function test_assembleSepecialChars()
    {
        /* Given */
        $a = [
            'first_name' => 'Joris',
            'last_name' => 'B"laak'
        ];
        $b = [
            'first_name' => 'Jisca',
            'last_name' => 'K,lok'
        ];
        $provider = new MemoryProvider([$a, $b]);
        $transformer = new FlatteningTransformer();
        $persister = new MemoryPersister();

        $csvAssembler = new CsvAssembler($persister);

        /* When */
        Exporter::export($provider, $transformer, $csvAssembler);

        /* Then */
        $expected = <<<CSV
first_name,last_name
Joris,"B""laak"
Jisca,"K,lok"
CSV;
        $this->assertEquals($expected, trim($persister->getString()));
    }

    public function test_assembledOrderOfFields()
    {
        /* Given */
        $a = [
            'first_name' => 'Joris',
            'last_name' => 'Blaak'
        ];
        $b = [
            'last_name' => 'Klok',
            'first_name' => 'Jisca'
        ];
        $provider = new MemoryProvider([$a, $b]);
        $transformer = new FlatteningTransformer();
        $persister = new MemoryPersister();

        $csvAssembler = new CsvAssembler($persister);

        /* When */
        Exporter::export($provider, $transformer, $csvAssembler);

        /* Then */
        $expected = <<<CSV
first_name,last_name
Joris,Blaak
Jisca,Klok
CSV;
        $this->assertEquals($expected, trim($persister->getString()));
    }

    public function test_assembledExtraFields()
    {
        /* Given */
        $a = [
            'first_name' => 'Joris',
            'last_name' => 'Blaak'
        ];
        $b = [
            'last_name' => 'Klok',
            'first_name' => 'Jisca',
            'company' => 'Label305'
        ];
        $provider = new MemoryProvider([$a, $b]);
        $transformer = new FlatteningTransformer();
        $persister = new MemoryPersister();

        $csvAssembler = new CsvAssembler($persister);

        /* When */
        Exporter::export($provider, $transformer, $csvAssembler);

        /* Then */
        $expected = <<<CSV
first_name,last_name
Joris,Blaak
Jisca,Klok
CSV;
        $this->assertEquals($expected, trim($persister->getString()));
    }

    public function test_assembledMissingFields()
    {
        /* Given */
        $a = [
            'first_name' => 'Joris',
            'last_name' => 'Blaak',
            'company' => 'Label305'
        ];
        $b = [
            'last_name' => 'Klok',
            'first_name' => 'Jisca',
        ];
        $provider = new MemoryProvider([$a, $b]);
        $transformer = new FlatteningTransformer();
        $persister = new MemoryPersister();

        $csvAssembler = new CsvAssembler($persister);

        /* When */
        Exporter::export($provider, $transformer, $csvAssembler);

        /* Then */
        $expected = <<<CSV
first_name,last_name,company
Joris,Blaak,Label305
Jisca,Klok,
CSV;
        $this->assertEquals($expected, trim($persister->getString()));
    }

}