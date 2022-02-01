<?php
/*
Class Month
{
    public string $name;
    public int $days;

    public function __construct($name, $days)
    {
        $this->name = $name;
        $this->days = $days;
    }
}

Class Calendar
{
    public array $months = [];

    public function addMonth(Month $month)
    {
        $this->months[] = $month;
    }
} */

Class Date
{
    public int $day;
    public int $month;
    public int $year;

    public function __construct($year, $month, $day)
    {
        if()
        $this->year = $year;
        if($month < 12 && $month > 0) {
            $this->month = $month;
        } else {

        }
        if($year % 4 == 0 && $month == 2){
            if($day > 0 && $day <= )
        }
        $this->day = $day;
    }

    public function getDay():int
    {
        return $this->day;
    }

    public function setDay(int $input)
    {
        $this->day = $input;
    }

    public function getMonth():int
    {
        return $this->month;
    }

    public function setMonth(int $input)
    {
        $this->month = $input;
    }

    public function getYear():int
    {
        return $this->year;
    }

    public function setYear(int $input)
    {
        $this->year = $input;
    }

    public function displayDate():string
    {
        return $this->day . '/' . $this->month . '/' . $this->year . PHP_EOL;
    }
}