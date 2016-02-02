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
die("You are now logged in. Please <a href= 'server1.php'>click here to continue</a>...");
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
		<link rel="stylesheet" type="text/css" href="css/style2.css" />
		<script src="js/cufon-yui.js" type="text/javascript"></script>
		<script src="js/Aller.font.js" type="text/javascript"></script>
		<script type="text/javascript">

			Cufon.replace('ul.oe_menu div a',{hover: true});
			Cufon.replace('h1,h2,.oe_heading');
			
		
		</script>
		
				<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.gvChart-1.1.min.js"></script>
<script type="text/javascript">
    gvChartInit();
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
		<h2 id="heading">NEWS</h2>

		
	
		
		
	
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
	
<!--Searchbox markup-->






<div class="rssleft">

<form>
<div class="styled-select">
<select onchange="showRSS(this.value)">
<option value="">Select an RSS-Feed</option>
<option value="toi">Times Of India</option>
<option value="howstuffworks">How Stuff Works</option>
<option value="nytimes">New York Times</option>
</select>
</div>
</form>
</div>


<div class="rssright">
<div id="rssOutput">The RSS-Feed will be listed here.</div>
</div>

<div class="temp">
<?php
   require_once 'login.php';
   
   if(!$fp = fopen("http://in.weather.com/weather/today-New-Delhi-INXX0096:1:IN" ,"r" )) {
	        return false;

} //our fopen is right, so let's go
	    $content = "";
	 
	    while(!feof($fp)) { //while it is not the last line, we will add the current line to our $content
	        $content .= fgets($fp, 1024);
	    }
	    fclose($fp); //we are done here, don't need the main source anymore
	 preg_match_all("/\d\d&deg/", $content, $prices, PREG_SET_ORDER);
	
	$temp=$prices[0][0];
	preg_match_all("/\d\d/",$temp,$t,PREG_SET_ORDER);
	$temp = $t[0][0];
	
	$db_server=mysql_connect($db_hostname,$db_username,$db_password);
	if(!$db_server){echo "Error in connecting to the database".mysql_error();}
	if(!mysql_select_db($db_database)){echo "Error in finding database".mysql_error();}
	$query="insert into temperature values(NULL,'Delhi','$temp')";
	$result=mysql_query($query);
	if(!$result)
	{
	echo "Error in query ".mysql_error();
	}
$a= "select * from temperature";
$r=mysql_query($a);
if(!$r)
	{echo mysql_query();}
	$rows=mysql_num_rows($r);

echo "Delhi Temperature : ".mysql_result($r,$rows-1,"value")."&deg"."C";





	
	
	?>
	
	<div class="chart">
<?php
	    $dbhost  = 'localhost';
	    $dbuser  = 'root';
	    $dbpass  = '';
	    $dbname  = 'website';
	    $dbtable = 'temperature';
	 
	    $conn = mysql_connect($dbhost, $dbuser, $dbpass)
	        or die ('Error connecting to mysql');
	 
	        $selected = mysql_select_db($dbname)
	            or die( mysql_error() );
	 
	            //get data
	            $results = mysql_query("SELECT * FROM $dbtable ORDER BY `id` DESC LIMIT 15");
	 
	            mysql_close($conn);
	 
	            $ids  = array();
	            $values = array();
				$valuesrev = array();
	            while($row = mysql_fetch_array($results, MYSQL_ASSOC)) {
	                $values[] = "{$row['value']}";
	            }
					
					
					$valuesrev=array_reverse($values);
					
	            echo "<table id='real'>";
	                echo "<caption></caption>";
	                echo "<thead>";
	                    echo "<tr>";
	                        echo "<th></th>";
	                        for ($x=1; $x<=15; $x++) {
	                                echo "<th>" . $x . "</th>";
	                        }
	                    echo "</tr>";
	                echo "</thead>";
	                echo "<tbody>";
	                    echo "<tr>";
	                        echo "<th></th>";
	                        foreach($valuesrev as $value) {
	                            echo "<td>" . $value . "</td>";
	                        }
	                    echo "</tr>";
                echo "</tbody>";
	?>
	<script>
	jQuery('#real').gvChart({
    chartType: 'LineChart',
    gvSettings: {
        vAxis: {title: 'Temperature'},
        hAxis: {title: ''},
        width: 570,
        height: 300,
        }
});
</script>
</div>

	
	
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

document.getElementById("log").innerHTML='<?php echo "$username : " ?><a class="logout" href="logout.php">Logout</a>';

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