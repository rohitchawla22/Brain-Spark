
<?php
session_start();
if(isset($_SESSION['user'])){
$username=$_SESSION['user'];

$loggedin=1;
}
else{
$username= "Guest";
$loggedin=0;}

require_once 'login.php';
echo "<p style='color:#ffffff;font-size:20px;margin-top:165px;margin-left:15px;'>Welcome $username,</p>";
$db_server=mysql_connect($db_hostname,$db_username,$db_password);

if(!$db_server)
{mysql_error_message();}
if(!mysql_select_db($db_database))
{echo mysql_error();}
$query="select tname from topic where 1 ";
$result=mysql_query($query);

if (!$result) die ("Database access failed: " . mysql_error());
$rows=mysql_num_rows($result);

for($i=0;$i<$rows;$i++)
{
$q= mysql_result($result,$i,'tname');
 $arr[]=$q;}
 $c_query= "select * from comment ";
 $c_result=mysql_query($c_query);
if (!$c_result) die ("Database access failed: " . mysql_error());
$c_rows=mysql_num_rows($c_result); 
 $post1[]=$post2[]=$post3[]=$post4[]=$post5[]="";
 $user1[]=$user2[]=$user3[]=$user4[]=$user5[]="";
 
 
 for($i=0;$i<$c_rows;$i++)
{
$tid= mysql_result($c_result,$i,'tid');
$q= mysql_result($c_result,$i,'comment');
$user=mysql_result($c_result,$i,'username');
if($tid==1)
 {$post1[]=$q;
  $user1[]=$user." : ";}
 if($tid==2)
 {$post2[]=$q;
  $user2[]=$user." : ";}  
 if($tid==3)
 {$post3[]=$q;
  $user3[]=$user." : ";}
 if($tid==4)
 {$post4[]=$q;
  $user4[]=$user." : ";}
 if($tid==5)
 {$post5[]=$q;
  $user5[]=$user." : ";}
 
 
 
 }

 ?>

<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

<script> 
//Jquery sliding funcitons
$(document).ready(function(){
  $("#q1").click(function(){
    $("#p1").slideToggle("slow");
  });
  
  $("#q2").click(function(){
    $("#p2").slideToggle("slow");
  });
  
  $("#q3").click(function(){
    $("#p3").slideToggle("slow");
  });

  $("#q4").click(function(){
    $("#p4").slideToggle("slow");
  });
  
  
  $("#q5").click(function(){
    $("#p5").slideToggle("slow");
  });
  
  });
</script>
<link rel='stylesheet' type='text/css' href='css/stylemenu.css' />
<title>BrainSpark.</title>
<style type="text/css"> 


#big{ top:0px;
width:750px; 
position:fixed;
left:350px;
}

.question,.post
{
padding:5px;

background-color:#5F6E6B;
border:solid 1px #34403D;
position:relative;
opacity:.6;
}
.post
{
padding:50px;
display:none;
}
#f1:{ 
width:100px;
height:100px;
z-index:999;}

