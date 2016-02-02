<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
include_once 'header.php';
$query= "select * from user";
$result=queryMysql($query);
$num=mysql_num_rows($result);
echo "<div class='wall'>";
for($i=0;$i<$num;$i++)
{
$row=mysql_fetch_row($result);
$q=$row[3];

if(isset($_SESSION[$q]))
echo $q."Is online"."<br />";
else
echo "<a href='messages.php?view=$q'> $q</a>"."<br />";
}
echo "</div>";

?>




<?php // profile.php
include_once 'header.php';
$loggedin=0;
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
$r=imageconvolution($tmp, array(array( -1, -1, -1),array(-1, 16, -1), array(-1, -1, -1)), 8, 0);

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
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
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
		<style type="text/css">
		



		span.reference{
				position:fixed;
				left:0px;
				bottom:0px;
				background:#000;
				width:100%;
				font-size:10px;
				line-height:20px;
				text-align:right;
				height:20px;
				-moz-box-shadow:-1px 0px 10px #000;
				-webkit-box-shadow:-1px 0px 10px #000;
				box-shadow:-1px 0px 10px #000;
			}
			span.reference a{
				color:#aaa;
				text-transform:uppercase;
				text-decoration:none;
				margin-right:10px;
				
			}
			span.reference a:hover{
				color:#ddd;
			}
			.bg_img img{
				width:100%;
				position:fixed;
				top:0px;
				left:0px;
				z-index:-1;
			}
			.gearhead{
				height:530px;
				width:376px;
				position:fixed;
				bottom:0px;
				right:30px;
				z-index:-1;
			}
			h1{
				font-size:100px;
				text-align:right;
				position:fixed;
				right:20px;
				top:0px;
				color:#ffffff;
				font-weight:normal;
				/*text-shadow:  0 0 3px #0096ff, 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #0096ff, 0 0 70px #0096ff, 0 0 80px #0096ff, 0 0 100px #0096ff, 0 0 150px #0096ff;
			*/}
			h1 span{
				display:block;
				font-size:15px;
				font-weight:bold;
			}

			h2{
				position:absolute;				
				font-size:40px;
				font-weight:normal;	
		
				color:#ffffff;
				/*text-shadow:  0 0 3px #f6ff00, 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #f6ff00, 0 0 70px #f6ff00, 0 0 80px #f6ff00, 0 0 100px #f6ff00, 0 0 150px #f6ff00;
				*/}
				
			#login
{
				top:0px;
				left:190px;

				
}	

			#signup
{
				top:0px;
				left:322px;

				
}	

			#heading
			{
			top:180px;
			left:23px;
			border-bottom: 1px solid #f4f4f4;
			}
		<!--Gear Css Starts-->
	
	.gears { position: relative; height: 600px; z-index: -2;  }
	.gears img { position: absolute; }
	
	.gear_3 	{ bottom: 413px; 	right:163px; height:55px; width:55px; }
	.gear_4 	{ bottom: 399px; 	right:100px; height:75px; width:75px; }
	.gear_5 	{ bottom: 373px; 	right:210px; height:110px; width:110px; }
	.gear_6 	{ bottom: 339px; 	right:103px; height:120px; width:120px;  }
	.gear_8 	{ bottom: 324px; 	right:136px;  height:100px; width:100px; }

	<!--Gear Css ends-->
	
<!--Login Signup-->





<!--Login Signup Ends-->
<!--Search Box css starts-->
ul.container{list-style:none;}

.search-form {
    position:fixed;
    left:24px;
	top: 12px;
}

.sclass input[type="text"] {
    width:40px;
    height:40px;
    padding:0;
    padding-left:40px; /* account for 4px border to get perfect circle */
    border:solid 5px rgb(255,255,255);
	opacity:1;
    
    font-weight:300;
    font-size:18px;
    color:#000000;
    

    -webkit-transition:width 0.5s ease-in-out;
       -moz-transition:width 0.5s ease-in-out;
            transition:width 0.5s ease-in-out;
}
.sclass input[type="text"]:focus,
.sclass input[type="text"]:active {
    width:440px;
    }

#sbox {
   
    width:40px;
    height:40px;
    font-size:0;
    position:absolute;
    padding:1px;
    bottom:4px;
    left:0;
    cursor:pointer;
}

#sbody {
	line-height: 1;
	
}

#wrapper {
    min-width:1024px;
    margin:0 auto;
}




.clearfix:after {
	visibility: hidden;
	display: block;
	content: "";
	clear: both;
	height: 0;
}


input.sclass,
label.sclass,
textarea.sclass {
    font-family: 'Open Sans', sans-serif;
    font-weight:300;
    font-size:16px;
}
#livesearch
{
width:200px;
background-color:black;
opacity:0.5;
position:fixed;
top:55px;
left:24px;
}
#livesearch a:link {color:#FFFFFF; text-decoration:none;}


