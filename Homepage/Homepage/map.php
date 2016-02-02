<?php

$usa=$turkey=$switzerland=$scotland=$netherlands=$england=0;
$xmlDoc = new DOMDocument();
$xmlDoc->load("xml/inventions1950onwards.xml");

$x=$xmlDoc->getElementsByTagName('Country');
for ($i=0; $i<=$x->length-1; $i++)
{
//Process only element nodes
if ($x->item($i)->nodeType==1)
  {
  $place=$x->item($i)->childNodes->item(0)->nodeValue;
  if($place=='USA')
  $usa+=1;
  if($place=='England')
  $england+=1;
  if($place=='Netherlands')
  $netherlands+=1;
  if($place=='Turkey')
  $turkey+=1;
  if($place=='Switzerland')
  $switzerland+=1;
  if($place=='Scotland')
  $scotland+=1;
  
 
  }
         
  
}


?> 
<html>
  <head>
    <script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <script type='text/javascript'>
     google.load('visualization', '1', {'packages': ['geochart']});
     google.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country', 'Innovation Quotient'],
                  
          ['Usa', <?php echo $usa;?>],
          ['England', <?php echo $england;?>],
          ['Scotland', <?php echo $scotland;?>],
          ['Switzerland', <?php echo $switzerland;?>],
          ['Turkey', <?php echo $turkey;?>],
          ['Netherlands', <?php echo $netherlands;?>]
        ]);

        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    };
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 1300px; height: 650px;"></div>
		<center><a href="#" onclick="history.go(-1)" style="text-decoration: none; opacity:0.7; font-size:30px;top:50px;position:relative;" class="flat-button">Back</a></center>
  </body>
</html>

