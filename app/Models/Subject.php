<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
