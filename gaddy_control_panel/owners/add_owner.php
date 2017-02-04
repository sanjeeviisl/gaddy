<?php
	include 'connect.php';
	
	
	$owner_id            =isset($_GET['owner_id']) ? $_GET['owner_id'] : 'NA';
	$owner_name         =isset($_GET['owner_name']) ? $_GET['owner_name'] : 'NA';
	$mobile_no          =isset($_GET['mobile_no']) ? $_GET['mobile_no'] : NA;
	$owner_email         =isset($_GET['owner_email']) ? $_GET['owner_email'] :'NA';
	
	$vehicle_list         =isset($_GET['vehicle_list']) ? $_GET['vehicle_list'] :'NA';
	$driver_lists         =isset($_GET['driver_lists']) ? $_GET['driver_lists'] :'NA';
		
	$company_name         =isset($_GET['company_name']) ? $_GET['company_name'] :'NA';
	$payment_type        =isset($_GET['payment_type']) ? $_GET['payment_type'] :'NA';
	$payment_status        =isset($_GET['payment_status']) ? $_GET['payment_status'] :'NA';
	$subscription_type       =isset($_GET['subscription_type']) ? $_GET['subscription_type'] :'NA';
	$subscription_status       =isset($_GET['subscription_status']) ? $_GET['subscription_status'] :'NA';
	


	
	if($mobile_no == 12347890) return;

	$query = "INSERT INTO owner_details( owner_id,owner_name, mobile_no,owner_email,vehicle_list,driver_lists,company_name,
payment_type, payment_status,subscription_type,subscription_status)
	VALUES (  '$owner_id','$owner_name','$mobile_no','$owner_email','$vehicle_list','$driver_lists',
              '$company_name','$payment_type','$payment_status', '$subscription_type','$subscription_status')";
   
 $query_run = mysqli_query($link,$query);
	if( $query_run)
      echo 'OK';
    else
      echo mysql_error;

?>

