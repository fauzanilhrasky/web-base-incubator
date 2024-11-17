<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'assignment_id',
        'status',
        'passing_grade',
        'comment',
        'file'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function assignment() {
        return $this->belongsTo(Assignment::class);
    }



}
