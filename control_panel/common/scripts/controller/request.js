step.controller("request",['$scope','$http',function($scope,$http){
	console.log("request me hun ");

   $scope.sorttype="name";
   $scope.reverse=false;
   $scope.searchtext="";
	$scope.request={};
	$scope.onload=function(){
		$http.get('http://gaddy.in/gaddy/views/server-pages/request.php/listrequest')
		.then(function(respond){
			$scope.request=respond.data;
			console.log($scope.request);
		},
		function(respond){
			$scope.error="error"+" "+respond.status+respond.statusText;
			console.log($sccope.error);
		})
	}

	$scope.onload();
}])