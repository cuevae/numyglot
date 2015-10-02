<?php


namespace Kurtgeiger\Numbers\Tests\Unit\Model;


use Kurtgeiger\Numbers\Model\ItalianSpeller;

class ItalianSpellerTest extends \PHPUnit_Framework_TestCase
{

    public function testItCanSpellIntegerOne()
    {
        $expected = 'uno';
        $speller = new ItalianSpeller();
        $result = $speller->spellInteger(1);

        $this->assertEquals($expected, $result);
    }

    public function testItCanSpellIntegerTwo()
    {
        $expected = 'due';
        $speller = new ItalianSpeller();
        $result = $speller->spellInteger(2);

        $this->assertEquals($expected, $result);
    }

    public function testItCanSpellIntegerHundredAndOne()
    {
        $expected = 'centouno';
        $speller = new ItalianSpeller();
        $result = $speller->spellInteger(101);

        $this->assertEquals($expected, $result);
    }

}