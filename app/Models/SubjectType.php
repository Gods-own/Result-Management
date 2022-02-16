<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectType extends Model
{
    use HasFactory;

    protected $table = 'subject_types';

    protected $fillable = [
        'subject_type',
    ];

    public function subjects() {
        return $this->hasMany(Subject::class, 'subject_type_id');
    }

    public function class_rooms() {
        return $this->belongstoMany(Classroom::class, 'class_subject_type', 'class_id', 'subject_type_id')
            ->using(ClassType::class);
    }
}
