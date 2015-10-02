<?php


namespace Kurtgeiger\Numbers\Tests\Unit\Model;


use Kurtgeiger\Numbers\Model\RomanNumeralsParser;

class RomanNumeralsParserTest extends \PHPUnit_Framework_TestCase
{

    /** @var  RomanNumeralsParser */
    private $parser;

    public function setUp()
    {
        $this->parser = new RomanNumeralsParser();
    }

    public function testItCanParseSymbolForNumberOne()
    {
        $expected = 1;
        $input = 'I';

        $result = $this->parser->parseToInteger($input);

        $this->assertSame($expected, $result);
    }

    public function testItCanParseSymbolForNumberTwo()
    {
        $expected = 2;
        $input = 'II';

        $result = $this->parser->parseToInteger($input);

        $this->assertSame($expected, $result);
    }

    public function testItCanParseSymbolForNumberThree()
    {
        $expected = 3;
        $input = 'III';

        $result = $this->parser->parseToInteger($input);

        $this->assertSame($expected, $result);
    }

    public function testItCanParseSymbolForNumberFive()
    {
        $expected = 5;
        $input = 'V';

        $result = $this->parser->parseToInteger($input);

        $this->assertSame($expected, $result);
    }

    public function testItCanParseSymbolForNumberSix()
    {
        $expected = 6;
        $input = 'VI';

        $result = $this->parser->parseToInteger($input);

        $this->assertSame($expected, $result);
    }

    public function testItCanParseSymbolsForNumberTwentyEight()
    {
        $expected = 28;
        $input = 'XXVIII';

        $result = $this->parser->parseToInteger($input);

        $this->assertSame($expected, $result);
    }

    public function testItCanParseSymbolsForNumberFour()
    {
        $expected = 4;
        $input = 'IV';

        $result = $this->parser->parseToInteger($input);

        $this->assertSame($expected, $result);
    }

    public function testItCanParseSymbolsForNinetyNine()
    {
        $expected = 99;
        $input = 'XCIX';

        $result = $this->parser->parseToInteger($input);

        $this->assertSame($expected, $result);
    }

    public function invalidRomanNumbers()
    {
        return [
            ['IC'],
            ['IL'],
            ['XD'],
            ['XM']
        ];
    }

    /**
     * @dataProvider invalidRomanNumbers
     * @expectedException \InvalidArgumentException
     */
    public function testItThrowsInvalidNumberExceptionWhenGivenInvalidRomanNumbers($invalidInput)
    {
        $this->parser->parseToInteger($invalidInput);
    }

}