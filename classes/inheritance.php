<?php
abstract class Person
{
    private $first_name;
    private $last_name;

    function __construct($first, $last)
    {
        $this->first_name = $first;
        $this->last_name = $last;
    }

    function show_person()
    {
        return "My name is, " . $this->first_name . " " . $this->last_name . "!";
    }
}

class Programmer extends Person
{
    private $langs;

    function __construct($first, $last)
    {
        parent::__construct($first, $last);
        $this->langs = [];
    }

    function set_lang($lang)
    {
        array_push($this->langs, $lang);
    }

    function describe()
    {
        echo parent::show_person();
        echo "<br>";
        echo "I know also PHP!";
        echo "<br>";
        print_r($this->langs);
    }
}


$programmer = new Programmer('Nikolay', 'Nikolaev');
$programmer->set_lang('Java');
$programmer->set_lang('MySql');
$programmer->describe();
