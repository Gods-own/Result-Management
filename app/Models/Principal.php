<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Principal extends Model
{
    use HasFactory;
    

    public function users() 
    {
        return $this->belongTo(User::class, 'admin_id');
    }
}
