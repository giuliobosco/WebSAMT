<?php


class Product
{
    private $title;
    private $price;

    function __construct(String $t, float $p)
    {
        $this->title = $t;
        $this->price = $p;
    }

    function getTitle(): String
    {
        return $this->title;
    }

    function getPrice(): float
    {
        return $this->price;
    }

}