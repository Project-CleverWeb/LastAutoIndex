$(document).ready(function() {
	// Semantic UI inits
	$('.ui.accordion').accordion();
	$('.ui.dropdown').dropdown({
		on: 'hover'
	});
	$('.ui.checkbox').checkbox();
	$('.ui.modal').modal();
	$('.ui.popup').popup();
	$('.ui.rating').rating();
	$('.shape').shape();
	$('.ui.sidebar').sidebar();
	
	$('.message .close')
		.on('click', function() {
			$(this)
				.closest('.message')
				.transition('fade')
			;
		})
	;
	
	$('table#directory-index').tablesort();
	
	// Write on keyup event of keyword input element
	$('#directory-index-filter-container').css({'display':'none'});
	$("input#directory-index-filter").keyup(function(){
		_this = this;
		// Show only matching TR, hide rest of them
		$.each($("table#directory-index tbody").find("tr"), function() {
			console.log($(this).text());
			if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1) {
				$(this).hide();
			} else {
				$(this).show();
			}
		});
	});
	
	
	// don't show invalid images
	$("img").error(function () { 
		$(this).css({visibility:"hidden"}); // reserve area if dimensions are set
		// $(this).css({display:"none"}); // never reserve area
	});
	
	// Syntax Highlighter
	hljs.configure({tabReplace: '\t'}); // Tab size can be controlled in most browsers
	$('pre code').each(function(i, e) {hljs.highlightBlock(e)});
});
