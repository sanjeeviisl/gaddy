<!DOCTYPE html>
<html ng-app="step" ng-controller="usercon">
<?php>
include "../header.php"
?>



<?php>
include "../footer.php"
?>
<aside class="right-side">

    <section class="content-header">
        <h1>
            Customers
        </h1>

    </section>
<!-- Main content -->
    <section class="content">
        <div class="col-md-6 col-sm-12">

            <div class="box box-danger">

                
                    <div class="box-header">
                        <h3 class="box-title">Sort</h3>
                    </div>
                    <div class="box-body row">

                        <div class="col-md-6 col-sm-12">


                            <select id="sortdrop" class="form-control" ng-model="sorttype">
                                <option value="id"  id="provid">Customer ID</option>
                                <option value="name"  id="pvname" selected>Customer Name</option>
                                <option value="email"  id="pvemail">Customer Email</option>
                            </select>

                            <br>
                        </div>
                        <div class="col-md-6 col-sm-12">

                       <input type="text" class="form-control" ng-model="reverse" placeholder="true for asc false for desc">

                            <br>
                        </div>

                    </div>

                    <div class="box-footer">


                        <button type="submit" id="btnsort" class="btn btn-flat btn-block btn-success">Sort</button>


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

                            <select class="form-control" id="searchdrop"  name="type">
                                <option value="userid" id="id">Customer ID</option>
                                <option value="username" id="name">Customer Name</option>
                                <option value="useremail" id="email">Customer Email</option>
                                <option value="useraddress" id="address">Customer Address</option>
                            </select>


                            <br>
                        </div>
                        <div class="col-md-6 col-sm-12">


                            <input class="form-control" type="text" name="valu" ng-model="searchtext.name" id="insearch" placeholder="keyword"/>
                            
                            <br>
                        </div>

                    </div>

                    <div class="box-footer">

                        <button type="submit" id="btnsearch" class="btn btn-flat btn-block btn-success">Search</button>


                    </div>
                

            </div>
        </div>



        <div class="box box-info tbl-box">
            <div align="left" id="paglink"><ul class="pagination">
                <li class="disabled"><span>&laquo;</span></li><li class="active"><span>1</span></li><li><a href="">2</a></li><li><a href="">3</a></li><li><a href="">4</a></li><li><a href="">5</a></li><li><a href="">6</a></li><li><a href="">7</a></li><li><a href="">8</a></li><li class="disabled"><span>...</span></li><li><a href="">200</a></li><li><a href="">201</a></li><li><a href="" rel="next">&raquo;</a></li>	</ul>
            </div>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>State</th>
                    <th>Zipcode</th>
                    <th>Refferal Code</th>
                    <th>Debt</th>
                    <th>Referred By</th>
                    <th>Actions</th>

                </tr>

                <tr ng-repeat="cust in customer| orderBy:sorttype:reverse |filter:searchtext">
                    
            <td>{{cust.id}}</td>
            <td>{{cust.name}} </td>
            <td>{{cust.email}}</td>
            <td>{{cust.phone}}</td>
            <td>
                {{cust.address}}
            <td>
                {{cust.state}}
            <td>
                {{cust.pincode}}
            <td>{{cust.reffercode}}</td>
            <td>{{cust.debit}}</td>
            <td>{{cust.referby}}</td>
            <td>
                {{cust.action}}
            </td>
            </tr>
            </tbody>
            </table>

            




        </div>
		
		
		
    </section><!-- /.content -->
</aside><!-- /.right-side -->
<!-- ./wrapper -->


<script type="text/javascript">
    $("#owners").addClass("active");
    $('#option3').show();
    $('.fade').css('opacity', '1');
    $('.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus').css('color', '#ffffff');
    $('.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus').css('background-color', '#');
	
	var step=angular.module("step",[])
	.controller('usercon',function($scope,$http){
		$http.get("http://gaddy.in/control_panel/customers/getallcustomerinfo.php")
		.then(function(response){
			$scope.customer=response.data;
		},function(response){
			$scope.error=response.status;
		});
	});
	
	
</script>




</body>
</html>