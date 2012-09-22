angular.module('ptsServices', ['ngResource']).
factory("User", function ($resource){
	return $resource('users/:id', {id : '@id'}, {
	    query: {method:'GET', params:{}, isArray:true},
	    update : {method : 'PUT'}
	  });
}).factory("Member", function ($resource){
	return $resource('members/:id', {id : '@id'}, {
	    query: {method:'GET', params:{}, isArray:true},
	    update : {method : 'PUT'}
	  });
});