<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestigationUser extends Model
{
    protected  $table = 'investigation_user';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function investigation()
    {
        return $this->belongsTo(Investigation::class);
    }
}
