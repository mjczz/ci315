<?php

namespace App\models\traits;

trait ScopeTrait
{
    public function scopeColumnLike($query, $column, $value)
    {
        return $query->where($column, 'like', '%' . $value . '%');
    }

    public function scopeColumnEqual($query, $column, $value)
    {
        return $query->where($column, $value);
    }

    public function scopeColumnIn($query, $column, array $value)
    {
        return $query->whereIn($column, $value);
    }

}
