<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected  $table = 'status';

    public function investigation()
    {
        return $this->belongsTo(Investigation::class);
    }
}
