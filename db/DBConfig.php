<?php

define('EMAIL', 'kgdpropertyapp@gmail.com'); //Add sender Email Address in this line
define('PASSWORD', 'appKGD#$%'); // Add password of that email in this line

class dbconfig
{
	private $_host = "localhost";
	private $_username = "root";
	private $_password = "";
	private $_database = "wedding";

	protected $connection;

	public function __construct()
	{
		if(!isset($this->connection))
		{
			$this->connection = new mysqli($this->_host,$this->_username,$this->_password,$this->_database);
			if(!$this->connection)
			{
				echo "Connection Problem!";
				exit;
			}
		}
		
		return $this->connection;
	}
}

?>