<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'website_url',
        'facebook_url',
        'instagram_url',
        'xcontest_url',
        'paragliding_since',
        'picture_url',
    ];

    protected $casts = [
        'paragliding_since' => 'int',
    ];

    public function stories()
    {
        return $this->hasMany(Story::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function name(): Attribute
    {
        return new Attribute(get: fn () => "{$this->firstname} {$this->lastname}");
    }
}
