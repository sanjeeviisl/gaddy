<?php

require_once '../common/membership/classes/Membership.php';
$membership = New Membership();

$membership->confirm_Member();

?>

<!DOCTYPE html>
<?php>
include "../header.php"
?>



<?php>
include "../footer.php"
?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">

                <section class="content-header">
                    <h1>
                        Main Dashboard
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    

<!--   summary start -->


<div class="row">
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    Change1               </h3>
                <p>
                    Total Trips
                </p>
            </div>
            <div class="icon">
                                <i class="fa">&#xf1B9;</i>
            </div>

        </div>
    </div><!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    Change2                </h3>
                <p>
                    Completed Service Receiveds
                </p>
            </div>
            <div class="icon">
                                <i class="fa">&#xf1B9;</i>
            </div>

        </div>
    </div><!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>
                    Change3             </h3>
                <p>
                    Cancelled Service Receiveds
                </p>
            </div>
            <div class="icon">
                                <i class="fa">&#xf00d;</i>
            </div>

        </div>
    </div><!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-purple">
            <div class="inner">
                <h3>
                   Change4                </h3>
                <p>
                    Total Payment
                </p>
            </div>
            <div class="icon">
                                <i class="fa">&#xf00c;</i>
            </div>

        </div>
    </div><!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    Chnage5                </h3>
                <p>
                    Card Payment
                </p>
            </div>
            <div class="icon">
                                <i class="fa">&#xf09d;</i>
            </div>

        </div>
    </div><!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-maroon">
            <div class="inner">
                <h3>
                    Change6                </h3>
                <p>
                    Referral Payment
                </p>
            </div>
            <div class="icon">
                                <i class="fa">&#xf005;</i>
            </div>

        </div>
    </div><!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    Change7               </h3>
                <p>
                    Cash Payment
                </p>
            </div>
            <div class="icon">
                                <i class="fa">&#xf0d6;</i>
            </div>

        </div>
    </div><!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    Change8                </h3>
                <p>
                    Promotional Payment
                </p>
            </div>
            <div class="icon">
                                <i class="fa">&#xf06b;</i>
            </div>

        </div>
    </div><!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>
                    change9          </h3>
                <p>
                    Total Schedules
                </p>
            </div>
            <div class="icon">
                                <i class="fa">&#xf073;</i>
            </div>

        </div>
    </div><!-- ./col -->
</div>



<!--  Summary end -->



<!-- filter start -->

<div class="box box-danger">
    <div class="box-header">
        <h3 class="box-title">Filter</h3>
    </div>
    <div class="box-body">
        <div class="row">

            <form role="form" method="get" action="http_report">

                <div class="col-md-6 col-sm-6 col-lg-6">
                    <input type="text" class="form-control" style="overflow:hidden;" id="start-date" name="start_date" value="" placeholder="Start Date">
                    <br>
                </div>

                <div class="col-md-6 col-sm-6 col-lg-6">
                    <input type="text" class="form-control" style="overflow:hidden;" id="end-date" name="end_date" placeholder="End Date"  value="">
                    <br>
                </div>

                <div class="col-md-4 col-sm-4 col-lg-4">

                    <select name="status"  class="form-control">
                        <option value="0">Status</option>
                        <option value="1"  >Completed</option>
                        <option value="2" >Cancelled</option>
                    </select>
                    <br>
                </div>

                <div class="col-md-4 col-sm-4 col-lg-4">

                    <select name="walker_id" style="overflow:hidden;" class="form-control">
                        <option value="0">Provider</option>
                                                    <option value="2" >PhonPanom Sivilay</option>
                                                    <option value="4" >Tuannguyenji Tien</option>
                                                    <option value="5" >hong kham</option>
                                                                       </select>
                    <br>
                </div>

                <div class="col-md-4 col-sm-4 col-lg-4">

                    <select name="owner_id" style="overflow:hidden;" class="form-control">
                        <option value="0">User</option>
                                                    <option value="1" >Banu Priya</option>
                                                    <option value="2" >tu?ng nguy?n</option>
                                            </select>
                    <br>
                </div>


        </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-primary" value="Filter_Data">Filter Data</button>
        <button type="submit" name="submit" class="btn btn-primary" value="Download_Report">Download Report</button>
    </div>

</form>

</div>

<!-- filter end-->

    <table class="table table-bordered">
        <tbody><tr>
                <th>Request ID</th>
                <th>Customer Name</th>
                <th>Provider</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
				<th>Amount</th>
                <th>Payment Status</th>
                <th>Referral Bonus</th>
                <th>Promotional Bonus</th>
                <th>Card Payment</th>
                <th>Cash Payment</th>
            </tr>

			

			            
        </tbody>
    </table>
 
</div>

    </body>
    <!--/ END Body -->
</html>