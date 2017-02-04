<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
include "connect.php";

$query    = "SELECT * FROM my_taxi_customer ";
$query_run= mysqli_query($link,$query);
$rows     = mysqli_num_rows($query_run);
$arr=array();
if($query_run)
{
	if($rows>0)
	{        
        while($result=mysqli_fetch_array($query_run, MYSQLI_ASSOC))
        {
        	$foo = new stdClass();
        	$foo->id        =$result['Customer_id'];
        	$foo->name      =$result['Customer_name'];
        	$foo->email     =$result['Customer_email'];
        	$foo->phone     =$result['Customer_phone'];
        	$foo->address   =$result['Customer_address'];
        	$foo->state     =$result['State'];
        	$foo->pincode   =$result['Pincode'];
        	$foo->reffercode =$result['Reffer_code'];
        	$foo->debit     =$result['Debit'];
        	$foo->refferby =$result['Reffer_by'];
        	$foo->action    =$result['Customer_action'];
            array_push($arr, $foo);
        } 
        $data=json_encode($arr);
        echo $data;
    }
}
else
{
echo mysqli_connect_error;
}

?>