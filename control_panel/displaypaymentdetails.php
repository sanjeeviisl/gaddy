<!DOCTYPE html>
<html ng-app="step" ng-controller="paymentdetails">
<?php>
include "header.php"
?>



<?php>
include "footer.php"
?>

            <aside class="right-side">

                <section class="content-header">
                    <h1>
                        Payment Details
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    <!--   summary start -->
<div class="row">
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    $ 834013.22                </h3>
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
                    $ 2367.82                </h3>
                <p>
                    Stripe Payment
                </p>
            </div>
            <div class="icon">
                                <i class="fa">&#xf09d;</i>
            </div>

        </div>
    </div><!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>
                    $ 31.00                </h3>
                <p>
                    Credit Payment
                </p>
            </div>
            <div class="icon">
                                <i class="fa">&#xf005;</i>
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

            <form role="form" method="get" action="http://taxinew.taxinow.xyz/admin/details_payment">

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
                                            </select>
                    <br>
                </div>

                <div class="col-md-4 col-sm-4 col-lg-4">

                    <select name="owner_id" style="overflow:hidden;" class="form-control">
                        <option value="0">User</option>
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




<div class="box box-info tbl-box">
    <div align="left" id="paglink"><ul class="pagination">
            <li class="disabled"><span>&laquo;</span></li><li class="active"><span>1</span></li><li><a href="">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li><a href="#">6</a></li><li><a href="#">7</a></li><li><a href="#">8</a></li><li class="disabled"><span>...</span></li><li><a href="#">775</a></li><li><a href="#">776</a></li><li><a href="#" rel="next">&raquo;</a></li>  </ul>
</div>
    <table class="table table-bordered">
        <thead><tr>
                <th>Request ID</th>
                <th>Owner Name</th>
                <th>Provider</th>
                <th>Status</th>
                <th>Amount</th>
                <th>Payment Status</th>
                <th>Payment Mode</th>
                <th>Ledger Payment</th>
                <th>Stripe Payment</th>
                <th>Promo Discount</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody ng-repeat="payment in paymentdetails">
                <td>{{payment.id}}</td>
                <td>{{payment.proname}}</td>
                <td>{{payment.provider}}</td>
                <td>{{payment.reqstatus}}</td>          
                <td>{{payment.amount}}</td>
                <td>{{payment.paystatus}}</td>
                <td>{{payment.maode}}</td>
                <td>{{payment.ledger_payment}}</td>
                <td>{{payment.strippayment}}</td>
                <td>{{payment.paymentvalue}}</td>
                <td>{{payment.action}}</td>


            </tbody>


            
            
        </tbody>
    </table>
   
</div>
<!--</form>-->
</div>
</div>
</div>


         
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
<script>
 var step=angular.module("step",[])
    .controller("paymentdetails",function($scope,$http){
        $http.get("http://gaddy.in/control_panel/paymentdetails/getallpaymentdetailsinfo.php")
        .then(function(response){
            $scope.paymentdetails=response.data;
        },function(response){
            $scope.error=response.status;
        });
    });

</script>