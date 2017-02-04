<!DOCTYPE html>
<html ng-app="step" ng-controller="request">
<?php>
include "../header.php"
?>



<?php>
include "../footer.php"
?>
 <aside class="right-side">

                <section class="content-header">
                    <h1>
                        Requests
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    
<!--<div class="row">
    <div class="col-md-12 col-sm-12">
        <a id="addpro" href="http://taxinew.taxinow.xyz/admin/provider/add"><button class="btn btn-flat btn-block btn-info" type="button">Add Provider</button></a>
        <br/>
    </div>
</div>-->
<div class="col-md-6 col-sm-12">

    <div class="box box-danger">

        
            <div class="box-header">
                <h3 class="box-title">Sort</h3>
            </div>
            <div class="box-body row">

                <div class="col-md-6 col-sm-12">

                    <select class="form-control" id="sortdrop" name="type" ng-model="sorttype">
                        <option value="id"   id="reqid" selected>Request ID</option>
                        <option value="cust_name"   id="owner">Customer Name</option>
                        <option value="provider"   id="walker">Provider</option>
                        <option value="payment_mode"   id="payment">Payment Mode</option>
                    </select>

                    <br>
                </div>
                <div class="col-md-6 col-sm-12">
                   <input type="text" class="form-control" ng-model="reverse" placeholder="true for asc false for desc">

                    <br>
                </div>

            </div>

            <div class="box-footer">

                <button type="" id="btnsort" class="btn btn-flat btn-block btn-success">Sort</button>


            </div>
        

    </div>
</div>


<div class="col-md-6 col-sm-12">

    <div class="box box-danger">

        
            <div class="box-header">
                <h3 class="box-title">Filter</h3>
            </div>
            <div class="box-body row">

                <div class="col-md-6 col-sm-12">

                   <select class="form-control" id="sortdrop" name="type">
                        <option value="provider"  id="provid"> Provider ID</option>
                        <option value="provider_name"  id="pvname">Provider Name</option>
                        <option value="email"  id="pvemail">Provider Email</option>
                    </select>

                    <br>
                </div>
                <div class="col-md-6 col-sm-12">

                    <input class="form-control" type="text" name="valu" value="" id="insearch" placeholder="keyword" ng-model="searchtext.cust_name"/>
                    <br>
                </div>

            </div>

            <div class="box-footer">

                <button type="" id="btnsearch" class="btn btn-flat btn-block btn-success">Search</button>


            </div>
        

    </div>
</div>



<div class="box box-info tbl-box">
    <div align="left" id="paglink"><ul class="pagination">
			<li class="disabled"><span>&laquo;</span></li><li class="active"><span>1</span></li><li><a href="">2</a></li><li><a href="">3</a></li><li><a href="">4</a></li><li><a href="">5</a></li><li><a href="">6</a></li><li><a href="">7</a></li><li><a href="">8</a></li><li class="disabled"><span>...</span></li><li><a href="">807</a></li><li><a href="">808</a></li><li><a href="" rel="next">&raquo;</a></li>	</ul>
</div>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Request ID</th>
                <th>Customer Name</th>
                <th>Provider</th>
                <th>Date/Time</th>
                <th>Status</th>
                <th>Amount</th>
                <th>Payment Mode</th>
                <th>Payment Status</th>
                <th>Action</th>
            </tr>

                            <tr ng-repeat="req in request|orderBy:sorttype:reverse|filter:searchtext">
                    <td>{{req.id}}</td>
                    <td>{{req.cust_name}}</td>
                    <td>{{req.provider}}</td>
                    <td>{{req.datetime}}</td>
                    <td>{{req.req_status}}</td>
                    <td>
                        {{req.req_amount}}                   </td>
                    <td>{{req.payment_mode}}</td>
                    <td>{{req.payment_status}}</td>
                    <td><span class='badge bg-green'>{{req.req_action}}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-flat btn-info dropdown-toggle" type="button" id="dropdownMenu1" name="action" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="">Edit Details</a></li>
                                
                                    <!--<li role="presentation"><a id="addbank" role="menuitem" tabindex="-1" href="http://taxinew.taxinow.xyz/admin/provider/banking/1230">Add Banking Details</a></li>-->
                                
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="">View Banking Details</a></li>  

                                <li role="presentation"><a role="menuitem" id="history" tabindex="-1" href="">View History</a></li>

                                                                    <li role="presentation"><a role="menuitem" id="decline" tabindex="-1" href="">Decline</a></li>
                                    <li role="presentation"><a role="menuitem" id="decline" tabindex="-1" href="http://taxinew.taxinow.xyz/admin/provider/delete/1230">Delete</a></li>

                                                                                                    <li role="presentation"><a id="view_walker_doc" role="menuitem" tabindex="-1" href=""><span class='badge bg-red'>No Documents</span></a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                    </tbody></table>

</div>




</div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
       

       <script>

       var step=angular.module("step",[])
	.controller('request',function($scope,$http){
		$http.get("http://gaddy.in/control_panel/requests/getallrequestinfo.php")
		.then(function(response){
			$scope.request=response.data;
		},function(response){
			$scope.error=response.status;
		});
	});
       </script>