<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['author'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function tanda_tangans()
    {
        return $this->hasMany(TandaTangan::class, 'jabatan');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
}
