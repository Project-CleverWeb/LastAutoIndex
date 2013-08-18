<?php


class extensions{
	
	
	public function __construct(){
		
		
		$this->init();
	}
	
	private function init(){
		
	}
	
	
	public function config($options){
		
	}
	
	public function get_filetype($ext){
		// check known extensions
		
		// just return the input until done
		return $ext;
	}
	
	/**
	 * This function acts like a database for file extensions
	 * 
	 * This is a Work In Progress
	 * 
	 * information gathered from:
	 *   http://en.wikipedia.org/wiki/List_of_file_formats
	 * 
	 * Many filetypes have been excluded because geting the info is boring =/
	 */
	private function db($action){
		
		$db = array(
			/**
			 * Get the extensions datatype
			 */
			'ext_type' = array(
				
				// code
				'html'     => 'code',
				'php'     => 'code',
				'css'     => 'code',
				'js'     => 'code',
				'xml'     => 'code',
				''     => '',
				''     => '',
				''     => '',
				
				// archive
				'zip'     => 'archive',
				'tar'     => 'archive',
				'gz'     => 'archive',
				'z7'     => 'archive',
				''     => '',
				''     => '',
				''     => '',
				
				// office doc
				'doc'     => 'document',
				'xls'     => 'document',
				''     => '',
				''     => '',
				''     => '',
				
				// image
				'jpg'     => 'image',
				'jpeg'     => 'image',
				'png'     => 'image',
				'bmp'     => 'image',
				''     => '',
				''     => '',
				''     => '',
				
				// vector image
				'svg'     => 'vector',
				''     => '',
				''     => '',
				''     => '',
				
				// sound
				'mp3'     => 'sound',
				'm4a'     => 'sound',
				'acc'     => 'sound',
				''     => '',
				''     => '',
				''     => '',
				
				// video
				'mp4'     => 'video',
				'm4v'     => 'video',
				'mpeg'     => 'video',
				'flv'     => 'video',
				'avi'     => 'video',
				''     => '',
				''     => '',
				''     => '',
				
				// Adobe media
				'psd'     => 'adobe',
				''     => '',
				''     => '',
				''     => '',
				
				// other media
				'cad'     => 'oether_media',
				''     => '',
				''     => '',
				''     => '',
				
				// database
				'db'     => 'database',
				''     => '',
				''     => '',
				''     => '',
				
				// font
				'woff'     => 'font',
				'ttf'     => 'font',
				''     => '',
				''     => '',
				''     => '',
			),
			/**
			 * Get an extentions description
			 */
			'ext_desc' = array(
				
			),
			/**
			 * Get he extension's default mimetype
			 */
			'ext_mime' = array(
				
			),
		)
		
		
		
	} // end db()
	
}





