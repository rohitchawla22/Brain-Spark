<?php
$dbhost = 'localhost'; // Unlikely to require changing
$dbname = 'minor'; // Modify these...
$dbuser = 'root'; // ...variables according
$dbpass = ''; // ...to your installation
$appname = "Brain Spark"; // ...and preference
mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());
$query="UPDATE crawel_img SET STATUS= '0' where 1" ;
$result=mysql_query($query);
$query="UPDATE crawel_video SET STATUS= '0' where 1" ;
$result=mysql_query($query);
class Crawler {

    protected $markup = "";

    public function __construct($url) {
        $this->markup = $this->getMarkup($url);
    }

    public function getMarkup($url) {
        return file_get_contents($url);
    }

    public function get($type) {
        $method = "_get_{$type}";
        if (method_exists($this, $method)) {
            return call_user_func(array($this, $method));
        }
    }

    public function _get_images() {
        if (!empty($this->markup)) {
            preg_match_all('/<img [^>]*src="?([^ ">]+)"?/i', $this->markup, $images);
            return !empty($images[1]) ? $images[1] : FALSE;
        }
    }

    public function _get_links() {
        if (!empty($this->markup)) {
            preg_match_all('/<a [^>]*href="?([^ ">]+)"?/i', $this->markup, $links);
            return !empty($links[1]) ? $links[1] : FALSE;
        }
    }
}

//For first Website
$url = "http://www.geniusstuff.com/blog/list/10-leonardo-da-vinci-inventions/";

$crawl = new Crawler($url);
$links = $crawl->_get_images();

if (!empty($links)) {
    foreach ($links as $link) {
      
       
                   $n = preg_match("/\.jpg/i",$link, $match);
				   if($n)
				   {
				   if ($link[0] == "/")
				   $imgurl = "http://www.geniusstuff.com/".$link;
				   else
				   
				   $imgurl=$link;
				   }
				   else{continue;}
				   
				   
				   
				   //$imgurl = "http://www.geniusstuff.com/".$link;}
      
	  //check sql query
        
		$sql = "SELECT * FROM crawel_img WHERE img_path ='" . $imgurl . "'";
        $res = mysql_query($sql);
        if (mysql_num_rows($res) > 0) {
            $row = mysql_fetch_array($res);

            $sqlUpdate = "UPDATE crawel_img SET img_path = '" . $imgurl . "' WHERE ID='" . $row['ID'] . "'";
            //echo $sqlUpdate;exit();
            mysql_query($sqlUpdate);
			$sqlUpdate = "UPDATE crawel_img SET STATUS ='1' WHERE ID='" . $row['ID'] . "'";
            //echo $sqlUpdate;exit();
            mysql_query($sqlUpdate);
        } else {
            $sqlInsert = "INSERT INTO crawel_img (img_path,website,STATUS) VALUES('" . $imgurl ."','" . $url . "','1')";
            mysql_query($sqlInsert);
        }
    }
}

 $url2 = "http://www.youtube.com/watch?v=M1BLRW_Grrg";
$crawl2 = new Crawler($url2);
$links2 = $crawl2->_get_links();


if (!empty($links2)) {
    foreach ($links2 as $link) {
        
	
                   $n = preg_match("/watch\?/i",$link, $match);
                   			  
				  if($n)
				   {
			if ($link[0] == "'")
            $link = substr($link, 1, -1);
        if ($link[0] == "/")
            $link = $url2 . $link;
			}
			else{continue;}
			


        //check sql query
        $sql = "SELECT * FROM crawel_video WHERE video_path ='" . $link . "'";
        $res = mysql_query($sql);
        if (mysql_num_rows($res) > 0) {
            $row = mysql_fetch_array($res);

            $sqlUpdate = "UPDATE crawel_video SET video_path = '" . $link . "' WHERE ID='" . $row['ID'] . "'";
            //echo $sqlUpdate;exit();
            mysql_query($sqlUpdate);
			 $sqlUpdate = "UPDATE crawel_video SET status = '1' WHERE ID='" . $row['ID'] . "'";
            
            mysql_query($sqlUpdate);
        } else {
            $sqlInsert = "INSERT INTO crawel_video (video_path,website,status) VALUES('" . $link . "','" . $url2 . "','1')";
            mysql_query($sqlInsert);
        }
    }
}?>
 <html>
    <!-- Mirrored from www.buddyretail.com/ by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 28 Mar 2013 11:28:08 GMT -->
    <head>
        <meta charset="UTF-8">
        <title>GALLERY</title>
	
       
    </head>     
    <body class="home">
       <h3><a href="homepage.php">Back</a></h3>
	  <h1 style="margin-left:700px;">BrainSpark Gallery</h1>
        <article id="page-content">
           
            <div class="tabs-container">
			
		   <h2>Images</h2>     
                    <div class="testo">
                        <?php
                        $sql_query = "SELECT * FROM crawel_img WHERE STATUS ='1'";
                        $result = mysql_query($sql_query);
                        while ($row = mysql_fetch_array($result)) {
                            echo '<div style="width: 200px;height: 200px;float: left;padding: 3px;">
                                <a class="fancybox" href="' . $row['img_path'] . '"  cellspacing="3" >
                                    <img src="' . $row['img_path'] . '" height="180" width="180" cellpadding="3" />
                                </a>
                            </div>';
                       
						}
                        ?>
                    </div>
                
            </div>
        </article> 
		

 <article id="page-content">
            
            <div class="tabs-container">
              
               
                    <div class="testo" style="float:left; ">                        
                        <h2>Videos</h2>
						<iframe width="600" height="400" src="http://www.youtube.com/embed/M1BLRW_Grrg" frameborder="0" allowfullscreen>                      
                        </iframe>
						<?php
                        $sql_query = "SELECT * FROM crawel_video WHERE STATUS ='1'"; //embed
                        $result1 = mysql_query($sql_query);
                        while ($row = mysql_fetch_array($result1)) {
                            $arr = array();
							
                            $arr = explode("watch?v=", $row['video_path']);
                          $a=sizeof($arr);
						  if($a<3){continue;}
							$video = $arr[0] . "embed/" . $arr[2];
                            
                            echo '<iframe width="600" height="400" src="' . $video . '" frameborder="1" allowfullscreen>                      
                        </iframe>';
                        }
                        
                        ?>
                        
                    </div>
               

            </div>
        </article>   
      
    </body>
</html>






