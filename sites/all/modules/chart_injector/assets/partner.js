jQuery(document).ready(function($){




	$.QueryString = (function(a) {
	    if (a == "") return {};
	    var b = {};
	    for (var i = 0; i < a.length; ++i)
	    {
	        var p=a[i].split('=');
	        if (p.length != 2) continue;
	        b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
	    }
	    return b;
	})(window.location.search.substr(1).split('&'))

	//var newURL = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname;
	var pathArray = window.location.pathname.split( '/' );
	//var secondLevelLocation = pathArray[3];
	var lastItem = pathArray[pathArray.length - 1];



	//Add some page elements
	$("#explore-data").after("<div id=\"tableau-box\"><iframe id=\"vizFrame\" style=\"overflow-y:hidden;width: 634px;\" scrolling=\"no\" width=\"634\" frameBorder=\"0\" seamless>Browser not compatible.</iframe></div>");














////////////////////////////////////////
// Start
////////////////////////////////////////

////////////////////////////////////////
// Starter array for partner

//This might be confusing because you do not see the path referenced in this code, however
//the Drupal module is programmed to drop the jsonPath variable earlier in the DOM

$.getJSON( "/"+ jsonPath).done(function(response) {
    //console.log(response); //here's your response
    callResponse(response);

});

//Gets the last item from the url path
//console.log("Location: ("+lastItem+")");


/*
var jsonArray = {
"defaultTheme":"Health",
"Demographics": {
	"url"		: "http://public.tableausoftware.com/views/GastonDemographicsv3/AgeGender?:embed=yes&:tabs=no",
	"height"    : "960",
	"themeurl"	: "GastonDemographicsv3",
	"indicator"	: "AgeGender"
			},
"Economy":{
	"url"       : "http://public.tableausoftware.com/views/GastonEconomyv3/Income?:embed=yes",
	"height"    : "1145",
	"themeurl"	: "GastonEconomyv3",
	"indicator"	: "Income"
			},
"Health": {
	"url"       : "http://public.tableausoftware.com/views/GastonHealthv3/Mortality?:embed=y",
	"height"    : "995",
	"themeurl"	: "GastonHealthv3",
	"indicator"	: "Mortality"
			}
};
*/

var protectedTopics=new Array("social-well-being", "and", "crisis-housing-and-stability");

function callResponse(jsonArray){
		var vTheme = '';
		var vIndicator = '';

		//OK Laura had me change this variable name at the last minut

		if($.QueryString["topic"]){

			vQStringTopic = ($.QueryString["topic"]);

			//Clean up the string
			found = $.inArray(vQStringTopic, protectedTopics) > -1;

			if(found === false){

				vReplacedTopic = replaceAll("-", " ", vQStringTopic)
				//console.log("1: "+vReplacedTopic);
				var vTheme = eachWord(vReplacedTopic);
			}else{

				if(vQStringTopic == "social-well-being"){
					var vTheme = "Social Well-Being";
				}else if (vQStringTopic == "crisis-housing-and-stability"){
					var vTheme = "Crisis, Housing, and Stability";
				}else{
					var vTheme = eachWord(vQStringTopic);
				}
			}


			//console.log("Theme: "+vTheme);
		}

		if($.QueryString["indicator"]){

			vQStringIndicator = ($.QueryString["indicator"]).replace("-"," ");
			var vIndicator = eachWord(vQStringIndicator);
			 //RemoveSpaces

			//console.log("Indicator: "+vIndicator);
		}


		if((vTheme != '') && (vIndicator != '')){
			var vThemeURL = jsonArray[vTheme].themeurl;
			var vURL = jsonArray[vTheme].url;
			var vHeight = jsonArray[vTheme].height;

			$('#vizFrame').loadTableau({
			    url        : vURL,
			    height     : vHeight,
			    indicator  : vIndicator
			});
		}else if (vTheme != ''){

			var vThemeURL = jsonArray[vTheme].themeurl;
			var vURL = jsonArray[vTheme].url;
			var vHeight = jsonArray[vTheme].height;

			$('#vizFrame').loadTableau({
			    url        : vURL,
			    height     : vHeight

			});

		}else {
			/*
			for (i in jsonArray)
			{
			  //console.log(jsonArray[i].defaultitem);

			  if (jsonArray[i].defaultitem == true){
			  	console.log(jsonArray[i]);
			  }

			}*/

			var vTheme = jsonArray['defaultTheme'];

			var vThemeURL = jsonArray[vTheme].themeurl;
			var vURL = jsonArray[vTheme].url;
			var vHeight = jsonArray[vTheme].height;

			// Because every Theme doesn't have a description
			if (typeof jsonArray[vTheme].description != 'undefined') {
			  addInfoBox(jsonArray[vTheme].description);
			}


			$('#vizFrame').loadTableau({
			    url        : vURL,
			    height     : vHeight
			});


		}


		var s = $("<ul class='dropdown-menu'>");

		// Dynamically create buttons //
		$.each(jsonArray, function(key, value) {

		   var btnTheme = key;
		   
		   if(btnTheme == vTheme){
		   	$(".btn-data").text(btnTheme).append(' <span class=caret></span>');	
		   }

		   	if(btnTheme != "defaultTheme"){	   	
			   	var li = $('<li/>').appendTo(s);
			   	var aaa = $('<a/>')
			   	    .attr('value', btnTheme)
			   	    .text(btnTheme)
		   	    	.appendTo(li);		   	    
		   	}    

		});

		$('.btn-data').after(s);
		//s.wrap( "<div class='styled'></div>" );

		////////////////////////////////////////
		// Create button click action to load chart
		$(".dropdown-menu").on('click', 'li a', function(e){
			
			 
			
			//console.log($(this).attr("value"));
			btnThemeValue = $(this).text();
			
			
			
			$(".btn-data").text("Please wait...");
			
			//btnThemeValue = this.value; //$(this).attr("value");			
			//console.log("Dropdown selection: "+btnThemeValue);

			//var cur = jsonArray[btnThemeValue];
			//console.log(cur);

			/*$.each( jsonArray, function(i,val) {

			 	var test = this[propertyName];

			});*/
			/*function getValues(item){
				$.each(jsonArray, function( key, value ) {
				  if (key === btnThemeValue) {
				    $.each(this, function(key, value) {
				         if(key == item){
				         	return value;
				         }
				    });
				  }//endif

				});
			}

			var themeid = getValues("themeurl");
			console.log(themeid);*/

			var vThemeURL = jsonArray[btnThemeValue].themeurl;
			var vURL = jsonArray[btnThemeValue].url;
			var vHeight = jsonArray[btnThemeValue].height;

			// Because every Theme doesn't have a description
			if (typeof jsonArray[btnThemeValue].description != 'undefined') {
			   addInfoBox(jsonArray[btnThemeValue].description);
			}

			//updateQueryStringParameter(uri, theme, btnThemeValue)

			$('#vizFrame').loadTableau({
			    url        : vURL,
			    height     : vHeight
			});
			e.preventDefault();

			var uri = "http://example.com/Test.html#HashValue";
			uri = updateQueryStringParameter(uri, "theme", btnThemeValue);
			
			
			
			
			setTimeout(function(){
			  $(".btn-data").text(btnThemeValue).append(' <span class=caret></span>');
			}, 4500);

		});


}


/**
 *  Get values based on the theme selected
 */
 
/*
function getValues(parentValue, childValue) {
 for (var i = 0, len = jsonArray.length; i < len; i++) {

        if (jsonArray[i].theme === parentValue){

                return jsonArray[i][childValue]; //Variable in string


            } //return jsonArray[i].childValue; // Return as soon as the object is found

    }
    return null; // The object was not found
}
*/






// Capitalize the first letter
function addInfoBox(data) {
    var vDescription = data;
    //console.log("line276: "+vDescription);
    $('#slidingDiv').remove();
    $('.show_hide').remove();


    $("#tableau-box").before("<div id=\"slidingDiv\">contents</div><div class=\"show_hide\">more information about this topic</div>");
    $("#slidingDiv").text(vDescription);

    $("#slidingDiv").hide();

    $('.show_hide').click(function( e ){
        var SH = this.SH^=1; // "Simple toggler"
        $(this).text(SH?'Hide':'more information about this topic')//Hide:Show

               .prev("#slidingDiv").slideToggle();
    });

    $("#slidingDiv").text(vDescription);
}


function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function eachWord(str){
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

function toTitleCase(str){
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

function replaceAll(find, replace, str) {
  return str.replace(new RegExp(escapeRegExp(find), 'g'), replace);
}

function escapeRegExp(string) {
    return string.replace(/([.*+?^=!:${}()|\[\]\/\\])/g, "\\$1");
}
/**
 * Update the querystring parameters so users can share links to specific charts
 */
function updateQueryStringParameter(uri, key, value) {
  var re = new RegExp("([?|&])" + key + "=.*?(&|$)", "i");
  separator = uri.indexOf('?') !== -1 ? "&" : "?";
  if (uri.match(re)) {
    return uri.replace(re, '$1' + key + "=" + value + '$2');
  }
  else {
    return uri + separator + key + "=" + value;
  }
}


////////////////////////////////////////
// END
////////////////////////////////////////
});
