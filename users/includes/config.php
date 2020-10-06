<?php 
// DB credentials.
define('DB_HOST','159.65.228.65');
define('DB_USER','phpmyadmin');
define('DB_PASS','@uacari*321');
define('DB_NAME','seplaudos');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>
