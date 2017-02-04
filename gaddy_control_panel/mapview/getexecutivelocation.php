<?php
include 'connect.php';
    
$phoneNumber   = isset($_GET['phoneNumber']) ? $_GET['phoneNumber'] : '1111111111';

$query = " SELECT * FROM gpslocations  WHERE phoneNumber = '$phoneNumber' ORDER BY GPSLocationID  DESC LIMIT 1";

$result =mysqli_query($link,$query);
if($result)
{ 

$num_driver = 0;
while($row = mysqli_fetch_assoc($result)){
     $json[] = $row;
	 $num_driver++;
}

if($num_driver)
 echo json_encode($json);
else
	echo "No_Driver";

}
else
{

  echo mysql_error;
}

?>
