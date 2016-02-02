<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php 

require_once '../login.php';
require_once 'validatephp.php';
$db_server=mysql_connect($db_hostname,$db_username,$db_password);

if(!$db_server)
{mysql_error_message();}
if(!mysql_select_db($db_database))
{echo mysql_error();}

$forename = $surname = $username = $password = $age = $email = "";
if (isset($_POST['forename']))
$forename = fix_string($_POST['forename']);
if (isset($_POST['surname']))
$surname = fix_string($_POST['surname']);
if (isset($_POST['username']))
$username = fix_string($_POST['username']);
if (isset($_POST['password']))
$password = fix_string($_POST['password']);
if (isset($_POST['age']))
$age = fix_string($_POST['age']);
if (isset($_POST['email']))
$email = fix_string($_POST['email']);
$fail = validate_forename($forename);
$fail .= validate_surname($surname);
$fail .= validate_username($username);
$fail .= validate_password($password);
$fail .= validate_age($age);
$fail .= validate_email($email);
echo "<html><head><title>BrainSpark.</title>";
if ($fail == "") {
$query="insert into user values(NULL,'$forename','$surname','$username','$password','$age','$email')";
$result=mysql_query($query);
if(!$result){echo mysql_error();}
else{ echo"<script>alert('You have successfully signed up!')	</script>";}
}
// Now output the HTML and JavaScript code
echo <<<_END
<!-- The HTML section -->
<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen"/>
<style>.signup { border: 1px solid #999999;
font: normal 14px helvetica; color:#000000;
margin-top:230px;
margin-left:auto;
margin-right:auto;
opacity:0.8; 


}


body {background-image:url('../images/backg.jpg');repeat:norepeat;}
</style>
<script type="text/javascript">

function validate(form)
{
fail = validateForename(form.forename.value)
fail += validateSurname(form.surname.value)
fail += validateUsername(form.username.value)
fail += validatePassword(form.password.value)
fail += validateAge(form.age.value)
fail += validateEmail(form.email.value)
if (fail == "") return true
else {
 alert(fail); return false }
}
</script></head><body>
<table class="signup" border="0" cellpadding="2"
cellspacing="5" bgcolor="#eeeeee">
<th colspan="2" align="center">Signup Form</th>
<noscript>
<div id="errormessage"><tr><td colspan="2"><p><font color=red size=1><i>$fail</i></font></p>
</td></tr></div></noscript>
<form method="post" action="signup.php"
onSubmit="return validate(this)">
<tr><td>Forename</td><td><input type="text" maxlength="32"
name="forename" value="$forename" /></td>
</tr><tr><td>Surname</td><td><input type="text" maxlength="32"
name="surname" value="$surname" /></td>
</tr><tr><td>Username</td><td><input type="text" maxlength="16"
name="username" value="$username" /></td>
</tr><tr><td>Password</td><td><input type="text" maxlength="12"
name="password" value="$password" /></td>
</tr><tr><td>Age</td><td><input type="text" maxlength="3"
name="age" value="$age" /></td>
</tr><tr><td>Email</td><td><input type="text" maxlength="64"

name="email" value="$email" /></td>
</tr><tr><td colspan="2" align="center">
<input type="submit" value="Signup" /></td>
</tr></form></table>
<center><a href="../homepage.php" style="text-decoration: none; opacity:0.7; font-size:25px;top:30px" class="flat-button">Back</a></center>

<!-- The JavaScript section -->
<script src="validatejs.js"></script>


_END;
// Finally, here are the PHP functions

function fix_string($string) {
if (get_magic_quotes_gpc()) $string = stripslashes($string);
return htmlentities ($string);
}
?>