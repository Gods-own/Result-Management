<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'phoneNumber',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function principal()
    {
        return $this->hasOne(Principal::class, 'admin_id');
    }

    public function class_room()
    {
        return $this->hasOne(Classroom::class);
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'teacher_id');
    }

    public function subjects() {
        return $this->belongstoMany(Subject::class, 'subject_teacher', 'subject_id', 'teacher_id');
    }


    public function students()
    {
        return $this->hasOne(Student::class, 'student_id');
    }

    public function tests1()
    {
        return $this->hasMany(Test1::class, 'student_id');
    }

    public function tests2()
    {
        return $this->hasMany(Test2::class, 'student_id');
    }

    public function exams()
    {
        return $this->hasMany(Exam::class, 'student_id');
    }

    public function results()
    {
        return $this->hasMany(Result::class, 'student_id');
    }

    public function remarks1()
    {
        return $this->hasMany(Remark::class, 'student_id');
    }

    public function remarks2()
    {
        return $this->hasMany(Remark::class);
    }

    public function character_dev_gradings()
    {
        return $this->hasMany(CharacterDevGrading::class, 'student_id');
    }

    public function principal_remarks1()
    {
        return $this->hasMany(PrincipalRemark::class, 'student_id');
    }

    public function principal_remarks2()
    {
        return $this->hasMany(PrincipalRemark::class);
    }


}

