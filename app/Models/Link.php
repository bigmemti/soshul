<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Link extends Model
{
    use HasFactory;

    protected $fillable= [
        'title',
        'image',
        'color',
        'link',
        'sort'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $value ? 'storage/image/'. $value : '/'
        );
    }

    protected function imageWithDirectory(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $attributes['image'] ? 'image/'. $attributes['image'] : '/'
        );
    }

    protected function pureImage(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $attributes['image'] ? $attributes['image'] : '/'
        );
    }
}
