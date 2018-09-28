<?php

namespace App\Database\Traits;

trait Orderable
{

    /**
     * order by clause for sql query
     *
     * @return void
     */
    public function orderBy($column, $type)
    {
        $this->orderByArguments[] = 'order by ' . $column . ' ' . $type;
        return $this;
    }
}