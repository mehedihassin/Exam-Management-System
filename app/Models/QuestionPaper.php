<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionPaper extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
