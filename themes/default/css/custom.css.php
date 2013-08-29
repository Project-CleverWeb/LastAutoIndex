<?php
header("Content-type: text/css");

 ?>

	@font-face {
		font-family: 'Droid Sans';
		font-style: normal;
		font-weight: 400;
		src: local('Droid Sans'), local('DroidSans'), url(<?php echo PATH_THEME; ?>/font/Droid_Sans/DroidSans.ttf) format('ttf');
	}
	@font-face {
		font-family: 'Droid Sans';
		font-style: normal;
		font-weight: 700;
		src: local('Droid Sans Bold'), local('DroidSans-Bold'), url(<?php echo PATH_THEME; ?>/font/Droid_Sans/DroidSans-Bold.ttf) format('ttf');
	}
	@font-face {
		font-family: 'Droid Sans Mono';
		font-style: normal;
		font-weight: 400;
		src: local('Droid Sans Mono'), local('DroidSansMono'), url(<?php echo PATH_THEME; ?>/font/Droid_Sans_Mono/DroidSansMono.ttf) format('ttf');
	}
	@font-face {
		font-family: 'Roboto';
		font-style: normal;
		font-weight: 300;
		src: local('Roboto Light'), local('Roboto-Light'), url(<?php echo PATH_THEME; ?>/font/Roboto/Roboto-Light.ttf) format('ttf');
	}
	@font-face {
		font-family: 'Roboto';
		font-style: normal;
		font-weight: 400;
		src: local('Roboto Regular'), local('Roboto-Regular'), url(<?php echo PATH_THEME; ?>/font/Roboto/Roboto-Regular.ttf) format('ttf');
	}
	@font-face {
		font-family: 'Roboto';
		font-style: normal;
		font-weight: 500;
		src: local('Roboto Medium'), local('Roboto-Medium'), url(<?php echo PATH_THEME; ?>/font/Roboto/Roboto-Medium.ttf) format('ttf');
	}
	@font-face {
		font-family: 'Roboto';
		font-style: normal;
		font-weight: 700;
		src: local('Roboto Bold'), local('Roboto-Bold'), url(<?php echo PATH_THEME; ?>/font/Roboto/Roboto-Bold.ttf) format('ttf');
	}
	body {
		font-family: "Droid Sans", sans-serif;
		font-weight: normal;
		font-style: normal;
		line-height: 1;
		padding-top:50px;
	}
	
	p{
		text-indent:10px;
	}
	
	h1, h2, h3, h4, h5, h6 {
	font-family: "Roboto", sans-serif;
	font-weight: 400;
	font-style: normal;
	color: #444;
	text-rendering: optimizeLegibility;
	margin-top: 0.2em;
	margin-bottom: 0.5em;
	line-height: 1.2125em;
	/*text-shadow: 2px 1px 2px rgba(150, 150, 150, 0.25);*/
}
	h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
		font-size: 60%;
		color: gray;
		line-height: 0; 
		text-shadow: 2px 1px 2px rgba(150, 150, 150, 0.25);
	}

h1 {
	font-size: 2.5em; }

h2 {
	font-size: 2.1em; }

h3 {
	font-size: 1.7em; }

h4 {
	font-size: 1.4em; }

h5 {
	font-size: 1.2em; }

h6 {
	font-size: 1em; }
	
	code {
	font-family: "Droid Sans Mono", Courier, monospace;
	font-weight: 400;
	color: inherit; }
	
	kbd {
	background-color: #ededed;
	border-color: #dbdbdb;
	color: #222222;
	border-style: solid;
	border-width: 1px;
	margin: 0;
	font-family: "Droid Sans Mono", "Courier", monospace;
	font-size: 0.875em;
	padding: 0.125em 0.25em 0;
	-webkit-border-radius: 3px;
	border-radius: 3px; }

a:hover,a:active{
	color:#ca0000;
}

table { 
	border-spacing: 0;
	/*border-collapse: collapse;*/
}

table tr td{
	word-break:break-all;
	border-right: solid 1px #ddd;
}

table tr td:last-child{
	border-right: none;
}

