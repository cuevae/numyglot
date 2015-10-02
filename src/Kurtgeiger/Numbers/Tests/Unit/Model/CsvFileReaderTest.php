<?php


namespace Kurtgeiger\Numbers\Tests\Unit\Model;


use Kurtgeiger\Numbers\Model\CsvFileReader;

class CsvReaderTest extends \PHPUnit_Framework_TestCase
{

    /** @var CsvFileReader */
    private $reader;

    public function setUp()
    {
        $this->reader = new CsvFileReader();
    }

    public function testItCanBeInstantiated()
    {
        $this->assertTrue($this->reader instanceof \Kurtgeiger\Numbers\Model\CsvFileReader);
    }

    public function testItCanReadNonEmptyCsvFile()
    {
        $expected = [
            'XXI',
            'MCCIL',
            'MMXV'
        ];

        $filepath = PROJECT_ROOT . '/data/csv-input-roman.txt';
        $content  = $this->reader->readAndReturnAsArray($filepath);

        $this->assertSame($expected, $content);
    }


}