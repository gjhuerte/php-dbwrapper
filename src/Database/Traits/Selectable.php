<?php

namespace App\Database\Traits;

trait Selectable
{
    
    /**
     * Select query
     *
     * @param array ...$args
     * @return instance
     */
	  public function select(...$args)
    {
        $this->selectQuery = 'SELECT ' . implode(',', $args) . ' FROM ' . self::$table;
        return $this;
    }
    
    /**
     * Returns the number of rows the query has
     *
     * @return instance
     */
    public function selectCount()
    {
        $this->selectQuery = 'SELECT COUNT(*)' . ' FROM ' . self::$table;
        return $this;
    }
    
    /**
     * Returns all the columns
     *
     * @return instance
     */
    public function selectAll()
    {
        $this->selectQuery = 'SELECT *' . ' FROM ' . self::$table;
        return $this;
    }
}