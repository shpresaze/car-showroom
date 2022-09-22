<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as DbModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Car extends DbModel
{
    use HasFactory;

    protected $fillable = [
        'number',
        'title',
        'description',
        'image',
    ];

    public function model(): BelongsTo
    {
        return $this->belongsTo(Model::class);
    }
    public function brand(): HasOneThrough
    {
        return $this->hasOneThrough(Brand::class,Model::class);
    }
}
