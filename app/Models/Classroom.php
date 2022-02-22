<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $table = 'class_rooms';

    protected $fillable = [
        'user_id',
        'class_room',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'class_room_id');
    }

    public function subject_types() {
        return $this->belongsToMany(SubjectType::class, 'class_subject_type', 'class_id', 'subject_type_id')
            ->using(ClassType::class);
    }
}
