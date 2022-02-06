<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterDev extends Model
{
    use HasFactory;

    protected $fillable = [
        'character',
    ];

    public function character_dev_gradings()
    {
        return $this->hasMany(CharacterDevGrading::class, 'character_id');
    }
}
