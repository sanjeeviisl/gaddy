<?php
include 'connect.php';
    
$sessionid   = isset($_GET['sessionid']) ? $_GET['sessionid'] : '0';
$query = " SELECT * FROM gpslocations ORDER BY GPSLocationID";

$result =mysqli_query($link,$query);
if($result)
{ 
// $rows = mysqli_num_rows($result);
 
// $row = mysqli_fetch_row($result);
 
 //$json = '{ "lattitude": ';
 //$json .= $row[2];
 //$json .= ', "lattitude": ';	
 //$json .= $row[3];
 //$json .= ' }';
 //header('Content-Type: application/json');
//echo $json;

while($row = mysqli_fetch_assoc($result)){
     $json[] = $row;
}

echo json_encode($json);

// $json = array();
// $json = $row ;
//echo json_encode($json); 
//echo $rows;
	 


}
else
{

  echo mysql_error;
}

?>
