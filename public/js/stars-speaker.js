$(document).ready( function(){

	// initialize the tooltips 
	$('[data-toggle="tooltip"]').tooltip()

	//setting up the good value for the stars on the main page
    $("#option1").val(speaker.average_1);
    $("#option2").val(speaker.average_2);
    $("#option3").val(speaker.average_3);
    $("#option4").val(speaker.average_4);
    $("#option5").val(speaker.average_5);

  //initialise the stars of the main page
    $('.kv-ltr-theme-svg-star-display').rating({
    	min: 0, max: 5, step: 0.5, stars: 5,
        theme: 'krajee-svg',
        filledStar: '<span class="krajee-icon krajee-icon-star"></span>',
        emptyStar: '<span class="krajee-icon krajee-icon-star"></span>',
        displayOnly:true,
        size:'xl'
    });
    	
	//initialise the stars used to grade
    $('.kv-ltr-theme-svg-star').rating({
    	min: 0, max: 5, step: 0.5, stars: 5,
        theme: 'krajee-svg',
        filledStar: '<span class="krajee-icon krajee-icon-star"></span>',
        emptyStar: '<span class="krajee-icon krajee-icon-star"></span>',
        showClear: false,
        showCaption: false,
        size:'xl'
    });

	//initialise the disabled stars (when there is no reviews yet)
    $('.kv-ltr-theme-svg-star-disabled').rating({
	    theme: 'krajee-svg',
	    filledStar: '<span class="krajee-icon krajee-icon-star"></span>',
	    emptyStar: '<span class="krajee-icon krajee-icon-star disabled-stars"></span>',
	  	displayOnly:true,
	    size:'xl'
	  });
    
	// Updates the value of the fields "grades" of the form when stars are clicked
	$("#input1").rating().on("rating.change", function(event, value, caption) {  
		$("#1").val(value); 
	}); 

    $("#input2").rating().on("rating.change", function(event, value, caption) {   
 	   $("#2").val(value); 
     }); 

    $("#input3").rating().on("rating.change", function(event, value, caption) { 
       $("#3").val(value); 
     }); 

    $("#input4").rating().on("rating.change", function(event, value, caption) {  
 	   $("#4").val(value); 
     }); 

    $("#input5").rating().on("rating.change", function(event, value, caption) {  
 	   $("#5").val(value); 
     });

});