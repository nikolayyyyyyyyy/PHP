<?php
class Article
{
    public $title;
    public $author;
    public $description;

    function __construct($title, $author, $description)
    {
        $this->title = $title;
        $this->author = $author;
        $this->description = $description;
    }

    function show_article()
    {
        return "Title: " . $this->title . " Author: " . $this->author . " Description: " . $this->description;
    }
}

class Person
{
    public $first_name;
    public $last_name;
    public $email;

    function __construct($first, $last, $email)
    {
        $this->first_name = $first;
        $this->last_name = $last;
        $this->email = $email;
    }

    function show_person()
    {
        return "First Name: " . $this->first_name . " Last Name: " . $this->last_name . " Email: " . $this->email;
    }
}