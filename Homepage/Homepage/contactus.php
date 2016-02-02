
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
require_once 'login.php';
require_once 'signup/validatephp.php';

session_start();

if(isset($_SESSION['user'])){
$username=$_SESSION['user'];
$error=$username;
$loggedin=1;
}
else {$loggedin=0;}

$db_server=mysql_connect($db_hostname,$db_username,$db_password);


if(!$db_server)
{mysql_error_message();}
if(!mysql_select_db($db_database))
{echo mysql_error();}
$fail="";

if(isset($_POST['username']))
{
$user = fix_string($_POST['username']);
$pass = fix_string($_POST['password']);
$fail .= validate_username($user);
$fail .= validate_password($pass);



if($fail=="")
{

$query = "SELECT * FROM user
WHERE Username='$user' AND Password='$pass' ";
$result=mysql_query($query);
$rows=mysql_num_rows($result);

if(!$rows)
{$fail= 'Wrong details!';

}

else
{
session_start();
$_SESSION['user']=$user;
$_SESSION['pass']=$pass;
die("You are now logged in .Please <a href= 'server1.php'>click here to continue");
}
}

}
?>
<html>
    <head>
        <title>BrainSpark.</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        <meta name="description" content="" />
        <meta name="keywords" content=""/>
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
		<script src="js/cufon-yui.js" type="text/javascript"></script>
		<script src="js/Aller.font.js" type="text/javascript"></script>
				<link rel="stylesheet" type="text/css" href="css/stylecontact.css" />
		<script type="text/javascript">
			Cufon.replace('ul.oe_menu div a',{hover: true});
			Cufon.replace('h1,h2,.oe_heading');
			
		
		</script>
		<!--Quotes scripts-->
	<link rel="stylesheet" type="text/css" href="quotes/css/component.css" />
	<script src="quotes/js/modernizr.custom.js"></script>
		<!--Quotes scripts end-->
        <!--Searchbox Scripts-->
		   <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
           <link href="../searchbar/css/base.css " rel="stylesheet">	
	<!--Searchbox Scripts end-->

    </head>

    <body>
			
	
			<div class="bg_img"><img src="images/1.png" alt="background" /></div>
<h1>Brain Spark<span>Thinking Simplified.</span></h1>
		<h2 id="heading">CONTACT US</h2>
	
		
		
	
	<div id="menu">
		<div class="oe_wrapper">
			<div id="oe_overlay" class="oe_overlay"></div>
			<ul id="oe_menu" class="oe_menu">
					<?php
				
				if($loggedin)
				echo"<li><a href='server1.php'>Home</a></li>";
				else 
				echo"<li><a href='homepage.php'>Home</a></li>";
				?>
				<li><a href="news.php">News</a></li>
				<li><a href="quiz/quiz.php">Quiz</a></li>
				<li><a href="blog.php">blog</a></li>
				<li><a href="contactus1.php">Contact Us</a></li>
				   <li><a href="map.php">Map</a></li>
   <li><a href="gallery.php">Gallery</a></li>
			<?php 
			if ($loggedin)
			echo"<li><a href='profile.php'>My Profile</a></li>"
			?>
			</ul>	
		</div>
	</div>
	
	<!--Markup for login box-->
	<div id= "login">
      <div class="ppcontainer">
	<div id="ppcontent">
    
		<div class="post">
    	
        	<div class="btn-sign" id="log">
				<a href="#login-box" class="login-window">Login</a>
			<?php if($fail!="")echo $fail;?>
		 
				
        	</div>
			
		</div>
        
        <div id="login-box" class="login-popup">
        <a href="#" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
          <form method="post" class="signin" action="homepage.php" >
                <fieldset class="textbox">
            	<label class="username">
                <span>Username</span>
                <input id="username" name="username" value="" type="text" autocomplete="on" placeholder="Username">
                </label>
                
                <label class="password">
                <span>Password</span>
                <input id="password" name="password" value="" type="password" placeholder="Password">
                </label>
                
                <input type="submit" class="submit button" value="Sign In" onclick="check()"  />
                
                <p>
                <a class="forgot" href="#">Forgot your password?</a>
				
                </p>
                <p> <a href='signup/signup.php' >Not a member? Sign Up!</a></p>
                </fieldset>
          </form>
		</div>
    
    </div>
