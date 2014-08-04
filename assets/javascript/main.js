$(document).ready(function(){
	$("#zip-code").on("click", function(){
		var zipCode = $("#zip-code-value").val();
		$("#results").empty();
		$.ajax({
   			 type: 'GET',
      		 dataType:'json',
    		 url: 'processzip/' + zipCode,
   			 //data: {"zipcode" : zipCode}, 
   			 success: function(data) {
   			 	 if( !$.isArray(data) || !data.length ) {
   			 	 	$("#results").append("<b>No data found.  Try again</b>");
   			 	 } else {
	   			 	 $("#results").text("");
	   			 	 var html = [];
	 			     $.each(data, function(k, v) {
	    			     html.push("<div class=\"panel panel-danger\"><div class=\"panel-heading\"><h3 class=\"panel-title\">"+v.theater_name+"</h3></div>");
	    			     html.push("<div class=\"panel-body\">"+v.address+"<br/><br/>");
	    			    
	    			     $.each(v, function (subK, subV) {
	    			     	var title = subV.title;
	    			     	var runtime = subV.runtime;
	    			     	var showtimes = subV.showtime;
	    			     	if(title !== undefined) {
	               				html.push("<b>"+title+"</b><br/>");
	               			}
	               			if(runtime !== undefined) {
	               				html.push(runtime+"<br/>");
	               			}
	               			if(showtimes !== undefined) {
	               				html.push(showtimes+"<br/><br/>");
	               			}
	               			
	           			 });
	           			 html.push("</div></div>");
	 			     });
	 				 $("#results").append(html.join(''));
	 				
	   			     return false;
	   	         }
	   	     
   			 },
   			 
	   		 error: function(XMLHttpRequest, textStatus, errorThrown) {
	      		// TODO: log errorThrown to php log or other logger  
	      		$('#results').append("Error or zip code not found");
	   		 }
	 	}); 
		
	 	return false;
	});
});

$(function(){
    $('a, button').click(function() {
        $(this).toggleClass('active');
    });
});

$body = $("body");

$(document).on({
    ajaxStart: function() { $body.addClass("loading");    },
    ajaxStop: function() { $body.removeClass("loading"); }    
});