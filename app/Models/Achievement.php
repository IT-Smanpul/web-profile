<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Achievement extends Model
{
    use HasUuids;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = ['name', 'category', 'description', 'image'];

    #[Scope]
    protected function searchBy(Builder $query, string $column, string $keyword): Builder
    {
        return $query->when($keyword, fn (Builder $q) => $q->whereLike($column, "%$keyword%"));
    }
}
