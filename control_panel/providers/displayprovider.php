<!DOCTYPE html>
<html ng-app="step" ng-controller="provider">
<?php>
include "../header.php"
?>



<?php>
include "../footer.php"
?>
<!-- code for provider -->
 <aside class="right-side">

                <section class="content-header">
                    <h1>
                        Providers
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
                        <option value="id"  id="provid" selected>Provider ID</option>
                        <option value="name"  id="pvname">Provider Name</option>
                        <option value="email"  id="pvemail">Provider Email</option>
                        
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
                    <select class="form-control" id="sortdrop" name="type">
                        <option value="provid"  id="provid"> Provider ID</option>
                        <option value="pvname"  id="pvname">Provider Name</option>
                        <option value="pvemail"  id="pvemail">Provider Email</option>
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
<div class="col-md-12 col-sm-12">
            <div id="currently"  class="col-md-12 col-sm-12 btn btn-warning"  >Currently Providing</div><br/>
        <br><br>
</div>
    <table class="table table-bordered" >
        <tbody><tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Photo</th>
                <th>Bio</th>
                <th>Total Requests</th>
                <th>Acceptance Rate</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

                            <tr ng-repeat="provider in providers |orderBy:sorttype:reverse |filter:searchtext">
                    <td>{{provider.id}}</td>
                    <td>{{provider.name}}</td>
                    <td>{{provider.email}}</td>
                    <td>{{provider.phone}}</td>
                    <!-- <td><a ng-href="{{provider.photo}}" target="_blank" >{{provider.photo}}</a></td> -->

                  <!--  <td> <a ng-href="{{provider.photo}}" 
  target="popup" 
  onclick="window.open('{{provider.photo}}','popup','width=600,height=600'); return false;">
    {{provider.photo}} -->
              <td ><button ng-click="openWindow(provider.photo)">{{provider.photo}}</button></td>

</a></td>
                    <td>
                        <span class='badge bg-red'>{{provider.bio}}</span>                    </td>
                    <td>{{provider.tot_req}}</td>
                    <td>{{provider.accept_rat}}</td>
                    <td><span class='badge bg-green'>{{provider.status}}</span>                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-flat btn-info dropdown-toggle" type="button" id="dropdownMenu1" name="action" data-toggle="dropdown">
                               {{provider.action}}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Edit Details</a></li>
                                
                                    <!--<li role="presentation"><a id="addbank" role="menuitem" tabindex="-1" href="http://taxinew.taxinow.xyz/admin/provider/banking/1230">Add Banking Details</a></li>-->
                                
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">View Banking Details</a></li>  

                                <li role="presentation"><a role="menuitem" id="history" tabindex="-1" href="#">View History</a></li>

                                                                    <li role="presentation"><a role="menuitem" id="decline" tabindex="-1" href="#">Decline</a></li>
                                    <li role="presentation"><a role="menuitem" id="decline" tabindex="-1" href="#">Delete</a></li>

                                                                                                    <li role="presentation"><a id="view_walker_doc" role="menuitem" tabindex="-1" href="#"><span class='badge bg-red'>No Documents</span></a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                    </tbody></table>

</div>



                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <script type="text/javascript">
    $("#owners").addClass("active");
    $('#option3').show();
    $('.fade').css('opacity', '1');
    $('.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus').css('color', '#ffffff');
    $('.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus').css('background-color', '#');
	
	var step=angular.module("step",[])
	.controller('provider',function($scope,$http){
		$http.get("http://gaddy.in/control_panel/providers/getallproviderinfo.php")
		.then(function(response){
			$scope.providers=response.data;
		},function(response){
			$scope.error=response.status;
		});

        $scope.openWindow = function(link) {
       window.open(link, 'C-Sharpcorner', 'width=500,height=400');
       
       

    };
	});

	</script>
	