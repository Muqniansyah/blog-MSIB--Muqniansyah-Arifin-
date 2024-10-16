<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';

    protected $fillable = [
        'name',
        'email',
    ];

    // hubungan antar model author dan post
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
