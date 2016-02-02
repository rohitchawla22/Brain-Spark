<?php
//get the q parameter from URL
$q=$_GET["q"];

//find out which feed was selected
if($q=="toi")
  {
  $xml=("http://timesofindia.feedsportal.com/c/33039/f/533922/index.rss");
  }
elseif($q=="howstuffworks")
  {
  $xml=("http://feeds.feedburner.com/DailyStuff?format=xml");
  }
elseif($q=="nytimes")
  {
  $xml=("http://rss.nytimes.com/services/xml/rss/nyt/Science.xml");
  }

  
$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);


//get and output "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');
for ($i=0; $i<=4; $i++)
  {
  $item_title=$x->item($i)->getElementsByTagName('title')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_desc=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->nodeValue;

  echo ("<p><b><strong>" . $item_title . "</b></strong>");
  echo ("<br>");
  echo ($item_desc . "</p>");
  }
?> 