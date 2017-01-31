<?php

	// Report all PHP errors (see changelog)
	error_reporting(E_ALL & ~E_STRICT & ~E_DEPRECATED);

	//declare servers
	$local = array('localhost', '127.0.0.1');
	$test = array('91.121.221.156');
	$online = array('85.214.45.228');
	
	//if online server
	if(in_array(gethostbyname($_SERVER['HTTP_HOST']), $online))
	{
		define("DB_SERVER", "localhost");
		define("DB_USER", "happygroup_user"); 
		define("DB_PASS", "92AB4C37L"); 
		define("DB_NAME", "happygroup_db"); 
	}
	
	// if test server
	else if(in_array(gethostbyname($_SERVER['HTTP_HOST']), $test))
	{
		define("DB_SERVER", "localhost");
		define("DB_USER", "jowandes_user"); 
		define("DB_PASS", "jd2012"); 
		define("DB_NAME", "jowandes_happygroup_db");
	}
	// if localhost
	else
	{
		define("DB_SERVER", "localhost:8888");
		define("DB_USER", "root"); 
		define("DB_PASS", "root"); 
		define("DB_NAME", "happygroup_db");
	}

	//domain linked software
	$domain_linkage = "http://happygroup.workcotec-group.de"; 

?>