<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seksi extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['author', 'bidang'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'author');
    }

    public function bidang(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'bidang_id', 'bidang');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'seksi');
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
