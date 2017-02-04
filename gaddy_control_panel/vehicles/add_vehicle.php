<?php
	include 'connect.php';
	
	$vehicle_id          =isset($_GET['vehicle_id']) ? $_GET['vehicle_id'] : '123qwer';
	$provider_id        =isset($_GET['provider_id']) ? $_GET['provider_id'] : '146euwy';
	$vehicle_name               =isset($_GET['vehicle_name']) ? $_GET['vehicle_name'] : 'naman';
	$vehicle_number          =isset($_GET['vehicle_number']) ? $_GET['vehicle_number'] : '12345678';
	$vehicle_model         =isset($_GET['vehicle_model']) ? $_GET['vehicle_model'] :'UP-01 6787';
	$vehicle_type        =isset($_GET['vehicle_type']) ? $_GET['vehicle_type'] : 'M.K Tiwari';
	$vehicle_sub_type            =isset($_GET['vehicle_subtype']) ? $_GET['vehicle_sub_type'] : 'Himmat nagar';

	if($vehicle_number == '123456789') return;

	$query = "INSERT INTO my_taxi_vehicle_details ( vehicle_id, provider_id,vehicle_name, vehicle_number, vehicle_model,vehicle_type, vehicle_sub_type)
VALUES ( '$vehicle_id', '$provider_id','$vehicle_name', '$vehicle_number','$vehicle_model','$vehicle_type','$vehicle_sub_type')";
    $query_run = mysqli_query($link,$query);
	if( $query_run)
      echo 'OK';
    else
      echo mysql_error;

?>

