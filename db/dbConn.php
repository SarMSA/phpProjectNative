<?php
session_start();
// $server = 'localhost';
// $dbUser = 'root';
// $dbPassword  = '';
// $dbName = 'shopping';

// $server = 'us-cdbr-east-04.cleardb.com';
// $dbUser = 'bb2a1ae18e4b04';
// $dbPassword  = 'fdeac4f6';
// $dbName = 'heroku_9fec70058342bef';

// $conn = mysqli_connect($server, $dbUser, $dbPassword, $dbName);
// 
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["us-cdbr-east-04.cleardb.com"];
$cleardb_username = $cleardb_url["bb2a1ae18e4b04"];
$cleardb_password = $cleardb_url["fdeac4f6"];
$cleardb_db = substr($cleardb_url["heroku_9fec70058342bef"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
if(!($conn)) 
{
    die("error: ".mysqli_connect_error());
}
?>
