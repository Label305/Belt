<?php


namespace Belt\Assemblers;


use Belt\Assembler;
use Belt\StringPersister;

class CsvAssembler implements Assembler
{
    /**
     * @var StringPersister
     */
    private $persister;

    /**
     * @var array
     */
    private $header;

    /**
     * @var resource
     */
    private $helper;

    /**
     * CsvAssembler constructor.
     * @param StringPersister $persister
     */
    public function __construct(StringPersister $persister)
    {
        $this->persister = $persister;
        $this->helper = fopen('php://memory', 'r+');
    }

    /**
     * @param array $item
     * @return void
     */
    public function receive(array $item)
    {
        if (!isset($this->header)) {
            $this->header = array_values(array_keys($item));
            $this->write($this->header);
        }

        $item = $this->prepare($item);

        $this->write($item);
    }

    /**
     * @param array $item
     * @return array
     */
    private function prepare(array $item):array
    {
        if (!isset($this->header)) {
            return $item;
        }

        $result = [];
        foreach ($this->header as $header) {
            $result[] = $item[$header] ?? '';
        }

        return $result;
    }

    /**
     * @param array $item
     */
    private function write(array $item)
    {
        //Clear the helper file
        rewind($this->helper);
        ftruncate($this->helper, 0);
        
        //Put the CSV line
        fputcsv($this->helper, $item);

        //Read the written line
        rewind($this->helper);
        $contents = '';
        while (!feof($this->helper)) {
            $contents .= fread($this->helper, 1024);
        }

        $this->persister->append($contents);
    }

}