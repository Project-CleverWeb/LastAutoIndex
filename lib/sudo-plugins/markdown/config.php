<?php

// markdown config file

_require_once(__DIR__.'/../../3rd-party/markdown/markdown_extended.php');
if($_lai->plugin->register('markdown',FALSE)){
	class markdown{
		public function read($md){
			return MarkdownExtended($md);
		}
	}
	$_lai->markdown = new markdown;
}
