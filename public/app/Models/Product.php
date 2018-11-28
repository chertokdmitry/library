<?php

namespace App\Models;

class Product extends ElasticSearchModel
{
    protected static $_index = 'test';
    protected static $_type = 'test';

    public $name;
    public $price = 0;

//    protected $fillable = [
//        'id', 'name', 'price',
//    ];
}
