(function($) {

    $.fn.loadTableau = function( options ) {

        // Establish our default settings
        var defaults = {
            url         : 'http://public.tableausoftware.com/views/GastonDemographicsv3/AgeGender?:embed=yes&:tabs=no',
            height      : "960",
            indicator	: null
        },
        
        settings = $.extend({}, defaults, options);

        this.each(function() {       	
        	
        	var $this = $(this);  
        	 

        	//var newTab = settings.hash;
        	if (settings.indicator){
	        	var newTab1 = settings.indicator; 
	        	var newTab = newTab1.charAt(0).toUpperCase() + newTab1.slice(1);
	        	      	 
	        	 
	        	//Gets tab within
	        	var curURL = settings.url;        	
	        	var desired = curURL.split('/')[5];        	
	        	curTab = desired.split('?')[0];
	        	
	        	newURL = curURL.replace(curTab, newTab);
	        	//console.log(curTab);
	        	
	       } 	
	        	
	        	
	        	     	          
				if (newTab != null){
	            	$this.attr('src', newURL);
	            	//this.contentWindow.location.replace(newURL);
	            	//console.log("1");
	            }else{
	            	//$this.attr('src', settings.url);
	            	//($this);
	            	$this.get(0).contentWindow.location.replace(settings.url);	            	
	            }            
            
            
            
            
            $this.attr( 'height', settings.height);          	

        });
        return this;

    } 
    

    

}(jQuery));
