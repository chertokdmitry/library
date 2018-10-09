<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function author()
    {
        return $this->hasOne('App\Author', 'id', 'author_id');
    }
}
