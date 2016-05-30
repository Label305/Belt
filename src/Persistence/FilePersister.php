<?php


namespace Belt\Persistence;

use Belt\StringPersister;

class FilePersister implements StringPersister
{
    /**
     * @var string
     */
    private $path;

    /**
     * FilePersister constructor.
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @param string $item
     * @return void
     */
    public function append(string $item)
    {
        file_put_contents($this->path, $item, FILE_APPEND);
    }
}