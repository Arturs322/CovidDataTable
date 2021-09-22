<?php
namespace App;

use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\TabularDataReader;

class CovidStatistics
{
    private string $path;
    private Reader $csvReader;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->csvReader = Reader::createFromPath("covid19.csv", "r");
        $this->csvReader->setHeaderOffset(0);
        $this->csvReader->setDelimiter(";");
    }
    public function getRecords(): TabularDataReader
    {
        return Statement::create()->process($this->csvReader);
    }
}