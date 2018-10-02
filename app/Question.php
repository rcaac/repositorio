<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $casts = [
        'option_name' => 'array',
    ];
    protected $fillable = ['title', 'question_type', 'option_name', 'survey_id', 'valuation_id'];

    protected $perPage = 3;

    public function survey() {
        return $this->belongsTo(Survey::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function valuation() {
        return $this->belongsTo(Valuation::class);
    }
}
