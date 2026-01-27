<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facility extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = ['name', 'description', 'photo'];

    #[Scope]
    protected function searchBy(Builder $query, string $column, string $keyword): Builder
    {
        return $query->when($keyword, fn (Builder $q) => $q->whereLike($column, "%$keyword%"));
    }
}
