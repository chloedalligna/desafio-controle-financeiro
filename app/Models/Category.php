<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use SoftDeletes;
    protected $fillable = ['name', 'type_id', 'user_id'];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

}
