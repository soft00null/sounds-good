
 
		// When the DOM is ready, initialize the scripts.
		jQuery(function( $ )
		
		{
 
			// Get a reference to the container.
			var container = $( "#playlist " );
 
 
			// Bind the link to toggle the slide.
			$( "x" ).click(
				function( event ){
					// Prevent the default event.
					event.preventDefault();
 
					// Toggle the slide based on its current
					// visibility.
					if (container.is( ":visible" )){
 
						// Hide - slide up.
						container.slideUp( 200);
 
					} else {
 
						// Show - slide down.
						container.slideDown( 200 );
 
					}
				}
			);
 
		});
 
	
            
