<?php
    include 'dbconnect.php';
 
	$Customer_name     =isset($_GET['customer_name']) ? $_GET['customer_name'] : ' ';
    $Customer_email    =isset($_GET['customer_email']) ? $_GET['customer_email'] : ' ';
	$Customer_phone    =isset($_GET['customer_phonenumber']) ? $_GET['customer_phonenumber'] : 0;
	$Customer_address  =isset($_GET['Customer_address']) ? $_GET['Customer_address'] : ' ';
	$State             =isset($_GET['State']) ? $_GET['State'] : ' ';
	$Pincode           =isset($_GET['Pincode']) ? $_GET['Pincode'] : 0 ;
	$Reffer_code        =isset($_GET['Refer_code']) ? $_GET['Refer_code'] : ' ';
	$Debit             =isset($_GET['Debit']) ? $_GET['Debit'] : 0 ;
	$Reffer_by         =isset($_GET['Reffer_by']) ? $_GET['Reffer_by'] : ' ';
	$Customer_action   =isset($_GET['Customer_action ']) ? $_GET['Customer_action '] : ' ';
	
	

    $params = array(
                    ':Customer_name'         => $Customer_name,
                    ':Customer_email'        => $Customer_email,
                    ':Customer_phone'        => $Customer_phone,
                    ':Customer_address'      => $Customer_address,
                    ':State'                 => $State,
                    ':Pincode'               => $Pincode,
                    ':Reffer_code'            => $Reffer_code,
                    ':Debit'                 => $Debit,
                    ':Reffer_by'             => $Reffer_by,
                    ':Customer_action'       => $Customer_action
                   
                );

    switch ($dbType) {
        case DB_MYSQL:
         /* $stmt = $pdo->prepare( $sqlFunctionCallMethod.'prcSaveCustomerInfo(
                          :Customer_name, 
                          :Customer_email, 
                          :Customer_phone, 
                          :Customer_address, 
                          :State, 
                          :Pincode,
                          :Reffer_code, 
                          :Debit, 
                          :Reffer_by, 
                          :Customer_action);'
                      );
			*/		  
				  $stmt = $pdo->prepare("INSERT INTO my_taxi_customer ( Customer_name, Customer_email, Customer_phone, Customer_address,State, Pincode, Reffer_code, Debit,  Reffer_by, Customer_action)
   VALUES ( '$Customer_name', '$Customer_email', '$Customer_phone',' $Customer_address','$State','$Pincode','$Reffer_code',' $Debit','$Reffer_by','$Customer_action')");
            break;
        case DB_POSTGRESQL:
        case DB_SQLITE3:
                break;
    }  
    $stmt->execute($params);
   

    $arr['status'] = "OK";
    $data=json_encode($arr);
    echo $data;

?>
