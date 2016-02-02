<html>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.gvChart-1.1.min.js"></script>
	
<script type="text/javascript">
    gvChartInit();
</script>

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
					
					
					for ($x=0; $x<15; $x++)
					{
					$valuesrev[14-$x]=$values[$x];
					
					}
					
					
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
        width: 420,
        height: 200,
        }
});
</script>
	<html>