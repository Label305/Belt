<?php


namespace Tests\Persistence;


use Belt\Persistence\FilePersister;
use Tests\TestCase;

class FilePersisterTest extends TestCase
{

    public function test_append()
    {
        /* Given */
        $tmpfile = tmpfile();

        $path = stream_get_meta_data($tmpfile)['uri'];

        /* When */
        $filePersister = new FilePersister($path);
        $filePersister->append('foobar');

        /* Then */
        $result = file_get_contents($path);
        $this->assertEquals('foobar', $result);
    }

    public function test_append_multiple()
    {
        /* Given */
        $tmpfile = tmpfile();

        $path = stream_get_meta_data($tmpfile)['uri'];

        /* When */
        $filePersister = new FilePersister($path);
        $filePersister->append('foo');
        $filePersister->append('bar');

        /* Then */
        $result = file_get_contents($path);
        $this->assertEquals('foobar', $result);
    }

}