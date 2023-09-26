<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UangHarian extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['author'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function biaya_perdins()
    {
        return $this->hasMany(BiayaPerdin::class, 'harian');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'keterangan'
            ]
        ];
    }
}
