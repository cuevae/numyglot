<?php


namespace Kurtgeiger\Numbers\Model;


interface Speller
{

    /**
     * @param $integer
     *
     * @return string
     */
    public function spellInteger($integer);

}