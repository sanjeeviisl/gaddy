<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/list', trim($_SERVER['PATH_Documents'],'/list'));
include "connect.php";

$query    = "SELECT * FROM my_taxi_payment_details";
$query_run= mysqli_query($link,$query);
$rows     = mysqli_num_rows($query_run);
$arr      =array();
if($query_run)
{
	if($rows>0)
	{
         
        while($result=mysqli_fetch_array($query_run, MYSQLI_ASSOC))
        {
        	$foo = new stdClass();
        	$foo->id        =$result['Req_id'];
            $foo->proname      =$result['Pro_name'];
            $foo->provider     =$result['Provider'];
            $foo->reqstatus     =$result['Req_status'];
            $foo->amount     =$result['Req_amount'];
            $foo->paystatus     =$result['Payment_status'];
            $foo->mode    =$result['Payment_mode'];
            $foo->ledger_payment    =$result['Ledger_payment'];
            $foo->strippayment    =$result['Stripe_payment'];
            $foo->paymentvalue    =$result['Promo_value'];
            $foo->action    =$result['Payment_det_action']; 





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