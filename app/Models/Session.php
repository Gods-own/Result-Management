<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_start',
        'session_end',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'session_id');
    }

    public function result()
    {
        return $this->hasOne(Result::class);
    }
}
