<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_pic',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function student_types() {
        return $this->belongsTo(StudentType::class);
    }

    public function sessions()
    {
        return $this->belongsTo(Session::class);
    }

    public function class_rooms()
    {
        return $this->belongsTo(Classroom::class);
    }
}
