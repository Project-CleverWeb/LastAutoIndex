Mousetrap.bind(['command+up', 'ctrl+up'], function(e) {
	// font size ++
	resizeText(1);
	return false;
});

Mousetrap.bind(['command+down', 'ctrl+down'], function(e) {
	// font size --
	resizeText(-1);
	return false;
});

Mousetrap.bind(['command+left', 'ctrl+left'], function(e) {
	// up 1 dir
	window.location.href = "../";
	return false;
});

Mousetrap.bind(['shift+left'], function(e) {
	// up 2 dir
	window.location.href = "../../";
	return false;
});

Mousetrap.bind(['alt+left'], function(e) {
	// server root
	window.location.href = "/";
	return false;
});

Mousetrap.bind(['command+right', 'ctrl+right'], function(e) {
	// toggle search
	toggleSearch();
	return false;
});

Mousetrap.bind(['command+l', 'ctrl+l'], function(e) {
	// show login
	javacript: $('#login-modal').foundation('reveal', 'open');
	return false;
});

Mousetrap.bind(['alt+l'], function(e) {
	// logout
	window.location.href = "?logout";
	return false;
});

Mousetrap.bind(['alt+h r'], function(e) {
	// hide readme
	$('.readme').transition({ scale: 0 })
		.transition({display:'none'});
	return false;
});

Mousetrap.bind(['alt+s r'], function(e) {
	// hide readme
	$('.readme').transition({display:'block'});
	return false;
});

// konami code! (shortcut cheat-sheet)
Mousetrap.bind('up up down down left right left right b a', function() {
	javacript: $('#konami-code').foundation('reveal', 'open');
});