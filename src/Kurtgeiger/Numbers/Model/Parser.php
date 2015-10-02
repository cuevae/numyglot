<?php


namespace Kurtgeiger\Numbers\Model;


interface Parser
{

    /**
     * @param string $input
     *
     * @return int
     */
    public function parseToInteger($input);

}