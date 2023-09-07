<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function record()
    {
        return $this->hasOne(Record::class);
    }
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
    public function examinees()
    {
        return $this->hasMany(Examinee::class);
    }
    public function exam_requests()
    {
        return $this->hasMany(ExamRequest::class);
    }
    public function result()
    {
        return $this->hasOne(Result::class);
    }
}
