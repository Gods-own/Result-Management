<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function subject() 
    {
        return $this->belongsTo(Subject::class);
    }

    public function term() 
    {
        return $this->belongsTo(Term::class);
    }

    public function result()
    {
        return $this->hasOne(Result::class);
    }
}
