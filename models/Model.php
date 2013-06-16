<?php

abstract class Model extends Database {
	
	public static function factory($name)
	{
		return new $name;
	}
	
}

?>
