<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Material;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'detail',
        'image',
        'category',
        'mentor_id',
        'price',
        'isPaid'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
