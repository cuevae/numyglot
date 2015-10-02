<?php


namespace Kurtgeiger\Numbers\Model;


class ItalianSpeller
{

    /**
     * ItallianSpeller constructor.
     */
    public function __construct()
    {
    }

    public function spellInteger($int)
    {
        $intlNumberFormatter = new \NumberFormatter('it-IT', \NumberFormatter::SPELLOUT);
        $intlFormatted = $intlNumberFormatter->format($int, \NumberFormatter::TYPE_INT32);

        //Clean up any weird characters
        $afterCleanUp = preg_replace('/[^A-Za-z\-]/', '', $intlFormatted);

        return $afterCleanUp;
    }
}