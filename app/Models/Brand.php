<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as DbModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use PhpParser\Node\Expr\AssignOp\Mod;

class Brand extends DbModel
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function models(): HasMany
    {
        return $this->hasMany(Model::class);
    }

    public function cars(): HasManyThrough
    {
        return $this->hasManyThrough(Car::class,Model::class);
    }
}
