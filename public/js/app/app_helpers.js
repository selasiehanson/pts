// Provide the wiring information in a module
angular.module('appHelpers', []).
  factory('MSG', function($window) {
    return {
      	show : function (message,status, title){
      		var status = status ? status: "error";
      		var title = "";
      		
      		if(status==="success" && !title)
      			title = "Success";
      		if(status === "error" && !title)
      			title = "Error";

      		$.pnotify({
    				title: title || "",
    				text: message,
    				type: status
    			});
	    }, 
	    hide : function (){
	    	
	    }
    };
  }).
  factory('DateHelper', function($window) {
    return {
        init : function (date){
          this.startDate = date || new Date();
          this.currentDate =  this.startDate
        },
        nextDate : function (config){
          //we are just handling month for now
          var useMonth = config.month ? true : false;
          day =  this.currentDate.getDate();
          month = this.currentDate.getMonth();
          year =  this.currentDate.getFullYear();

          if(useMonth) {
            month += 1;
          }

          if(month === 11){
            year + 1
          }

          if(day === 31){

          }

          if(month === 1 && day > 28){ //feb
            day = 28
          }
          this.currentDate = new Date(year, month,day);
          return this.currentDate;
        },
        getCurrentDate : function(){
          return this.currentDate;
        }
    };
  });