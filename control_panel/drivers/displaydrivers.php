<!DOCTYPE html>
<html ng-app="step" ng-controller="driver">
<?php>
include "../header.php"
?>



<?php>
include "../footer.php"
?>
<!-- code for Driver -->
 <aside class="right-side">

                <section class="content-header">
                    <h1>
                        Drivers
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    
<!--<div class="row">
    <div class="col-md-12 col-sm-12">
        <a id="addpro" href="http://taxinew.taxinow.xyz/admin/Driver/add"><button class="btn btn-flat btn-block btn-info" type="button">Add Driver</button></a>
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
                        <option value="id"  id="provid" selected>Driver ID</option>
                        <option value="name"  id="pvname">Driver Name</option>
                        <option value="email"  id="pvemail">Driver Email</option>
                        
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
                        <option value="provid"  id="provid"> Driver ID</option>
                        <option value="pvname"  id="pvname">Driver Name</option>
                        <option value="pvemail"  id="pvemail">Driver Email</option>
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
                <th>DRIVER-ID</th>
                <th>PROVIDER-ID</th>
                <th>Name</th>
                <th>MOBILE NUMBER</th>
                <th>VIHECLE NUMBER</th>
                <th>FATHER Name</th>
                <th>ADDRESS</th>
                <th>DRIVING LICENSE</th>
                <th>ADDRESS PROOF</th>
                <th>ID PROOF</th>
                <th>Photo</th>
                <th>LOCATION LATITUDE</th>
                <th>LOCATION LONGITUDE</th>
               
            </tr>

                            <tr ng-repeat="Driver in Drivers ">
                    <td>{{Driver.id}}</td>
                    <td>{{Driver.driver_id}}</td>
                    <th>{{Driver.provider_id}}</th>
                    <td>{{Driver.name}}</td>
                    <td>{{Driver.mobile_no}}</td>
                    <!-- <td><a ng-href="{{Driver.photo}}" target="_blank" >{{Driver.photo}}</a></td> -->

                  <!--  <td> <a ng-href="{{Driver.photo}}" 
  target="popup" 
  onclick="window.open('{{Driver.photo}}','popup','width=600,height=600'); return false;">
    {{Driver.photo}} -->
              
                     
                    <td>{{Driver.vehicle_no}}</td>
                    <td>{{Driver.father_name}}</td>
                    <td>{{Driver.address}}</td>
                    <td>{{Driver.driving_licence}}</td>
                    <td>{{Driver.address_proof}}</td>
                    <td>{{Driver.id_proof}}</td>

                    <td ><button ng-click="openWindow(Driver.photo)">{{Driver.photo}}</button></td>
                    <td>{{Driver.location_latitude}}</td>
                    <td>{{Driver.location_longitude}}</td>

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
	.controller("driver",function($scope,$http){
		$http.get("http://gaddy.in/control_panel/drivers/getalldriverinfo.php")
		.then(function(response){
			$scope.Drivers=response.data;
		},function(response){
			$scope.error=response.status;
		});

        $scope.openWindow = function(link) {
       window.open(link, 'C-Sharpcorner', 'width=500,height=400');
       
       

    };
	});

	</script>
	