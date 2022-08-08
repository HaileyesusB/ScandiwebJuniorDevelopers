<?php

class Dbh
{
	// ESTABLISHING CONNECTION

	private $host = "localhost";
	private $user = "root";
	private $pwd = "";
	private $dbName = "products";

	protected function connect()
	{
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
		$pdo = new PDO($dsn, $this->user, $this->pwd);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		// PDO: PHP Data Objects is used PHP 5 >= 5.1.0, PHP 7, PHP 8, PECL pdo >= 0.1.0)
		/*ATTR_DEFAULT_FETCH_MODE:Predefined Constants Set default fetch mode. 
		  Return Value: Returns TRUE on success or FALSE on failure.

		  PDO::FETCH_ASSOC 	Fetch method returns each row as an array indexed by column name in the result set.
		  If there are multiple columns with same name in the result set 
		  PDO::FETCH_ASSOC returns only a single value per column name.integer */

		/*In PHP, the double colon :: is defined as Scope Resolution Operator.
   		   It used when when we want to access constants, properties and methods defined at class level.
		   When referring to these items outside class definition, 
		   name of class is used along with scope resolution operator
		  */
		return $pdo;
	}
}
