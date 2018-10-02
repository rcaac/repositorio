<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
    protected  $table = 'book_user';

    public function book()
    {
        return$this->belongsTo(Book::class);
    }
}