</div>
	
	
	
	
	<div class="twitter"><div id="flip2"><img class="social" src="images/twitter.png" style="height:40px;width:40px;top:12px;left:90px;position:fixed;"></div>
<div id="panel1" style="top:52px;left:90px;padding:3px;position:fixed;"><iframe allowtransparency="true" frameborder="0" scrolling="no"   src="//platform.twitter.com/widgets/follow_button.html?screen_name=brainsp4rk"     style="width:300px; height:20px;"></iframe></div></div>

				<div class="fb"><div id="flip2"><img class="social" src="images/facebook.png" style="height:40px;width:40px;top:12px;left:140px;position:fixed;"></div>
<div id="panel2" style="top:52px;left:140px;padding:3px;position:fixed;"> <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FBrain-Spark%2F517922691617691&amp;width=450&amp;height=21&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;send=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe></div></div>
	

<div class="contactform">

<script type="text/javascript">

function validate(form)
{
fail = validateForename(form.name.value)
fail += validateMessage(form.message.value)
fail += validateEmail(form.email.value)
if (fail == "") return true
else {
 alert(fail); return false }
}
</script>
<b>
We're happy to answer any questions that you have.<br> Just send us a message in the form below.</b><br><br>

<noscript>
<div id="errormessage"><font color=red size=1><i>$fail</i></font></div></noscript>
<div class="contactform2">
<form method="post" action="contactus.php"
onSubmit="return validate(this)">Name<br><input type="text" maxlength="32" name="name" value="" /><br><br>Message<br><input type="textarea" cols="50" rows="3" maxlength="150"
name="message" value="" ><br><br>
Email<br><input type="text" maxlength="64" name="email" value="" /><br><br>
<input type="submit" class="flat-button" value="Send Message" /></form>
</div>

<!-- The JavaScript section -->
<script src="signup/validatejs.js"></script>

</div>


<div class="contactdetails">
<b>Email</b></br>
brainsp4rk@gmail.com</br></br>
<b>Phone</b></br>
9871600716</br></br>
<b>Twitter</b></br>
<a href="https://twitter.com/brainsp4rk"><img src="images/twitter.png" style="height:50px;width:50px";></a></br></br>
<b>Facebook</b></br>
<a href="https://www.facebook.com/pages/Brain-Spark/517922691617691"><img src="images/facebook.png" style="height:50px;width:50px";></a>

</div>


<!--Searchbox markup-->
<div id="sbody" class="sclass">

        
        <nav class="clearfix">
	
			
              <form action="#" method="get">
			
                <ul class="search-form">
				    <li><label id="sbox" for="search"><img src="../searchbar/img/search.png" /></label></li>
                    <li><input type="text" id="search" name="search" placeholder="Search" onkeyup="showResult(this.value)"></li>
                </ul>
            </form>
        
          </nav>
        <div id="livesearch"></div>
      
 </div> 
<!--Searchbox markup ends-->	
        <div>
            <span class="reference">
<a href="links.xml">Sitemap</a>
            </span>
		</div>
		<!--Importing the gear images -->
<div class="container">
			<div class="row">
				<div class="span12">
                        <div class="gears">				
<img style="transform: rotate(40750.5deg);" class="gear_3" src="images/gear-4.png">
<img style="transform: rotate(-40750.8deg);" class="gear_4" src="images/gear-4.png">
<img style="transform: rotate(40751.4deg);" class="gear_5" src="images/gear-4.png">
<img style="transform: rotate(-40749.9deg);" class="gear_6" src="images/gear-4.png">
<img style="transform: rotate(-40749.9deg);" class="gear_8" src="images/gear-4.png">
<img src="images/gearhead.png" class="gearhead" />

