<?php

namespace App\Database\Traits;

trait Executable
{
    
    /**
     * Execute the statement
     *
     * @return instance
     */
	public function get()
	{
        $query = $this->selectQuery . ' ' . implode(' ', $this->whereArguments) . ' '. implode(' ', $this->orderByArguments);
		return self::$db->query($query);
    }
}