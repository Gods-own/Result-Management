<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterDevGrading extends Model
{
    use HasFactory;

    protected $table = 'character_dev_gradings';

    protected $fillable = [
        'grade',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function character_dev() 
    {
        return $this->belongsTo(CharacterDev::class, 'character_id');
    }

    public function term() 
    {
        return $this->belongsTo(Term::class);
    }
}
