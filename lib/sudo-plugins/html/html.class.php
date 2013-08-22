<?php

class html{
	
	public
	
	public function add_to_head($str){
		// This will add elements to be added to the <head>
		
		// return $key
	}
	
	public function remove_from_head($key){
		// This will remove elements to be added to the <head>
		
		// return bool
	}
	
	public function add_to_header($str){
		// This will add elements to be added to the header
		
		// return $key
	}
	
	public function remove_from_header($key){
		// This will remove elements to be added to the header
		
		// return bool
	}
	
	public function add_to_footer($str){
		// This will add elements to be added to the footer
		
		// return $key
	}
	
	public function remove_from_footer($key){
		// This will remove elements to be added to the footer
		
		// return bool
	}
	
	public function import_html($file_path){
		// this add a html/php file to be printed within the theme's index file
		
		// return $key
	}
	
	public function import_css($file_path){
		// this add a css file to be printed within the theme's index file
		
		// return $key
	}
	
	public function import_js($file_path){
		// this add a js file to be printed within the theme's index file
		
		// return $key
	}
	
	private function inport_helper($str){
		
		// return str
	}
	
	public function remove_inport($key){
		// remove $key from $imports
		
		// return bool
	}
	
	public function add_onload($str){
		// the will add to the body[onload] attribute
		
		// $key
	}
	
	public function remove_onload($key){
		// the will remove $key from the body[onload] attribute
		
		// return bool
	}
	
	public function print_head(){
		// theme use only: prints to <head>
		
		// return VOID
	}
	
	public function print_header(){
		// theme use only: prints to header
		
		// return VOID
	}
	
	public function print_footer(){
		// theme use only: prints to footer
		
		// return VOID
	}
	
	public function print_html(){
		// theme use only: prints html snippets
		
		// return VOID
	}
	
	public function print_css(){
		// theme use only: prints css files here
		
		// return VOID
	}
	
	public function print_js(){
		// theme use only: prints js files here
		
		// return VOID
	}
	
	public function print_onload(){
		// theme use only: prints body[onload] contents
		
		// return VOID
	}
	
	
	
}