</div></div>
			</div>	
		</div>
	
	
	

        <!-- The JavaScript -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
        <script>
		if ('<?php echo isset($_SESSION['user']);?>'==1)
{

document.getElementById("log").innerHTML='<?php echo "$username : " ?><a class="logout" href="logout.php">Logout</a>';

}
		</script>
		<script type="text/javascript">
            $(function() {
				
       //Gear jquery code     
	
	var now 	= 0;
	var neg 	= 0;
	var degree 	= .3;
	
	setInterval(function () {
		now += degree;
		$('.gear_1').css({"-moz-transform" : "rotate("+now+"deg)", "-webkit-transform" : "rotate("+now+"deg)"}); }, 12 );
		
	setInterval(function () {
		neg -= degree;
		$('.gear_2').css({"-moz-transform" : "rotate(-"+now+"deg)", "-webkit-transform" : "rotate(-"+now+"deg)"}); }, 15 );
	
	setInterval(function () {
		now += degree;
		$('.gear_3').css({"-moz-transform" : "rotate(-"+now+"deg)", "-webkit-transform" : "rotate(-"+now+"deg)"}); }, 24 );
	
	setInterval(function () {
		neg -= degree;
		$('.gear_4').css({"-moz-transform" : "rotate("+now+"deg)", "-webkit-transform" : "rotate("+now+"deg)"}); }, 15 );
	
	setInterval(function () {
		now += degree;	
		$('.gear_5').css({"-moz-transform" : "rotate("+now+"deg)", "-webkit-transform" : "rotate("+now+"deg)"}); }, 8 );
	
	setInterval(function () {
		neg -= degree;
		$('.gear_6').css({"-moz-transform" : "rotate(-"+now+"deg)", "-webkit-transform" : "rotate(-"+now+"deg)"}); }, 17 );
	
	setInterval(function () {
		now += degree;	
		$('.gear_7').css({"-moz-transform" : "rotate("+now+"deg)", "-webkit-transform" : "rotate("+now+"deg)"}); }, 14 );
	
	setInterval(function () {
		neg -= degree;
		$('.gear_8').css({"-moz-transform" : "rotate(-"+now+"deg)", "-webkit-transform" : "rotate(-"+now+"deg)"}); }, 17 );
	
	setInterval(function () {
		now += degree;	
		$('.gear_9').css({"-moz-transform" : "rotate("+now+"deg)", "-webkit-transform" : "rotate("+now+"deg)"}); }, 1 );
	
	setInterval(function () {
		neg -= degree;
		$('.gear_10').css({"-moz-transform" : "rotate(-"+now+"deg)", "-webkit-transform" : "rotate(-"+now+"deg)"}); }, 2 );
	
	//Gear Jquery Ends
			
			
			
			});
        		$(document).ready(function(){
  $(".twitter").hover(function(){
    $("#panel1").fadeIn("fast");
    },
    function(){
    $("#panel1").fadeOut("fast");
  }); 
});
			$(document).ready(function(){
  $(".fb").hover(function(){
    $("#panel2").fadeIn("fast");
    },
    function(){
    $("#panel2").fadeOut("fast");
  }); 
});
	
			</script>
			<script src="quotes/js/jquery.cbpQTRotator.min.js"></script>

				<script type="text/javascript">
$(document).ready(function() { //Login button
	$('a.login-window').click(function() {
		
		// Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup and add close button
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body	').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() { 
	  $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
});

</script>
		
		<!--Live Search-->
		
<script>
function showResult(str)
{
if (str.length==0)
  {
  document.getElementById("livesearch").innerHTML="";
  document.getElementById("livesearch").style.border="0px";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
xmlhttp.open("GET","searchphp.php?q="+str,true);
xmlhttp.send();
}

</script>
			
    </body>
</html>
<?php 

require_once 'login.php';
require_once 'signup/validatephp.php';
$db_server=mysql_connect($db_hostname,$db_username,$db_password);

if(!$db_server)
{mysql_error_message();}
if(!mysql_select_db($db_database))
{echo mysql_error();}

$name = $message = $email = "";
if (isset($_POST['name']))
$name = fix_string($_POST['name']);
if (isset($_POST['message']))
$message = fix_string($_POST['message']);
if (isset($_POST['email']))
$email = fix_string($_POST['email']);
$fail = validate_forename($name);
$fail .= validate_message($message);
$fail .= validate_email($email);
echo "<html><head><title>BrainSpark.</title>";
if ($fail == "") {
$query="insert into feedback values(NULL,'$name','$message','$email')";
$result=mysql_query($query);
if(!$result){echo mysql_error();}
else{ echo"<script>alert('Your message has been received.')	</script>";}
}
function fix_string($string) {
if (get_magic_quotes_gpc()) $string = stripslashes($string);
return htmlentities ($string);
}

?>