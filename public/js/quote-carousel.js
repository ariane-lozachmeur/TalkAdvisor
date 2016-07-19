$(document).on('ready', function(){


//quote container
	var j=0;  //the jth quote is displayed, this is important to know if there is still a quote to show when we go back
	$("#text-quote").text(quotes[0]);
	
	// Access to the next quote						
    $("#quote-right").click(function(){    
        j++
    	$("#text-quote").text(quotes[j]);
		if (j==1){						// there is now one quote that we can go back to
			$("#quote-left").show();
        }
        if(j==quotes.length-1){
            $("#quote-right").hide();
        }
    });
    
	// Acces to the previous quote
    $("#quote-left").click(function(){
        j--
    	$("#text-quote").text(quotes[j]);
    	if (j==0){						// there is no quote "on the left"
			$("#quote-left").hide();
        }
    	if(j==quotes.length-2){			//there is now a quote we can go to
            $("#quote-right").show();
        }
    });
    
});