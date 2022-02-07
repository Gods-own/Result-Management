<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    use HasFactory;

    protected $fillable = [
        'remark',
    ];

    public function user1() 
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function user2() 
    {
        return $this->belongsTo(User::class);
    }

    public function term() 
    {
        return $this->belongsTo(Term::class);
    }
}
