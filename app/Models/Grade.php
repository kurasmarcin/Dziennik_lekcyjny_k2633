<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'teacher_id', 'grade', 'comment'];

    // Relacja z uczniem
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    // Relacja z nauczycielem
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
