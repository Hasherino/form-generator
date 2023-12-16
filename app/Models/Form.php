<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Form extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'title'
    ];

    public function fields(): HasMany
    {
        return $this->hasMany(Field::class);
    }

    public function answerers(): HasMany
    {
        return $this->hasMany(Answerer::class);
    }
}
