<?php // functions.php
$dbhost = 'localhost'; // Unlikely to require changing
$dbname = 'website'; // Modify these...
$dbuser = 'root'; // ...variables according
$dbpass = ''; // ...to your installation
$appname = "Brain Spark"; // ...and preference
mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());
function createTable($name, $query)
{
queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");

}
function queryMysql($query)
{
$result = mysql_query($query) or die(mysql_error());
return $result;
}
function destroySession()
{
$_SESSION=array();
if (session_id() != "" || isset($_COOKIE[session_name()]))
setcookie(session_name(), '', time()-2592000, '/');
session_destroy();
}
function sanitizeString($var)
{
$var = strip_tags($var);
$var = htmlentities($var);
$var = stripslashes($var);
return mysql_real_escape_string($var);
}
function showProfile($user)
{
if (file_exists("$user.jpg"))
echo "<img src='$user.jpg' align='center' />";
$result = queryMysql("SELECT * FROM user WHERE username='$user'");
if (mysql_num_rows($result))
{
$row = mysql_fetch_row($result);
echo "<br><h3>";
echo stripslashes($row[1])." ".stripslashes($row[2]) . "<br clear=left /><br/></h3>";
}
}
?>