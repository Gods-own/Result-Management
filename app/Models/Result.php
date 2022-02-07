<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'grade',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function subjects() 
    {
        return $this->belongsTo(Subject::class);
    }

    public function test1() 
    {
        return $this->belongsTo(Test1::class);
    }

    public function test2() 
    {
        return $this->belongsTo(Test2::class);
    }

    public function exam() 
    {
        return $this->belongsTo(Exam::class);
    }

    public function term() 
    {
        return $this->belongsTo(Term::class);
    }
}
