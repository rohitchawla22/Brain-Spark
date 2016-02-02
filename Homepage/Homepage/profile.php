<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php // profile.php
include_once 'header.php';
$loggedin=0;
session_start();

if(isset($_SESSION['user']))
{
$loggedin=1;
$user=$_SESSION['user'];

}
if (!$loggedin) die();
echo "<div class='profilepic'><center>";






if (isset($_FILES['image']['name']))
{
$saveto = "$user.jpg";
move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
$typeok = TRUE;
switch($_FILES['image']['type'])
{
case "image/gif": $src = imagecreatefromgif($saveto); break;
case "image/jpeg": // Allow both regular and progressive jpegs
case "image/pjpeg": $src = imagecreatefromjpeg($saveto); break;
case "image/png": $src = imagecreatefrompng($saveto); break;
default: $typeok = FALSE; break;
}
if ($typeok)
{
list($w, $h) = getimagesize($saveto);
$max = 200;
$tw = $w;
$th = $h;
if ($w > $h && $max < $w)
{
$th = $max / $w * $h;
$tw = $max;
}
elseif ($h > $w && $max < $h)
{
$tw = $max / $h * $w;
$th = $max;
}
elseif ($max < $w)
{
$tw = $th = $max;
}
$tmp = imagecreatetruecolor($tw, $th);

imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);


imagejpeg($tmp, $saveto);
imagedestroy($tmp);
imagedestroy($src);
}
}
showProfile($user);
echo "</center></div>";
?>
<html>
    <head>
        <title>BrainSpark.</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        <meta name="description" content="" />
        <meta name="keywords" content=""/>
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>		<link rel="stylesheet" type="text/css" href="css/style2.css" />
		<script src="js/cufon-yui.js" type="text/javascript"></script>
		<script src="js/Aller.font.js" type="text/javascript"></script>
		<script type="text/javascript">
			Cufon.replace('ul.oe_menu div a',{hover: true});
			Cufon.replace('h1,h2,.oe_heading');
			
		
		</script>
		<script>
		function showRSS(str)
{
if (str.length==0)
  {
  document.getElementById("rssOutput").innerHTML="";
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
    document.getElementById("rssOutput").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","rss.php?q="+str,true);
xmlhttp.send();
}
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
		<h2 id="heading">My Profile</h2>

		
	
		
		
	
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
				<li><a href="contactus.php">Contact Us</a></li>

				   <li><a href="map.php">Map</a></li>
				      <li><a href="gallery.php">Gallery</a></li>
				<?php 
			if ($loggedin)
			echo"<li><a href='profile.php'>My Profile</a></li>"
			?>
			</ul>	
		</div>
	</div>
	
	
	<div class="twitter"><div id="flip2"><img class="social" src="images/twitter.png" style="height:40px;width:40px;top:12px;left:90px;position:fixed;"></div>
<div id="panel1" style="top:52px;left:90px;padding:3px;position:fixed;"><iframe allowtransparency="true" frameborder="0" scrolling="no"   src="//platform.twitter.com/widgets/follow_button.html?screen_name=brainsp4rk"     style="width:300px; height:20px;"></iframe></div></div>

				<div class="fb"><div id="flip2"><img class="social" src="images/facebook.png" style="height:40px;width:40px;top:12px;left:140px;position:fixed;"></div>
<div id="panel2" style="top:52px;left:140px;padding:3px;position:fixed;"> <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FBrain-Spark%2F517922691617691&amp;width=450&amp;height=21&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;send=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe></div></div>
	
<div class="profile">
<center><br>
<a href="messages.php"  style='text-decoration: none;color:white'>Messages</a><br>
<a href='othermembers.php'  style='text-decoration: none;color:white'>Other Members</a>
<form method='post' action='profile.php' enctype='multipart/form-data'><br><br>
Upload Profile Picture<input type='file' name='image' size='14' maxlength='32' />

<br><br><input type='submit' class="flat-button" value='Save Profile' />
</form>
</center>
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
        <!--Login box script-->
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
		<!--loginbox script ends-->
		
		
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
	<!--Logout-->
	        <script>
		if ('<?php echo isset($_SESSION['user']);?>'==1)
{

document.getElementById("log").innerHTML='<?php echo $username; ?><br /><a class="logout" href="logout.php">Logout</a>';

}

		
		
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

