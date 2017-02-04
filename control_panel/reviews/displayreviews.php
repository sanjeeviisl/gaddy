<!DOCTYPE html>
<html ng-app="step" ng-controller="review">
<?php>
include "../header.php"
?>



<?php>
include "../footer.php"
?>

  <aside class="right-side">

                <section class="content-header">
                    <h1>
                        Reviews
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    

<div class="box box-danger">
    <form method="get" action="http://taxinew.taxinow.xyz/admin/searchrev" >
            <div class="box-header">
                <h3 class="box-title">Filter</h3>
            </div>
            <div class="box-body row">
                <div class="col-md-6 col-sm-12">
                    <select id="searchdrop" class="form-control" name="type">
                        <option value="owner" id="owner">Customer Name</option>
                        <option value="walker" id="walker">Provider</option>
                    </select>
                    <br>
                </div>
                <div class="col-md-6 col-sm-12">
                    <input class="form-control" type="text" name="valu" value="" id="insearch" placeholder="keyword"/>
                    <br>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" id="btnsearch" class="btn btn-flat btn-block btn-success">Search</button>
            </div>
    </form>
</div>

<div class="box box-info tbl-box">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Provider Reviews</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Customer Reviews</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div align="left" id="paglink"><ul class="pagination">
			<li class="disabled"><span>&laquo;</span></li><li class="active"><span>1</span></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=2">2</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=3">3</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=4">4</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=5">5</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=6">6</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=7">7</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=8">8</a></li><li class="disabled"><span>...</span></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=86">86</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=87">87</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=2" rel="next">&raquo;</a></li>	</ul>
</div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Provider</th>
                            <th>Rating</th>
                            <th>Date and Time</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                                            </thead>
                     <tbody>
                        <tr ng-repeat="review in reviews">
                          <td>{{review.id}}</td>
                           <td>{{review.cust_name}}</td>
                           <td>{{review.pro_name}}</td>
                           <td>{{review.rating}}</td>
                           <td>{{review.datetime}}</td>
                           <td>{{review.comment}}</td>
                            <td>{{review.action}}</td>
                        </tr>
                     </tbody>
                </table>
                <div align="left" id="paglink"><ul class="pagination">
			<li class="disabled"><span>&laquo;</span></li><li class="active"><span>1</span></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=2">2</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=3">3</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=4">4</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=5">5</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=6">6</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=7">7</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=8">8</a></li><li class="disabled"><span>...</span></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=86">86</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=87">87</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=2" rel="next">&raquo;</a></li>	</ul>
</div>
            </div><!-- /.tab-pane -->
             <div class="tab-pane" id="tab_2">
                <table class="table table-bordered">
                    <tbody>
                        <tr>

                            <th>Provider Name</th>
                            <th>Customer</th>
                            <th>Rating</th>
                            <th>Date and Time</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                                                                            <tr>
                                <td>Test12 Test </td>
                                <td>Tttt Jhjj </td>
                                <td>5</td>
								<td> 2016-05-22 23:37:10</td>
                                
                                <td></td>
                                <td><a href=""><input type="button" disabled class="btn btn-success" value="Delete"></a></td>
                            </tr>
                                                    <tr>
                                <td>Test12 Test </td>
                                <td>Tttt Jhjj </td>
                                <td>5</td>
								<td> 2016-05-22 23:35:37</td>
                                
                                <td></td>
                                <td><a href=""><input type="button" disabled class="btn btn-success" value="Delete"></a></td>
                            </tr>
                                                    <tr>
                                <td><a href=""><input type="button" disabled class="btn btn-success" value="Delete"></a></td>
                            </tr>
                                            </tbody>
                </table>
                <div align="left" id="paglink"><ul class="pagination">
			<li class="disabled"><span>&laquo;</span></li><li class="active"><span>1</span></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=2">2</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=3">3</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=4">4</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=5">5</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=6">6</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=7">7</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=8">8</a></li><li class="disabled"><span>...</span></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=86">86</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=87">87</a></li><li><a href="http://taxinew.taxinow.xyz/admin/reviews?page=2" rel="next">&raquo;</a></li>	</ul>
</div>
           </div>
       </div>
   </div>
</div>


                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <script>
        var step=angular.module("step",[])
    .controller("review",function($scope,$http){
        $http.get("http://gaddy.in/control_panel/reviews/getallreviewsinfo.php")
        .then(function(response){
            $scope.reviews=response.data;
        },function(response){
            $scope.error=response.status;
        });
        });
</script>