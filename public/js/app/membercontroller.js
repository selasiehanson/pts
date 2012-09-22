function MemberController ($scope, Member){
	$scope.formTitle = "Add Member";
	$scope.members = [];

	function getMembers(){
		Member.query(function (res){
			window.x = res
			$scope.members = angular.copy(res);
		});	
	}

	$scope.refreshMembers =  function (){
		getMembers();
	}

	$scope.addMember =  function (newMember){
		if (newMember["id"]){
			Member.update(newMember, function (){
				getMembers();
				$scope.clear();
			});
			
		}else {
			var member =  angular.copy(newMember);
			var theMember = new Member(member);
			
			theMember.$save(function (){
				//fetch fresh items
				getMembers();
				$scope.clear();
			});
		}
	}

	$scope.makePayment = function (member){
		alert("making payment");
	}

	$scope.clear =  function (){
		//$scope.newMember = {};
		//$scope.title = "Add New Member";
		//$scope.statusText = "Add Member";
	}

	//make calls here
	getMembers();
}