<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class SchoolStructure extends Model
{
    use HasUuids;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = ['name', 'nip', 'role', 'position', 'photo'];

    #[Scope]
    protected function searchBy(Builder $query, string $column, string $keyword): Builder
    {
        return $query->when($keyword, fn (Builder $q) => $q->whereLike($column, "%$keyword%"));
    }
}
