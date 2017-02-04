<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
include "connect.php";

$query    = "SELECT * FROM my_taxi_promotions";
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
            $foo->id        =$result['Promo_id'];
            $foo->code      =$result['Promo_code'];
            $foo->value     =$result['Promo_value'];
            $foo->user     =$result['Remain_user'];
            $foo->status   =$result['Promo_status'];
            $foo->expired     =$result['Promo_expired'];
            $foo->event   =$result['Promo_event'];
            $foo->startdate =$result['Promo_start_date'];
            $foo->enddate     =$result['Promo_end_date'];
            $foo->action =$result['Promo_action'];
           
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