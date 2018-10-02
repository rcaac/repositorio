<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investigation extends Model
{
    protected  $table = 'investigations';

    protected $fillable = ['title', 'summary', 'page', 'dimension', 'size', 'file', 'cover', 'state_id', 'subject_id', 'user_id'];

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function downloads()
    {
        return $this->hasMany(InvestigationUser::class);
    }
}
