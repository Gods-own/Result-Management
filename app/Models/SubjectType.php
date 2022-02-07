<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectType extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_type',
    ];

    public function subjects() {
        return $this->hasMany(Subject::class);
    }
}
