<?php
	include 'connect.php';
	$driver_id          =isset($_GET['driver_id']) ? $_GET['driver_id'] : '123qwer';
	$provider_id        =isset($_GET['provider_id']) ? $_GET['provider_id'] : '146euwy';
	$driver_name         =isset($_GET['driver_name']) ? $_GET['driver_name'] : 'naman';
	$mobile_no          =isset($_GET['mobile_no']) ? $_GET['mobile_no'] : 12345678;
	$vehicle_no         =isset($_GET['vehicle_no']) ? $_GET['vehicle_no'] :'UP-01 6787';
	$father_name        =isset($_GET['father_name']) ? $_GET['father_name'] : 'M.K Tiwari';
	$address            =isset($_GET['address']) ? $_GET['address'] : 'Himmat nagar';

	if($mobile_no == 123456789) return;

	$query = "INSERT INTO my_taxi_driver_details ( driver_id, provider_id,driver_name, mobile_no, vehicle_no,father_name, address)
VALUES ( '$driver_id', '$provider_id','$driver_name', '$mobile_no','$vehicle_no','$father_name','$address')";
    $query_run = mysqli_query($link,$query);
	if( $query_run)
      echo 'OK';
    else
      echo mysql_error;

?>

