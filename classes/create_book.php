<?php
class Book
{
    public $title;
    public $author;
    public $price;

    function __construct($title, $author, $price)
    {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    function show_books()
    {
        echo "Book: " . $this->title . ", " . $this->author . ", " . $this->price;
    }
}


$book = new Book('PHP', 'Nikolay', 30.15);

echo $book->show_books();
