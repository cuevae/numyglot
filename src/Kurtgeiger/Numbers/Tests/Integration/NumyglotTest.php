<?php


namespace Kurtgeiger\Numbers\Model\Tests\Integration;


use Kurtgeiger\Numbers\Model\CsvFileReader;
use Kurtgeiger\Numbers\Model\ItalianSpeller;
use Kurtgeiger\Numbers\Model\Numyglot;
use Kurtgeiger\Numbers\Model\RomanNumeralsParser;

class NumyglotTest extends \PHPUnit_Framework_TestCase
{

    public function testItCanReadRomanNumbersFromCsvAndGenerateItalianOutput()
    {
        $expected = [
            'ventuno',
            'milleduecentocinquantuno',
            'duemilaquindici'
        ];

        $csvReader = new CsvFileReader();
        $romanNumeralsParser = new RomanNumeralsParser();
        $italianSpeller = new ItalianSpeller();
        $numyglot = new Numyglot($csvReader, $romanNumeralsParser, $italianSpeller);

        $result = $numyglot
            ->read(PROJECT_ROOT . '/data/csv-input-roman.txt')
            ->spellToItalian()
            ->toArray();

        $this->assertEquals($expected, $result);
    }

}