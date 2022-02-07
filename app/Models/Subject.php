<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
    ];

    public function subject_types() {
        return $this->belongsTo(SubjectType::class);
    }

    public function users() {
        return $this->belongstoMany(User::class, 'subject_teacher', 'subject_id', 'teacher_id')
            ->withTimestamps();
    }


    public function tests1()
    {
        return $this->hasMany(Test1::class);
    }

    public function tests2()
    {
        return $this->hasMany(Test2::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
