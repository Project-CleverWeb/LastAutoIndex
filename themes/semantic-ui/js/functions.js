// (experimental)
function resizeText(multiplier) {
	if (document.body.style.fontSize == "") {
		document.body.style.fontSize = "15px";
	}
	document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier) + "px";
}

function toggleSearch() {
	if ($('#search').css('height') == '70px') {
		$('#search').transition({ height: '1px' });
	} else {
		$('#search').transition({ height: '70px' });
		document.getElementById('search-input').select();
	}
}