<?php
namespace App\Traits;

trait OrderByIndex
{
    public function newQuery($ordered = true)
    {
        $query = parent::newQuery();

        if (empty($ordered)) {
            return $query;
        }

        return $query->orderBy('index', 'asc');
    }
}