<?php
    include 'dbconnect.php';
 
	$provider_name        =isset($_POST['provider_name']) ? $_POST['provider_name'] : ' ';
	$provider_email         =isset($_POST['provider_email']) ? $_POST['provider_email'] : ' ';
	$provider_phonenumber =isset($_POST['provider_phonenumber']) ? $_POST['provider_phonenumber'] : 0;
	$provider_photo       =isset($_POST['provider_photo']) ? $_POST['provider_photo'] : ' ';
	$provider_bio         =isset($_POST['provider_photo']) ? $_POST['provider_photo'] :' ';
 	$provider_tot_req     =isset($_POST['provider_tot_req']) ? $_POST['provider_tot_req'] : 0;
	$provider_accept_rate =isset($_POST['provider_accept_rate']) ? $_POST['provider_accept_rate'] : 0;
	$pro_status           =isset($_POST['pro_status']) ? $_POST['pro_status'] : 'approved';
	$pro_action           =isset($_POST['pro_action']) ? $_POST['pro_action'] : 'done';
	
	
	if($provider_phonenumber == 0)
		return;

    $params = array(
                    ':provider_name'         => $provider_name,
                    ':provider_email'        => $provider_email,
                    ':provider_phonenumber'  => $provider_phonenumber,
                    ':provider_photo'         => $provider_photo,
                    ':provider_bio'           => $provider_bio,
                    ':provider_tot_req'       => $provider_tot_req,
                    ':provider_accept_rate'   => $provider_accept_rate,
                    ':pro_status'             => $pro_status,
                    ':pro_action'             => $pro_action,
                  
                   
                );
				
    switch ($dbType) {
        case DB_MYSQL:
         /* $stmt = $pdo->prepare( $sqlFunctionCallMethod.'prcSaveproviderInfo(
                          :provider_name, 
                          :provider_email, 
                          :provider_phone, 
                          :provider_address, 
                          :State, 
                          :Pincode,
                          :Reffer_code, 
                          :Debit, 
                          :Reffer_by, 
                          :provider_action);'
                      );
			*/		  
				  $stmt = $pdo->prepare("INSERT INTO my_taxi_provider ( Pro_name, Pro_email, Pro_phone, Pro_photo,Pro_bio, Pro_tot_req, Pro_accept_rate, Pro_status,  pro_action )
   VALUES ( '$provider_name', '$provider_email', '$provider_phonenumber',' $provider_photo','$provider_bio','$provider_tot_req','$provider_accept_rate',' $pro_status','$pro_action')");
            break;
        case DB_POSTGRESQL:
        case DB_SQLITE3:
                break;
    }  
    $stmt->execute($params);
   
    echo 'OK';    
?>
