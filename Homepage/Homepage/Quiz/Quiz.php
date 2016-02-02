<html>
<head>
<style type="text/css">

body {background-image:url('backg1.jpg');}
</style>
</head>
<body >
<body >

<?php
session_start();
if(isset($_SESSION['user'])){
$username=$_SESSION['user'];
$error=$username;
$loggedin=1;
}
else {die ("You are not logged in! Please login from the homepage. <a href='../homepage.php'>Click here to be redirected.</a>");}
require_once '../login.php';
$db_server=mysql_connect($db_hostname,$db_username,$db_password);

if(!$db_server)
{mysql_error_message();}
if(!mysql_select_db($db_database))
{echo mysql_error();}
$query="select question from quiz where 1 ";
$result=mysql_query($query);
$queryans="select answer from quiz where 1";
$resultans=mysql_query($queryans);
if (!$result) die ("Database access failed: " . mysql_error());
$rows=mysql_num_rows($result);
$offset=rand(0,9);
for($i=0;$i<$rows;$i++)
{
/*
$index=rand(0,9);
$j=$index+$i;
for($k=0;$k<$i;$k++)
{if ($flag[$k]==$j) $j=rand(0,9);}

if($j>9)
{
$j=9-$index;
}
*/
$j=$i-$offset;
if($j<0){$j=$offset-$i+2;}
if($j>=10){$j=$offset;}
$q= mysql_result($result,$j,'question');
 $arr[]=$q;
 
$a= mysql_result($resultans,$j,'answer');
 $ansarr[]=$a;
//$flag[]=$j;
 }	


echo<<<_END
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>BrainkSpark.</title>
		<meta name="description" content="Blueprint: Vertical Timeline" />
		<meta name="keywords" content="timeline, vertical, layout, style, component, web development, template, responsive" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<script src="js/modernizr.custom.js"></script>
		<script src="js/menu_jquery.js"></script>
	</head>
	<body>
	
											<div id="cssmenu" >
<ul>
   <li><a href="../server1.php"><span>Home</span></a></li>
   <li><a href='../news.html'><span>News</span></a></li>
   <li><a href='quiz.php'><span>Quiz</span></a></li>
   <li><a href='../blog.php'><span>Blog</span></a></li>
   <li><a href='../contactus.php'><span>Contact Us</span></a></li>
   <li><a href="../map.php"><span>Map<span></a></li>
   <li><a href="../gallery.php"><span>Gallery<span></a></li>
   <li class='last'><a href='../profile.php'><span>My Profile</span></a></li>


</ul>

</div>

	
	
	
	
		<div class="container">

			
			<div class="main">
			
				<ul class="cbp_tmtimeline">

					<li>
						<time class="cbp_tmtime" datetime="2013-04-10 18:30"><span>Question</span><span>1</span></time>
						<div class="cbp_tmicon cbp_tmicon-phone"></div>
						<div class="cbp_tmlabel">
							<h2>$arr[0]</h2>
							
						<input type="radio"  name="answer1" value="yes" onclick="a1(this.value)" /> Yes 
						<input type="radio"  name="answer1" value="no" onclick="a1(this.value)"/> No 
						
						</div>
					</li>
					<li>
						
						<time class="cbp_tmtime" datetime="2013-04-11T12:04"><span></span> <span>2</span></time>
						<div class="cbp_tmicon cbp_tmicon-screen"></div>
						<div class="cbp_tmlabel">
							<h2>$arr[1]</h2>
							<input type="radio"  name="answer2" value="yes" onclick="a2(this.value)" /> Yes 
						<input type="radio"  name="answer2" value="no" onclick="a2(this.value)" /> No 
						</div>
					</li>
					<li>
						<time class="cbp_tmtime" datetime="2013-04-13 05:36"><span></span> <span>3</span></time>
						<div class="cbp_tmicon cbp_tmicon-mail"></div>
						<div class="cbp_tmlabel">
							<h2>$arr[2]</h2>
							<input type="radio"  name="answer3" value="yes" onclick="a3(this.value)" /> Yes 
						<input type="radio"  name="answer3" value="no" onclick="a3(this.value)" /> No 
						</div>
					</li>
					<li>
						<time class="cbp_tmtime" datetime="2013-04-15 13:15"><span></span> <span>4</span></time>
						<div class="cbp_tmicon cbp_tmicon-phone"></div>
						<div class="cbp_tmlabel">
							<h2>$arr[3]</h2>
							<input type="radio"  name="answer4" value="yes"onclick="a4(this.value)" /> Yes 
						<input type="radio"  name="answer4" value="no" onclick="a4(this.value)" /> No 
						</div>
					</li>
					<li>
						<time class="cbp_tmtime" datetime="2013-04-16 21:30"><span></span> <span>5</span></time>
						<div class="cbp_tmicon cbp_tmicon-earth"></div>
						<div class="cbp_tmlabel">
							<h2>$arr[4]</h2>
							<input type="radio"  name="answer5" value="yes" onclick="a5(this.value)" /> Yes 
						<input type="radio"  name="answer5" value="no"  onclick="a5(this.value)"/> No 
						</div>
					</li>
					<li>
						<time class="cbp_tmtime" datetime="2013-04-17 12:11"><span></span> <span>6</span></time>
						<div class="cbp_tmicon cbp_tmicon-screen"></div>
						<div class="cbp_tmlabel">
							<h2>$arr[5]</h2>
							<input type="radio"  name="answer6" value="yes" onclick="a6(this.value)" /> Yes 
						<input type="radio"  name="answer6" value="no" onclick="a6(this.value)" /> No 
						</div>
					</li>
					<li>
						<time class="cbp_tmtime" datetime="2013-04-18 09:56"><span></span> <span>7</span></time>
						<div class="cbp_tmicon cbp_tmicon-phone"></div>
						<div class="cbp_tmlabel">
							<h2>$arr[6]</h2>
							<input type="radio"  name="answer7" value="yes" onclick="a7(this.value)" /> Yes 
						<input type="radio"  name="answer7" value="no" onclick="a7(this.value)"/> No 	
						</div>
					</li>
				</ul>
				<center><button style="font-size:24px;width:250px;height:40px;" onclick="finish()" >Submit</button>
				<button style="font-size:24px;width:250px;height:40px;" onclick="history.go(0)">Retake Quiz</button></center>
				<center><div id="result"style="font-size:60px;width:450px;height:90px;"></div></center>

			</div>
		
		</div>
	
	</body>
	
</html>
<script>


</script>

_END;

mysql_close();
?>
<script>

var score=0;

var ans= new Array();
function a1(answer)
{
if(!answer)
{ans[0]="";}
else
{
ans[0]=answer;
}
}
function a2(answer)
{
if(!answer)
ans[1]="";
else
ans[1]=answer;
}
function a3(answer)
{

ans[2]=answer;
}
function a4(answer)
{
ans[3]=answer;
}
function a5(answer)
{
ans[4]=answer;
}
function a6(answer)
{
ans[5]=answer;
}
function a7(answer)
{
ans[6]=answer;


}

function finish()
{
 var one=ans[0];
var two=ans[1];
var three=ans[2];
var four=ans[3];
var five=ans[4];
var six=ans[5];
var seven=ans[6]; 
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
    document.getElementById("result").innerHTML=xmlhttp.responseText;
    }
  }
 
xmlhttp.open("GET","parser.php?a1="+one+"&a2="+two+"&a3="+three+"&a4="+four+"&a5="+five+"&a6="+six+"&a7="+seven,true);
xmlhttp.send();
} 

</script>
</body>
</html>