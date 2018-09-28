<?php

namespace App\Database\Traits;

trait Filterable
{
    
    /**
     * Where clause for sql query
     *
     * @return void
     */
    public function where($column, $operator, $value)
    {
        $this->whereArguments[] = 'where ' . $column . ' ' . $operator . ' ' . $value;
        return $this;
    }
}