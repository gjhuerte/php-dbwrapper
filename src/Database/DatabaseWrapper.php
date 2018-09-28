<?php

namespace App\Database;

use App\Database\Traits\Orderable;
use App\Database\Traits\Selectable;
use App\Database\Traits\Filterable;
use App\Database\Traits\Executable;
use App\Database\Interfaces\DatabaseInterface;

class DatabaseWrapper implements DatabaseInterface
{

    use Selectable, Filterable, Orderable, Executable;

	protected static $db;
    protected static $table;
    
	private static $instance;
    private static $query;

    private static $selectArguments;
    private static $whereArguments = [];
    private static $orderByArguments = [];
    
    /**
     * Initialize database connection
     *
     * @param string $host
     * @param string $db
     * @param string $charset
     * @return instance
     */
	public static function init($host, $db_name, $charset)
	{
		$dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $charset . ';';
		$options = [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES => false,
        ];
        
		try {
			self::$db = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
        }
        
		catch(\PDOException $e) {
			throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        
		if(is_null(self::$instance)) {
			self::$instance = new self();
        }
        
		return self::$instance;
    }
    
    /**
     * Sets the value for the table
     *
     * @param string $name
     * @return void
     */
	public static function table($name)
	{
		self::init();
        self::$table = $name;
        
		if(is_null(self::$instance)) {
			self::$instance = new self();
        }
        
		return self::$instance;
    }

    /**
     * Limits the number of rows the query returns
     *
     * @param integer $columnNumber
     * @param integer $offset
     * @return void
     */
    public function limit(int $columnNumber, int $offset)
    {
        $this->limitArgument = 'LIMIT ' . $coumnNumber . ( $offset ?? '');
    }
}