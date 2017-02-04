<?php
    include 'dbconnect.php';
    
    $latitude_data  = isset($_GET['latitude_data']) ? $_GET['latitude_data'] : '0';
    $longitude_data = isset($_GET['longitude_data']) ? $_GET['longitude_data'] : '0';
    $date           = urldecode($date);
    $username       = isset($_GET['username']) ? $_GET['username'] : 0;
    $phonenumber    = isset($_GET['phonenumber']) ? $_GET['phonenumber'] : '';
    $sessionid      = isset($_GET['sessionid']) ? $_GET['sessionid'] : 0;


	$latitude_data_array = json_decode($latitude_data);
	$longitude_data_array = json_decode($longitude_data);
	
	$num_data = 60;
	
	for ($x = 0; $x < $num_data; $x++)
	{
		$latitude = $latitude_data_array[$x] ;
		$latitude = $latitude_data_array[$x] ;

		$params = array(':latitude'        => $latitude,
						':longitude'       => $longitude,
						':speed'           => $speed,
						':direction'       => $direction,
						':distance'        => $distance,
						':date'            => $date,
						':locationmethod'  => $locationmethod,
						':username'        => $username,
						':phonenumber'     => $phonenumber,
						':sessionid'       => $sessionid,
						':accuracy'        => $accuracy,
						':extrainfo'       => $extrainfo,
						':eventtype'       => $eventtype
					);

		$stmt = $pdo->prepare( $sqlFunctionCallMethod.'prcSaveGPSLocation(
							  :latitude, 
							  :longitude, 
							  :speed, 
							  :direction, 
							  :distance, 
							  :date, 
							  :locationmethod,
							  :username, 
							  :phonenumber, 
							  :sessionid, 
							  :accuracy, 
							  :extrainfo, 
							  :eventtype);'
						  );

		$stmt->execute($params);
	}
	
    $timestamp = $stmt->fetchColumn();
    echo $timestamp;    
?>
