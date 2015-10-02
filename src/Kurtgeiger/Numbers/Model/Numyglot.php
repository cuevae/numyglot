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
     * @param CsvFileReader       $csvReader
     * @param RomanNumeralsParser $romanNumeralsParser
     * @param ItalianSpeller      $italianSpeller
     */
    public function __construct($csvReader, $romanNumeralsParser, $italianSpeller)
    {
        $this->reader  = $csvReader;
        $this->parser  = $romanNumeralsParser;
        $this->speller = $italianSpeller;
    }

    /**
     * @param $filePath
     *
     * @return Numyglot
     */
    public function readCsv($filePath)
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