<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['answer'];

    protected $table = 'answers';

    protected $casts = [
        'answer' => 'enum',
    ];

    public function survey() {
        return $this->belongsTo(Survey::class);
    }

    public function question() {
        return $this->belongsTo(Question::class);
    }
}
