<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function stories()
    {
        return $this->belongsToMany(Story::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}
