<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected  $table = 'surveys';

    protected $fillable = ['title', 'description', 'user_id', 'created_at', 'updated_at'];

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }
}
