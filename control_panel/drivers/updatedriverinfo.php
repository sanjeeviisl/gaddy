<?php
    //include 'dbconnect.php';
include 'connect.php';
 
  $driver_id          =isset($_GET['driver_id']) ? $_GET['driver_id'] : '123qwer';
  $provider_id        =isset($_GET['provider_id']) ? $_GET['provider_id'] : '146euwy';
  $name               =isset($_GET['name']) ? $_GET['name'] : 'naman';
  $mobile_no          =isset($_GET['mobile_no']) ? $_GET['mobile_no'] : 098786768;
	$vehicle_no         =isset($_GET['vehicle_no']) ? $_GET['vehicle_no'] :'UP-01 6787';
	$father_name        =isset($_GET['father_name']) ? $_GET['father_name'] : 'M.K Tiwari';
	$address            =isset($_GET['address']) ? $_GET['address'] : 'Himmat nagar';
	$driving_licence    =isset($_GET['driving_licence']) ? $_GET['driving_licence'] : 'approved';
	$address_proof      =isset($_GET['address_proof']) ? $_GET['address_proof'] : 'document';
	$id_proof           =isset($_GET['id_proof']) ? $_GET['id_proof'] : 'document';
	$photo              =isset($_GET['photo']) ? $_GET['photo'] : 'url1';
  $location_latitude  =isset($_GET['location_latitude']) ? $_GET['location_latitude'] :6584847.75356;
	$location_longitude =isset($_GET['location_longitude']) ? $_GET['location_latitude'] :6584847.75356;

    // $params = array(
    //                 ':driver_name'         => $driver_name,
    //                 ':driver_email'        => $driver_email,
    //                 ':driver_phone'        => $driver_phone,
    //                 ':driver_address'      => $driver_address,
    //                 ':State'                 => $State,
    //                 ':Pincode'               => $Pincode,
    //                 ':Reffer_code'            => $Reffer_code,
    //                 ':Debit'                 => $Debit,
    //                 ':Reffer_by'             => $Reffer_by,
    //                 ':driver_action'       => $driver_action
                   
    //             );
   //      if($pincode == 0)
			// return;
				
   //  switch ($dbType) {
   //      case DB_MYSQL:
   //        $stmt = $pdo->prepare( $sqlFunctionCallMethod.'prcSavedriverInfo(
   //                        :driver_name, 
   //                        :driver_email, 
   //                        :driver_phone, 
   //                        :driver_address, 
   //                        :State, 
   //                        :Pincode,
   //                        :Reffer_code, 
   //                        :Debit, 
   //                        :Reffer_by, 
   //                        :driver_action);'
   //                    );
					  
			// 	  $stmt = $pdo->prepare("INSERT INTO my_taxi_driver_details ( driver_id, name, mobile_no, vehicle_no,father_name, address, driving_licence, address_proof, id_proof, photo,location_latitude,location_longitude)
   // VALUES ( '$driver_id', '$name', '$mobile_no','$vehicle_no','$father_name','$address','$driving_licence',' $address_proof','$id_proof','$photo','$location_latitude', '$location_longitude')");
   //          break;
   //      case DB_POSTGRESQL:
   //      case DB_SQLITE3:
   //              break;
   //  }  
   //  if( $stmt->execute())   
   //  echo 'OK'; 
   //  else {
   //    echo mysql_error;
   //  }   

$query = "INSERT INTO my_taxi_driver_details ( driver_id, provider_id,name, mobile_no, vehicle_no,father_name, address, driving_licence, address_proof, id_proof, photo,location_latitude,location_longitude)
    VALUES ( '$driver_id', '$provider_id','$name', '$mobile_no','$vehicle_no','$father_name','$address','$driving_licence',' $address_proof','$id_proof','$photo','$location_latitude', '$location_longitude')";
    $query_run = mysqli_query($link,$query);
    if( $query_run)
      echo 'OK';
    else
      echo mysql_error;

?>
