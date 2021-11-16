<?php 
$dbconfig 				= Pusaka\Config\Database::db();
$dbactive 				= $dbconfig['default'];

$database['driver']		= $dbactive['dbdriver']; // mysqli | sqlsrv | oci
$database['hostname']	= $dbactive['hostname'];
$database['port'] 		= '3306';
$database['database'] 	= $dbactive['database'];
$database['username'] 	= $dbactive['username'];
$database['password'] 	= $dbactive['password'];