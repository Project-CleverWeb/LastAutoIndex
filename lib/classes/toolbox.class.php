<?php

class toolbox {
	
	
	public function is_default_str($str){
		// test a string aganist common aliases of 'default'
		$str = strtolower($str);
		if (
			$str == 'auto' ||
			$str == 'automatic' ||
			$str == 'default' ||
			$str == 'null' ||
			$str == NULL
		) {
			return TRUE;
		}
		return FALSE;
	}
	
	
	
	
}





