jQuery(document).ready(function() {
	
	//Get all H2 Headings and store content in headers variable
	//Also add an ID to each of the H2 headings so that each bookmark
	//functions properly when clicked
	var headers = Array();
	jQuery(".entry h2").each(function(i, val){
		var ID = jQuery(this).text().replace(/[^a-z0-9\s]/gi, '').replace(/\ /g, '-').toLowerCase();
		
		headers[i] = jQuery(this).text();
		jQuery(this).attr('id', ID);
	});
	
	//Display list of all H2 Headings
	if (headers.length > 1) {
		jQuery(headers).each(function(i, val) {
			var slug = val.replace(/[^a-z0-9\s]/gi, '').replace(/\ /g, '-').toLowerCase();
			
			jQuery('.side-nav-by-heading').append(
				'<dd data-magellan-arrival="' + slug + '"><a href="#' + slug + '">' + val + '</dd>'
			);
		});
		
		// Create Back to Top Button
		jQuery('.side-nav-by-heading').append(
			'<dd class="back-to-top"><a>Back To Top<i class="fa fa-angle-double-up"></i></dd>'
		);
		
	} else {
		jQuery('.widget_page_directory_widget').css('display', 'none');
	}
	
});

//ACTIVATE SEARCH FORM ON HEADER
$(document).ready(function() {
    $(".desktop-search-form-container").click(function () {
		if (!$(".desktop-search-form-container").hasClass("search-active")) {
			$(".desktop-search-form-container").toggleClass("search-active");
			$("#header-search").focus();
		}
	});
	
	$("#header-search").focusout(function() {
		var searchString = $("#header-search").val();

		if (jQuery.trim(searchString).length > 0) {
		} else {
			$(".desktop-search-form-container").toggleClass("search-active");
		}
	});
	
});

// Add Categories Class to Categories Widget
$(document).ready(function(){
    var container = $('li.cat-item').parents().get()[1];
    $(container).addClass('categories').promise().done(function(){
    	$('.categories h4').append("<i class='fa fa-caret-down'></i>");
    	$('.categories h4').prepend("<i class='fa fa-sort-amount-asc'></i>");
    });
    
});

// Add StickyKit Class to Activate Elements
$(window).load(function(){
	$(".stick-to-parent").stick_in_parent({offset_top: 70});
	$(".stick-to-parent-side-nav").stick_in_parent();
});

// Add FitText Class to Activate Elements
$(".fittext").fitText(1.0, {maxFontSize: '70px'});
$(".fittext-large").fitText(.65);

// Configure Chart.js
Chart.defaults.global.showTooltips = false;

// Scroll To Top
$(document).ready(function(){
	$('.back-to-top').click(function() {
	    $('html, body').animate({ scrollTop: 0 }, 500);
	});
});

