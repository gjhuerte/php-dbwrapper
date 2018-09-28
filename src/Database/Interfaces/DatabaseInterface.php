<?php

namespace App\Database;

interface DatabaseInterface
{
    
    /**
     * Initialize database connection
     *
     * @param string $host
     * @param string $db
     * @param string $charset
     * @return instance
     */
	static function init($host, $db_name, $charset);
    
    /**
     * Sets the value for the table
     *
     * @param string $name
     * @return void
     */
	static function table($name);
    
    /**
     * Select query
     *
     * @param array ...$args
     * @return instance
     */
	function select(...$args);
    
    /**
     * Returns the number of rows the query has
     *
     * @return instance
     */
    public function selectCount();

    /**
     * Returns all the columns
     *
     * @return instance
     */
    public function selectAll();

    /**
     * Where clause for sql query
     *
     * @return void
     */
    function where($column, $operator, $value);

    /**
     * order by clause for sql query
     *
     * @return void
     */
    function orderBy($column, $type);
    
    /**
     * Execute the statement
     *
     * @return instance
     */
    function get();
    
    /**
     * Limits the number of rows the query returns
     *
     * @param integer $columnNumber
     * @param integer $offset
     * @return void
     */
    public function limit(int $columnNumber, int $offset);
}