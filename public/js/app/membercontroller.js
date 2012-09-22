function MemberController ($scope, Member, MSG){
	$scope.formTitle = "Add Member";
	$scope.members = [];
	
	//this is for payments
	$scope.currencies = [
			{ id:1, name : "GHC"},
			{ id:2, name : "USD"}
	];

	$scope.breakDown = [];

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

	var getCurById = function (id){
		var result = $scope.currencies.filter(function (n){
			return n.id === id;
		});

		return result[0];
	}

	$scope.generateBreakDown = function (currentPayment){
		var numMonths = currentPayment.numMonths;
		var currency = getCurById(currentPayment.currencyId);
		if(!numMonths){
			MSG.show("Please enter a number for the duration of payment","error","Error");
			return;
		}
		if(!currency){
			MSG.show("Please select a currency","error","Error");
			return;
		}


		//clear the breakdown array
		$scope.breakDown = [];
		for (var i = 0; i < numMonths; i++) {
			var obj = {
				month : "month" + (i +1),
				currency : currency.name,
				amount : 0
			}

			$scope.breakDown.push(obj);
		};
	}

	$scope.makePayment = function (member){
		var paymentForm = $("#payment_form");
		paymentForm.modal();
		$scope.currentMember = {};
		$scope.currentMember["id"] = member.id;
		$scope.currentMember["name"] = member.firstName + " " + member.lastName;
		// $scope.currentPayment.currencyId  = $scope.currencies[0].id;
	}

	$scope.submitPayment = function (member, currentPayment){
		console.log(member);
		console.log(currentPayment);
		console.log($scope.breakDown);
	}

	$scope.clear =  function (){
		//$scope.newMember = {};
		//$scope.title = "Add New Member";
		//$scope.statusText = "Add Member";
	}

	//make calls here
	getMembers();
}