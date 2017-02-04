<?php
//include 'dbconnect.php';
include 'connect.php';
    
    $provider_id   = isset($_GET['provider_id']) ? $_GET['provider_id'] : '0';
//    $locid       = isset($_GET['locationID']) ? $_GET['sessionid'] : 281;

    // switch ($dbType) {
    //     case DB_MYSQL:
    //         $stmt = $pdo->prepare('CALL prcGetRouteForMap(:sessionID)');     
    //         break;
    //     case DB_POSTGRESQL:
    //     case DB_SQLITE3:
    //         $stmt = $pdo->prepare("select * from v_GetRouteForMap where sessionID = :sessionID");
    //         break;
    // }

//$query = "SELECT * FROM gpslocations ORDER BY GPSLocationID DESC LIMIT 1";
/*
$query = 'SELECT * FROM gpslocations ';
$stmt = $pdo->prepare($query);
$stmt->execute();
    
$json = '{ "locations": [';

     foreach ($stmt as $row) {
         $json .= $row['json'];
         $json .= ',';
     }

     $json = rtrim($json, ",");
     $json .= '] }';

     header('Content-Type: application/json');
	 
echo $json;
*/

//$query = " SELECT * FROM gpslocations WHERE  GPSLocationID = $locid ";
$query = " SELECT * FROM my_taxi_driver_details WHERE  provider_id = $provider_id ";

$result =mysqli_query($link,$query);
if($result)
{ 
 $rows = mysqli_num_rows($query_run);
 
 $row = mysqli_fetch_row($result);
 
 //$json = '{ "lattitude": ';
 //$json .= $row[2];
 //$json .= ', "lattitude": ';	
 //$json .= $row[3];
 //$json .= ' }';
 //header('Content-Type: application/json');
//echo $json;

 $json = array(); 
 $json = $row ;
echo json_encode($json); 
	 
}
else
{

  echo mysql_error;
}

?>
