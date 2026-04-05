<?php

namespace App\Models;

use App\Utilities\FilterBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{

    use SoftDeletes;
    protected $fillable = ['value', 'description', 'category_id', 'date', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilterBy($query, $filters)
    {
        $namespace = 'App\Utilities\TransactionFilters';
        $filter = new FilterBuilder($query, $filters, $namespace);

        return $filter->apply();
    }

}
