<?php


namespace Kurtgeiger\Numbers\Model;


class CsvFileReader
{

    /**
     * CsvReader constructor.
     */
    public function __construct()
    {
    }

    public function readAndReturnAsArray($filepath)
    {
        $handle = fopen($filepath, 'r');
        $actual = [];
        while(($result = fgetcsv($handle)) !== false){
            $actual[] = $result[0];
        };

        return $actual;
    }
}