div.contactform
{
font-size:20px;
color:#000000;
height:395px;
width:600px;
bottom:30px;
left:23px;
position:fixed;
padding-right:30px;
border-right: 1px solid #000000;
}
div.contactdetails
{
font-size:20px;
color:#000000;
padding-left:30px;
height:395px;
width:300px;
bottom:30px;
left:623px;
position:fixed;
}

div.profilepic
{
font-size:20px;
color:#000000;
height:455px;
width:230px;
bottom:30px;
left:23px;
position:fixed;
padding-right:30px;
border-right: 1px solid #000000;
}

div.profile
{
font-size:15px;
color:#000000;
height:455px;
width:230px;
top:520px;
left:23px;
position:fixed;
padding-right:30px;
}

div.wall
{
font-size:14px;
color:#000000;
padding-left:30px;
height:455px;
width:700px;
bottom:30px;
left:253px;
position:fixed;
overflow: scroll;
overflow-x:hidden;
}



#panel1
{
display:none;
} 

#panel2
{
display:none;
} 

<!--Login Box CSS starts-->
	
.ppcontainer {width: 960px; margin: 0 auto; overflow: hidden;}

#content {	float: left; width: 100%;}

.post { margin: 0 auto; padding-bottom: 50px; float: left; width: 960px; }

.btn-sign {
	width:70px;
	top:12px;
	left:185px;
	position:fixed;
	margin-bottom:10px;
	margin:0 auto;
	padding:10px;
	
	background: -moz-linear-gradient(center top, #5e6c71, #5e6c71);
    background: -webkit-gradient(linear, left top, left bottom, from(#5e6c71), to(#5e6c71));
	background:  -o-linear-gradient(top, #5e6c71, #5e6c71);
   
	text-align:center;
	
	font-size:13px;
	color:#fff;

}

.btn-sign a { color:#ffffff; text-shadow:0 1px 2px #161616; }

#mask {
	display: none;
	background: #000; 
	position: fixed; left: 0; top: 0; 
	z-index: 10;
	width: 100%; height: 100%;
	opacity: 0.8;
	z-index: 999;
}

.login-popup{
	display:none;
	background: #fff;
	padding: 10px; 	
	border: 2px solid #ddd;
	float: left;
	font-size: 1.2em;
	position: fixed;
	top: 50%; left: 50%;
	z-index: 99999;
	box-shadow: 0px 0px 20px #999;
	-moz-box-shadow: 0px 0px 20px #999; /* Firefox */
    -webkit-box-shadow: 0px 0px 20px #999; /* Safari, Chrome */
	border-radius:3px 3px 3px 3px;
    -moz-border-radius: 3px; /* Firefox */
    -webkit-border-radius: 3px; /* Safari, Chrome */
}

img.btn_close {
	float: right; 
	margin: -28px -28px 0 0;
}

fieldset { 
	border:none; 
}

form.signin .textbox label { 
	display:block; 
	padding-bottom:7px; 
}

form.signin .textbox span { 
	display:block;
}

form.signin p, form.signin span { 
	color:#999; 
	font-size:11px; 
	line-height:18px;
} 

form.signin .textbox input { 
	background:#666666; 
	border-bottom:1px solid #333;
	border-left:1px solid #000;
	border-right:1px solid #333;
	border-top:1px solid #000;
	color:#fff; 
	border-radius: 3px 3px 3px 3px;
	-moz-border-radius: 3px;
    -webkit-border-radius: 3px;
	font:13px Arial, Helvetica, sans-serif;
	padding:6px 6px 4px;
	width:200px;
}

form.signin input:-moz-placeholder { color:#bbb; text-shadow:0 0 2px #000; }
form.signin input::-webkit-input-placeholder { color:#bbb; text-shadow:0 0 2px #000;  }

.button { 
	background: -moz-linear-gradient(center top, #f3f3f3, #dddddd);
	background: -webkit-gradient(linear, left top, left bottom, from(#f3f3f3), to(#dddddd));
	background:  -o-linear-gradient(top, #f3f3f3, #dddddd);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#f3f3f3', EndColorStr='#dddddd');
	border-color:#000; 
	border-width:1px;
	border-radius:4px 4px 4px 4px;
	-moz-border-radius: 4px;
    -webkit-border-radius: 4px;
	color:#333;
	cursor:pointer;
	display:inline-block;
	padding:6px 6px 4px;
	margin-top:10px;
	font:12px; 
	width:214px;
}

#ppbutton:hover { background:#ddd; }

div#intro
{
font-size:18px;
color:#000000;
height:395px;
width:800px;
top:270px;
left:23px;
position:fixed;
padding-right:30px;

}




<!--Login Box Css ends-->	




		</style>
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
				<li><a href="contactus1.php">Contact Us</a></li>
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
<a href='messages.php' style='text-decoration: none;color:white'>Messages and Friends</a><br>
<a href='othermembers.php' style='text-decoration: none;color:white'>Other Members</a>
<form method='post' action='profile.php' enctype='multipart/form-data'><br><br>
Upload Profile Picture<input type='file' name='image' size='14' maxlength='32' />

<br><br><input type='submit' class='flat-button' value='Save Profile' />
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

