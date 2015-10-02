<?php


namespace Kurtgeiger\Numbers\Model;


class Numyglot
{
    private $reader;

    private $parser;

    private $speller;

    private $readBuffer = [ ];

    private $spellBuffer = [ ];

    /**
     * Numyglot constructor.
     *
     * @param FileReader  $reader
     * @param Parser  $parser
     * @param Speller $speller
     *
     */
    public function __construct(FileReader $reader, Parser $parser, Speller $speller)
    {
        $this->reader  = $reader;
        $this->parser  = $parser;
        $this->speller = $speller;
    }

    /**
     * @param $filePath
     *
     * @return Numyglot
     */
    public function read($filePath)
    {
        $content          = $this->reader->readAndReturnAsArray($filePath);
        $read = [];
        foreach($content as $entry)
        {
            $integer = $this->parser->parseToInteger($entry);
            $read[] = $integer;
        }
        $this->readBuffer = $read;

        return $this;
    }

    /**
     * @return Numyglot
     */
    public function spellToItalian()
    {
        $spelt = [ ];
        foreach ($this->readBuffer as $integer)
        {
            $spelt[] = $this->speller->spellInteger($integer);
        }

        $this->spellBuffer = $spelt;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->spellBuffer;
    }

}