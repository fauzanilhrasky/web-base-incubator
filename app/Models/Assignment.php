<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'due_date', 'material_id','file'
    ];

    public function userSubmissions()
    {
        return $this->hasMany(UserSubmission::class);
    }

    public function material() {
        return $this->belongsTo(Material::class);
    }

    public function course()
{
    return $this->belongsTo(Course::class);
}

    
}
