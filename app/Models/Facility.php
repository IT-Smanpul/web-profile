<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Facility extends Model
{
    use HasUuids;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = ['name', 'description', 'image', 'directory_slug'];

    protected static function booted(): void
    {
        static::creating(function (Facility $facility) {
            if (empty($facility->directory_slug)) {
                $facility->directory_slug = (string) Str::uuid();
            }
        });
    }

    #[Scope]
    protected function searchBy(Builder $query, string $column, string $keyword): Builder
    {
        return $query->when($keyword, fn (Builder $q) => $q->whereLike($column, "%$keyword%"));
    }
}
