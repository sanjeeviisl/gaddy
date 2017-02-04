<?php
//include 'dbconnect.php';
include 'connect.php';
    
    $provider_id   = isset($_POST['provider_id']) ? $_POST['provider_id'] : "146euwy";
//	$provider_id_int = (int) $provider_id;
	
	//echo $provider_id_int;
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
$query = " SELECT * FROM my_taxi_driver_details WHERE  provider_id = '$provider_id' ";

$result =mysqli_query($link,$query);
if($result)
{

 $arr = array();
 while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	 $foo = new stdClass();
	 $foo->name=$row['name'];
	 array_push($arr,$foo);
 }

 $response = new stdClass();
 $response->data = $arr;
 
 $json = json_encode($response);
 echo $json; 
 //echo "OK";
}
else
{

  echo mysql_error;
}

?>