#poster{width:180px;
height:80px;}
body {background-image:url('images/backg.jpg') ;
repeat:norepeat;}
h1{ padding-left:155px;
font-size:60px;
color:#86A198;}
</style>
</head>
<body >
<div id='cssmenu' style="top:200px;left:15px;position:fixed;">
<ul>
   <li><a href=<?php 
   
   
   if($loggedin==0)
   echo "'homepage.php'";
   else
   echo "'server1.php'";
   ?>><span>Home</span></a></li>
   <li><a href='news.php'><span>News</span></a></li>
   <li><a href='quiz/quiz.php'><span>Quiz</span></a></li>
   <li><a href='blog.php'><span>Blog</span></a></li>
   <li class='last'><a href='contactus.php'><span>Contact Us</span></a></li>
   <li><a href="map.php"><span>Map<span></a></li>
   <li><a href="gallery.php"><span>Gallery<span></a></li>   
   <?php 
			if ($loggedin)
			echo"<li><a href='profile.php'><span>My Profile</span></a></li>"
			?>
</ul>
</div>
 <div id="big">

<h1>BrainSpark Blog</h1>
<div id="q1" class="question"><p><?php echo $arr[0];?></p></div>
<div id="p1" class="post">
<div>
<?php

for ($i=0;$i<sizeof($post1);$i++)
echo $user1[$i].$post1[$i]." <br />";


?>

</div> 

<div id="poster1"></div>



<div id="f1" class="forms"  >

<label> Reply : <input type="text" name="userpost" id="a1" /></label> 
<button  onclick="putpost('one')" >Submit </button>
</form>
</div>
</div>
<div id="q2" class="question"><p><?php echo $arr[1];?></p></div>
<div id="p2" class="post">

<div>
<?php

for ($i=0;$i<sizeof($post2);$i++)
echo $user2[$i].$post2[$i]." <br />";


?>

</div> 

<div id="poster2"></div>



<div id="f2" class="forms"  >

<label> Reply : <input type="text" name="userpost" id="a2" /></label> 
<button  onclick="putpost('two')" >Submit </button>
</form>
</div>
</div>

<div id="q3" class="question"><p><?php echo $arr[2];?></p></div>
<div id="p3" class="post">

<div>
<?php

for ($i=0;$i<sizeof($post3);$i++)
echo $user3[$i].$post3[$i]." <br />";


?>

</div> 
<div id="poster3"></div>



<div id="f3" class="forms"  >

<label> Reply : <input type="text" name="userpost" id="a3" /></label> 
<button  onclick="putpost('three')" >Submit </button>
</form>
</div>
</div>

<div id="q4" class="question"><p><?php echo $arr[3];?></p></div>
<div id="p4" class="post">

<div>
<?php

for ($i=0;$i<sizeof($post4);$i++)
echo $user4[$i].$post4[$i]." <br />";


?>

</div> 
<div id="poster4"></div>



<div id="f4" class="forms"  >

<label> Reply : <input type="text" name="userpost" id="a4" /></label> 
<button  onclick="putpost('four')" >Submit </button>
</form>
</div>
</div>


<div id="q5" class="question"><p><?php echo $arr[4];?></p></div>
<div id="p5" class="post">

<div>
<?php

for ($i=0;$i<sizeof($post5);$i++)
echo $user5	[$i].$post5[$i]." <br />";


?>

</div> 
<div id="poster5"></div>



<div id="f5" class="forms"  >

<label> Reply : <input type="text" name="userpost" id="a5"</label> 
<button  onclick="putpost('five')" >Submit </button>
</form>
</div>
</div>



</div>

</body>
</html>

<script>





function putpost(text)
{
    var server;
	var bid;
	var message="<?php echo $username; ?>"+ ": ";
	
	if(text=='one')
	{
	
	message+=document.getElementById('a1').value;
	
	did="poster1";
	bid=1;
	server=document.getElementById('a1').value;
	server+=","+bid;
	}
  
	if(text=='two')
	{
	message+=document.getElementById('a2').value;
	server=document.getElementById('a2').value;
	did="poster2";
	bid=2;
	server=document.getElementById('a2').value;
	server+=","+bid;
	}
	if(text=='three')
	{
	message+=document.getElementById('a3').value;
	did="poster3";
	bid=1;
	server=document.getElementById('a3').value;
	server+=","+bid;
	}

	if(text=='four')
	{
	message+=document.getElementById('a4').value;
	did="poster4";
	bid=4;
	server=document.getElementById('a4').value;
	server+=","+bid;
	}
	if(text=='five')
	{
	message+=document.getElementById('a5').value;
	did="poster5";
	bid=5;
	server=document.getElementById('a5').value;
	server+=","+bid;
	}
alert(message);
  var para=document.createElement("p");
var node=document.createTextNode(message);
para.appendChild(node);

var element=document.getElementById(did);
element.appendChild(para);
   //Ajax request
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
        
xmlhttp.open("GET","try2.php?a1="+server,true);
xmlhttp.send();
 
}
</script>