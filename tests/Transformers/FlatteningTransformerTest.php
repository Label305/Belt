<?php


namespace Tests\Transformers;


use Belt\Data\DataBag;
use Belt\Transformers\FlatteningTransformer;
use Tests\TestCase;

class FlatteningTransformerTest extends TestCase
{

    public function test_shouldflatten()
    {
        /* Given */
        $dataBag = new DataBag();
        $dataBag->add('foo', 'bar');
        $dataBag->add('blub', 2);

        /* When */
        $flatteningTransformer = new FlatteningTransformer();
        $result = $flatteningTransformer->transform($dataBag);

        /* Then */
        $expected = [
            'foo' => 'bar',
            'blub' => 2
        ];

        $this->assertEquals($expected, $result);
    }

    public function test_nested()
    {
        /* Given */
        $nested = new DataBag();
        $nested->add('name', 'Joris');
        $nested->add('company', 'Label305');

        $dataBag = new DataBag();
        $dataBag->add('foo', 'bar');
        $dataBag->add('company', $nested);
        $dataBag->add('blub', 2);

        /* When */
        $flatteningTransformer = new FlatteningTransformer();
        $result = $flatteningTransformer->transform($dataBag);

        /* Then */
        $expected = [
            'foo' => 'bar',
            'name' => 'Joris',
            'company' => 'Label305',
            'blub' => 2
        ];

        $this->assertEquals($expected, $result);
    }

}