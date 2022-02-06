<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    protected $fillable = [
        'term',
    ];

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

    public function remarks()
    {
        return $this->hasMany(Remark::class);
    }

    public function character_dev_gradings()
    {
        return $this->hasMany(characterDevGrading::class);
    }
}
