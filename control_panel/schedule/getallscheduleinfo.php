<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
include "connect.php";

$query    = "SELECT * FROM my_taxi_schedules";
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
            
            $foo->date          =$result['Date'];
            $foo->time          =$result['Time'];
            $foo->cust_name     =$result['Customer_name'];
            $foo->cust_zone     =$result['Customer_Zone'];
            $foo->source_add    =$result['Source_address'];
            $foo->dest_add      =$result['Dest_address'];
            $foo->promocode     =$result['Promo_code'];
            $foo->payment_mode  =$result['Payment_mode'];
            

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