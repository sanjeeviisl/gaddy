<?php
	include 'connect.php';

	$driver_id          =isset($_GET['driver_id']) ? $_GET['driver_id'] : '123qwer';
	$owner_id           =isset($_GET['owner_id']) ? $_GET['owner_id'] : '146euwy';
	$driver_name         =isset($_GET['driver_name']) ? $_GET['driver_name'] : 'naman';
        $driver_mail         =isset($_GET['executive_mail']) ? $_GET['executive_mail'] : 'abc@gmail.com';
	$mobile_no          =isset($_GET['mobile_no']) ? $_GET['mobile_no'] : 12345678;
	$driving_licence_no =isset($_GET['driving_licence_no']) ? $_GET['driving_licence_no'] :'';
	$vehicle_no         =isset($_GET['vehicle_no']) ? $_GET['vehicle_no'] :'UP-01 6787';
        $id_proof_no        =isset($_GET['id_proof_no']) ? $_GET['id_proof_no'] :'';
        $address_proof_no   =isset($_GET['address_proof_no']) ? $_GET['address_proof_no'] :'';
        $id_proof_type      =isset($_GET['id_proof_type']) ? $_GET['id_proof_type'] : '';
        $address_proof_type =isset($_GET['address_proof_type']) ? $_GET['address_proof_type'] : '';
	$driver_photo        =isset($_GET['executive_photo']) ? $_GET['executive_photo'] : '';
        $driver_token        =isset($_GET['executive_token']) ? $_GET['executive_token'] : '';
       
	

	if($mobile_no == 123456789) return;

	$query = "INSERT INTO driver_details(driver_id, owner_id,driver_name,driver_mail, mobile_no,driving_licence_no, vehicle_no,id_proof_no, address_proof_no,id_proof_type,address_proof_type,driver_photo ,driver_token)
	
VALUES ('$driver_id','$owner_id','$driver_name',' $driver_mail','$mobile_no','$driving_licence_no','$vehicle_no','$id_proof_no',
'$address_proof_no','$id_proof_type', '$address_proof_type','$driver_photo','$driver_token')";
   
 $query_run = mysqli_query($link,$query);
	
if( $query_run)
      echo 'OK';
    else
      echo mysql_error;

?>

