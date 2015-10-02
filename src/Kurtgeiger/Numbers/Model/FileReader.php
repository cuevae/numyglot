<?php


namespace Kurtgeiger\Numbers\Model;


interface FileReader
{

    /**
     * @param $filepath
     *
     * @return array
     */
    public function readAndReturnAsArray($filepath);

}