
		.markdown-wrapper{
			width:100%;
			min-width: 300px;
			margin:45px 0;
		}
		
		.markdown-content{
			width:90%;
			padding: 3em;
			border-radius: 0.7em;
			margin: 0 auto;
			border: solid 2.5px #aaa;
			font-size: 0.92em;
			
		}
		
		.markdown-content p{
			display: block;
			width: 100%;
		}
		
		.markdown-content ul, .markdown-content ol{
			margin-left: 10px;
		}
		
		.prettyprinted{
			padding:5em;
		}
		
		.markdown-code{
			background-color: #fafafa;
			border:solid 1px #ccc;
			border-radius: 3.5px;
			font-size: 0.84em;
			padding: 0.25em 5px;
			line-height: 1.4em !important;
		}
		
		.markdown-pre code.markdown-code{
			background: none;
			border:none;
			border-radius: none;
			font-size: 0.93em;
			padding: 0;
		}
		
		.markdown-pre{
			background-color: #fcfcfc;
			min-height: 4.1em;
			margin:2.2em auto;
			padding: 0.8em 0.8em 0.8em 1.1875em;
			border: 2.5px solid #eaeaea;
			border-radius:6px;
			counter-increment: codeBlocks;
		}
		
		.markdown-pre code.markdown-code:before,
		.markdown-pre code.markdown-code[class*="language-"]:before{
			content: "Code"; /* default value */
			display: block;
			float:right;
			text-align: center;
			color:#222;
			text-align:center;
			/*font-weight:bold;*/
			padding:0.15em 0.35em;
			border: 1px solid rgba(0,0,0,0.1);
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			background: rgba(0,0,0,0.15);
			text-decoration: none;
		}
		
		.markdown-pre code.markdown-code[class*="language-php"]:before,
		.markdown-pre code.markdown-code[class*="language-Php"]:before,
		.markdown-pre code.markdown-code[class*="language-PHP"]:before{
			content:"PHP";
			background: #ebf1f6;
			background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMTAwJSI+CiAgICA8c3RvcCBvZmZzZXQ9IjAlIiBzdG9wLWNvbG9yPSIjZWJmMWY2IiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iNTAlIiBzdG9wLWNvbG9yPSIjYWJkM2VlIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iNTElIiBzdG9wLWNvbG9yPSIjODljM2ViIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2Q1ZWJmYiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
			background: -moz-linear-gradient(-45deg,  #ebf1f6 0%, #abd3ee 50%, #89c3eb 51%, #d5ebfb 100%);
			background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,#ebf1f6), color-stop(50%,#abd3ee), color-stop(51%,#89c3eb), color-stop(100%,#d5ebfb));
			background: -webkit-linear-gradient(-45deg,  #ebf1f6 0%,#abd3ee 50%,#89c3eb 51%,#d5ebfb 100%);
			background: -o-linear-gradient(-45deg,  #ebf1f6 0%,#abd3ee 50%,#89c3eb 51%,#d5ebfb 100%);
			background: -ms-linear-gradient(-45deg,  #ebf1f6 0%,#abd3ee 50%,#89c3eb 51%,#d5ebfb 100%);
			background: linear-gradient(135deg,  #ebf1f6 0%,#abd3ee 50%,#89c3eb 51%,#d5ebfb 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ebf1f6', endColorstr='#d5ebfb',GradientType=1 );
		}
		
		.markdown-pre code.markdown-code[class*="language-ruby"]:before,
		.markdown-pre code.markdown-code[class*="language-Ruby"]:before,
		.markdown-pre code.markdown-code[class*="language-RUBY"]:before{
			content:"Ruby";
			background: #ffd8d8;
			background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMTAwJSI+CiAgICA8c3RvcCBvZmZzZXQ9IjIlIiBzdG9wLWNvbG9yPSIjZmZkOGQ4IiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iMzElIiBzdG9wLWNvbG9yPSIjZmY5MzkzIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iNTAlIiBzdG9wLWNvbG9yPSIjZjE2ZjVjIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iNTElIiBzdG9wLWNvbG9yPSIjZjYyOTBjIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iNjMlIiBzdG9wLWNvbG9yPSIjZjAyZjE3IiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2U1OTU4ZSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
			background: -moz-linear-gradient(-45deg,  #ffd8d8 2%, #ff9393 31%, #f16f5c 50%, #f6290c 51%, #f02f17 63%, #e5958e 100%);
			background: -webkit-gradient(linear, left top, right bottom, color-stop(2%,#ffd8d8), color-stop(31%,#ff9393), color-stop(50%,#f16f5c), color-stop(51%,#f6290c), color-stop(63%,#f02f17), color-stop(100%,#e5958e));
			background: -webkit-linear-gradient(-45deg,  #ffd8d8 2%,#ff9393 31%,#f16f5c 50%,#f6290c 51%,#f02f17 63%,#e5958e 100%);
			background: -o-linear-gradient(-45deg,  #ffd8d8 2%,#ff9393 31%,#f16f5c 50%,#f6290c 51%,#f02f17 63%,#e5958e 100%);
			background: -ms-linear-gradient(-45deg,  #ffd8d8 2%,#ff9393 31%,#f16f5c 50%,#f6290c 51%,#f02f17 63%,#e5958e 100%);
			background: linear-gradient(135deg,  #ffd8d8 2%,#ff9393 31%,#f16f5c 50%,#f6290c 51%,#f02f17 63%,#e5958e 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffd8d8', endColorstr='#e5958e',GradientType=1 );
		}
		
		.markdown-pre code.markdown-code[class*="language-python"]:before,
		.markdown-pre code.markdown-code[class*="language-Python"]:before,
		.markdown-pre code.markdown-code[class*="language-PYTHON"]:before{
			content:"Python";
			background: #f9f3e3;
			background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMTAwJSI+CiAgICA8c3RvcCBvZmZzZXQ9IjAlIiBzdG9wLWNvbG9yPSIjZjlmM2UzIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iNTAlIiBzdG9wLWNvbG9yPSIjZjlkZDk1IiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iNTElIiBzdG9wLWNvbG9yPSIjZjdiZjMzIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iNjclIiBzdG9wLWNvbG9yPSIjZjdiZjMzIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2Y5ZjNlMyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
			background: -moz-linear-gradient(-45deg,  #f9f3e3 0%, #f9dd95 50%, #f7bf33 51%, #f7bf33 67%, #f9f3e3 100%);
			background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,#f9f3e3), color-stop(50%,#f9dd95), color-stop(51%,#f7bf33), color-stop(67%,#f7bf33), color-stop(100%,#f9f3e3));
			background: -webkit-linear-gradient(-45deg,  #f9f3e3 0%,#f9dd95 50%,#f7bf33 51%,#f7bf33 67%,#f9f3e3 100%);
			background: -o-linear-gradient(-45deg,  #f9f3e3 0%,#f9dd95 50%,#f7bf33 51%,#f7bf33 67%,#f9f3e3 100%);
			background: -ms-linear-gradient(-45deg,  #f9f3e3 0%,#f9dd95 50%,#f7bf33 51%,#f7bf33 67%,#f9f3e3 100%);
			background: linear-gradient(135deg,  #f9f3e3 0%,#f9dd95 50%,#f7bf33 51%,#f7bf33 67%,#f9f3e3 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f9f3e3', endColorstr='#f9f3e3',GradientType=1 );
		}
		
		.markdown-pre code.markdown-code[class*="language-sh"]:before,
		.markdown-pre code.markdown-code[class*="language-Sh"]:before,
		.markdown-pre code.markdown-code[class*="language-SH"]:before{
			content:"Shell";
		}
		
		.markdown-pre code.markdown-code[class*="language-html"]:before,
		.markdown-pre code.markdown-code[class*="language-HTML"]:before{
			content:"HTML";
			background: #f9e4c5;
			background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMTAwJSI+CiAgICA8c3RvcCBvZmZzZXQ9IjAlIiBzdG9wLWNvbG9yPSIjZjllNGM1IiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iNTAlIiBzdG9wLWNvbG9yPSIjZTJiNzljIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iNTElIiBzdG9wLWNvbG9yPSIjZTU5ZjVlIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iOTklIiBzdG9wLWNvbG9yPSIjZjllNGM1IiBzdG9wLW9wYWNpdHk9IjEiLz4KICA8L2xpbmVhckdyYWRpZW50PgogIDxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InVybCgjZ3JhZC11Y2dnLWdlbmVyYXRlZCkiIC8+Cjwvc3ZnPg==);
			background: -moz-linear-gradient(-45deg,  #f9e4c5 0%, #e2b79c 50%, #e59f5e 51%, #f9e4c5 99%);
			background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,#f9e4c5), color-stop(50%,#e2b79c), color-stop(51%,#e59f5e), color-stop(99%,#f9e4c5));
			background: -webkit-linear-gradient(-45deg,  #f9e4c5 0%,#e2b79c 50%,#e59f5e 51%,#f9e4c5 99%);
			background: -o-linear-gradient(-45deg,  #f9e4c5 0%,#e2b79c 50%,#e59f5e 51%,#f9e4c5 99%);
			background: -ms-linear-gradient(-45deg,  #f9e4c5 0%,#e2b79c 50%,#e59f5e 51%,#f9e4c5 99%);
			background: linear-gradient(135deg,  #f9e4c5 0%,#e2b79c 50%,#e59f5e 51%,#f9e4c5 99%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f9e4c5', endColorstr='#f9e4c5',GradientType=1 );
		}
		
		.markdown-pre code.markdown-code[class*="language-md"]:before,
		.markdown-pre code.markdown-code[class*="language-Markdown"]:before,
		.markdown-pre code.markdown-code[class*="language-markdown"]:before{
			content:"Markdown";
			background: #ede6ea;
			background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMTAwJSI+CiAgICA8c3RvcCBvZmZzZXQ9IjIlIiBzdG9wLWNvbG9yPSIjZWRlNmVhIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iNDklIiBzdG9wLWNvbG9yPSIjY2VhNWNiIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iNTAlIiBzdG9wLWNvbG9yPSIjYjU4ZGFiIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2RkYjVkMCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
			background: -moz-linear-gradient(-45deg,  #ede6ea 2%, #cea5cb 49%, #b58dab 50%, #ddb5d0 100%);
			background: -webkit-gradient(linear, left top, right bottom, color-stop(2%,#ede6ea), color-stop(49%,#cea5cb), color-stop(50%,#b58dab), color-stop(100%,#ddb5d0));
			background: -webkit-linear-gradient(-45deg,  #ede6ea 2%,#cea5cb 49%,#b58dab 50%,#ddb5d0 100%);
			background: -o-linear-gradient(-45deg,  #ede6ea 2%,#cea5cb 49%,#b58dab 50%,#ddb5d0 100%);
			background: -ms-linear-gradient(-45deg,  #ede6ea 2%,#cea5cb 49%,#b58dab 50%,#ddb5d0 100%);
			background: linear-gradient(135deg,  #ede6ea 2%,#cea5cb 49%,#b58dab 50%,#ddb5d0 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ede6ea', endColorstr='#ddb5d0',GradientType=1 );
		}
		
		.markdown-img{
			margin: 4px auto;
			display: block;
		}
		
		@media only screen and (max-width: 48em) {
			.markdown-content{
				width:98%;
				padding: 1em;
				border-radius: 0.7em;
				margin: 0 auto;
				font-size: 0.80em;
			}
		}
		
		