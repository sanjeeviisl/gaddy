<?php
   
include 'connect.php';
 
        $driver_id          =isset($_GET['driver_id']) ? $_GET['driver_id'] : '123qwer';
	$driver_name         =isset($_GET['driver_name']) ? $_GET['driver_name'] : 'naman';
	$mobile_no          =isset($_GET['mobile_no']) ? $_GET['mobile_no'] : 12345678;
	$driving_licence_no =isset($_GET['driving_licence_no']) ? $_GET['driving_licence_no'] :'';
	$vehicle_no         =isset($_GET['vehicle_no']) ? $_GET['vehicle_no'] :'UP-01 6787';
        $id_proof_no        =isset($_GET['id_proof_no']) ? $_GET['id_proof_no'] :'';
        $address_proof_no   =isset($_GET['address_proof_no']) ? $_GET['address_proof_no'] :'';
         
       $new_driver_id = $driver_name.$mobile_no;

           
   
     $query = "UPDATE driver_details SET driver_id = '$new_driver_id',  driver_name= '$driver_name',mobile_no='$mobile_no',
         driving_licence_no= '$driving_licence_no', vehicle_no= '$vehicle_no',id_proof_no= '$id_proof_no',address_proof_no= '$address_proof_no' WHERE  driver_id = '$driver_id' ";

 $query_run = mysqli_query($link,$query);


    if( $query_run)
      echo 'OK';
    else
      echo mysql_error;

?>

