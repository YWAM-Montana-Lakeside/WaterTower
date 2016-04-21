jQuery(document).ready(function() {
	
	//Get all H2 Headings and store content in headers variable
	//Also add an ID to each of the H2 headings so that each bookmark
	//functions properly when clicked
	var headers = [];
	jQuery(".entry h2").each(function(i, val){
		
        if (!jQuery(this).is(':empty')){
            var ID = jQuery(this).text().replace(/[^a-z0-9\s]/gi, '').replace(/\ /g, '-').toLowerCase();
		    headers.push(jQuery(this).text());
		    jQuery(this).attr('id', ID);
            jQuery(this).attr('data-magellan-destination', ID);
        }
	});
	
	//Display list of all H2 Headings
	if (headers.length > 1) {
		jQuery(headers).each(function(i, val) {
			var slug = val.replace(/[^a-z0-9\s]/gi, '').replace(/\ /g, '-').toLowerCase();
			
			jQuery('.side-nav-by-heading').append(
				'<dd data-magellan-arrival="' + slug + '"><a href="#' + slug + '">' + val + '</dd>'
			);
		});
        
        if (window.location.pathname.match(/\/programs/) || $('body').hasClass('single-program')) {
            jQuery('.side-nav-by-heading').append(
                '<dd class="apply-button"><a href="http://apply.ywammontana.org">Apply Online</a></dd>'
            );
        }
		
		// Create Back to Top Button
		jQuery('.side-nav-by-heading').append(
			'<dd class="back-to-top"><a>Back To Top<i class="fa fa-angle-double-up"></i></dd>'
		);
		
	} else {
		jQuery('.widget_page_directory_widget').css('display', 'none');
	}
	
});


// Animate Auto Function
jQuery.fn.animateAuto = function(prop, speed, callback){
	var elem, height, width;
	return this.each(function(i, el){
		el = jQuery(el), elem = el.clone().css({"height":"auto","width":"auto"}).appendTo(el.parent());
		height = elem.css("height"),
		width = elem.css("width"),
		elem.remove();
		
		if(prop === "height")
			el.animate({"height":height}, speed, callback);
		else if(prop === "width")
			el.animate({"width":width}, speed, callback);  
		else if(prop === "both")
			el.animate({"width":width,"height":height}, speed, callback);
	});  
}



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
Chart.defaults.global.responsive = true;

// Scroll To Top
$(document).ready(function(){
	$('.back-to-top').click(function() {
	    $('html, body').animate({ scrollTop: 0 }, 500);
	});
});


// Add Tweet Button to BlockQuotes
$('.entry-content blockquote').each(function() {
    
    // Define what is in the blockquote
    var blockquoteContent = $('p', this).html().toLowerCase();
    var articleLink = $('.entry-content').attr('data-shortlink');
    
    $(this).append('<a class="tweet-quote" href="http://twitter.com/home/?status=' + blockquoteContent + ' ' + articleLink + '"><i class="fa fa-twitter"></i> Tweet This</a>');
});

// Turn Apply Button Blue
$(document).ready(function(){
    $(".top-bar-section ul li a:contains('Apply Now')").css( "cssText", "background: #5D9ECB !important");
    $(".top-bar-section ul li a:contains('Apply Now')").css( "color", "white");
});

// Get Crazy Script
$('.get-crazy-button').click(function() {
	$('body').toggleClass('get-crazy');
});