.dir-bar-button{
	padding: 4px 8px;
	border: 1px solid #aaa;
	color: #000;
	background: #fff;
	border-radius: 5px;
	margin:3px 2px;
	font-size: 0.8em;
	text-align: center;
	display: inline-block;
	-webkit-box-shadow: 1.5px 1.5px 3px rgba(40, 40, 40, 0.4);
	-moz-box-shadow:    1.5px 1.5px 3px rgba(40, 40, 40, 0.4);
	box-shadow:         1.5px 1.5px 3px rgba(40, 40, 40, 0.4);
}

.dir-items{
	font-size: 0.95em;
	border:solid #bbb 1.5px;
	border-left:solid #ccc 1.5px;
	border-top:none;
	border-bottom:none;
	margin-bottom:0;
}


.dir-items tr th{
	font-size: 1em;
}

.dir-items,.dir-bar{
	-webkit-box-shadow: 4px 4px 10px rgba(30, 30, 30, 0.25);
	-moz-box-shadow:    4px 4px 10px rgba(30, 30, 30, 0.25);
	box-shadow:         4px 4px 10px rgba(30, 30, 30, 0.25);
}

.info-bar{
	-webkit-box-shadow: 4px 4px 10px rgba(30, 30, 30, 0.25);
	-moz-box-shadow:    4px 4px 10px rgba(30, 30, 30, 0.25);
	box-shadow:         4px 4px 10px rgba(30, 30, 30, 0.25);
}


a.dir-bar-button:hover,a.dir-bar-button:active{
	background: #444;
	color:#fff;
}

.dir-up-button{
	/*font-weight: 700;*/
	font-family: "Droid Sans Mono", Sans;
}


.copyright{
	font-size: 0.8em;
	color: #888;
	text-align: right;
}

.copyright:after{
	content:"Proudly powered by LastAutoIndex";
	display:block;
	font-size: 0.92em;
}

.fa-icon{
	margin:0 0.25em;
	font-size:32px;
}

.fa-icon.small{
	font-size:16px;
}

.fa-icon.large{
	font-size:48px;
}

.fa-icon.emsmall{
	font-size:0.8em;
}

.fa-icon.same{
	font-size:inherit;
}

.fa-icon.emlarge{
	font-size:1.3em;
}


.dir-bar{
	width: 100%;
	padding: 10px 12px 8px 12px;
	border:solid #bbb 1.5px;
	border-left:solid #ccc 1.5px;
	border-top:solid #ccc 1.5px;
	border-radius: 8px 8px 0 0;
	background-image:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHdpZHRoPScxMCcgaGVpZ2h0PScyMCcgdmlld0JveD0nMCAwIDUgMTAnPgoJPHJlY3Qgd2lkdGg9JzExMCUnIHg9Jy01JScgeT0nLTUlJyBoZWlnaHQ9JzExMCUnIGZpbGw9JyNmZmZmZmYnLz4KCTxsaW5lIHgxPSctMicgeTE9JzEnIHgyPSc3JyB5Mj0nMTAnIHN0cm9rZT0nI2RkZGRkZCcgc3Ryb2tlLXdpZHRoPScwLjM2Jy8+Cgk8bGluZSB4MT0nLTInIHkxPSc2JyB4Mj0nNycgeTI9JzE1JyBzdHJva2U9JyNkZGRkZGQnIHN0cm9rZS13aWR0aD0nMC4zNicvPgoJPGxpbmUgeDE9Jy0yJyB5MT0nLTQnIHgyPSc3JyB5Mj0nNScgc3Ryb2tlPScjZGRkZGRkJyBzdHJva2Utd2lkdGg9JzAuMzYnLz4KPC9zdmc+');
}

.info-bar{
	font-size: 0.82em;
	width: 100%;
	background-color: #fff;
	color:#444;
	padding: 7px 12px;
	border:solid #bbb 1.5px;
	border-left:solid #ccc 1.5px;
	border-radius: 0 0 8px 8px;
}

.valign-middle{
	vertical-align:middle;
}

footer{
	padding:2em 0 30px 0;
}


pre {
	width: 90%;
	margin: 0 auto;
	font-size: 0.92em;
  white-space: pre-wrap;       /* css-3 */
  white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
  white-space: -pre-wrap;      /* Opera 4-6 */
  white-space: -o-pre-wrap;    /* Opera 7 */
  word-wrap: break-word;       /* Internet Explorer 5.5+ */
}







