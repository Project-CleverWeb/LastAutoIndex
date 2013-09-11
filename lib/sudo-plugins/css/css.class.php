<?php

/**
 * "CSS" Plugin class
 * ----------------------
 * This class is meant just for use with themes.
 * 
 * In the "USAGE" section below, the output that
 * <body>s text would be white (#FFF), whereas if the
 * first php statement were missing, <body>'s text 
 * would be black (#000). Keep in mind that the input
 * with 'body-text' is just the namespace that the
 * value is stored under.
 * 
 * USAGE:
 *   index.php:
 *     
 *     <?php $_lai->css->color('body-text', '#FFF'); ?>
 *     <link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/style.css.php">
 *     
 *   style.css.php:
 *     
 *     <?php header("Content-type: text/css"); ?>
 *     body{
 *       color: <?php $_lai->css->print('#000', 'body-text', 'color') ?>
 *     }
 *     
 */
class css{
	
	/**
	 * Prints $this->get(); prints a specific property
	 * or $default if the property is not set
	 * 
	 * @param string $default  The value to be printed if the property is not set
	 * @param string $name     The namespace to get the value from
	 * @param string $prop     The property name
	 * @return VOID            Prints the value of $name[$prop], or $default
	 */
	public function print_property($default,$name,$prop){
		echo $this->get($default,$name,$prop);
	}
	
	/**
	 * Simple $this->mgr() interface, returns a specific
	 * property or $default if the property is not set
	 * 
	 * @param string $default  The value to return if the property is not set
	 * @param string $name     The namespace to get the value from
	 * @param string $prop     The property name
	 * @return string          Returns the value of $name[$prop], or $default
	 */
	public function get($default,$name,$prop){
		$prop = str_replace('-','_',$prop); // in case they use the css property name
		$response = $this->mgr('GET',
			array(
				'name' => (string) $name,
				'prop' => (string) $prop
			)
		);
		if($response){
			return $response;
		} else {
			return $default;
		}
	}
	
	/**
	 * Simple $this->mgr() interface, gets all the values
	 * set in a namespace and returns them as an array.
	 * If the namespace does not exist, returns FALSE.
	 * 
	 * @param  string $name  The name of the namespace to get
	 * @return mixed         All of the set values for a namespace in an array, or FALSE if not a namespace
	 */
	public function get_namespace($name){
		return $this->mgr('GET_NAMESPACE',
			array(
				'name' => (string) $name
			)
		);
	}
	
	/**
	 * Simple $this->mgr() interface, makes setting
	 * values easy
	 * 
	 * @param string $prop   The property name (also function name)
	 * @param string $name   The namespace to store the value under
	 * @param string $value  The value of the property
	 * @return bool          TRUE on success, FALSE otherwise
	 */
	protected function set_helper($prop,$name,$value){
		$prop = str_replace('-','_',$prop); // in case they use the css property name
		return $this->mgr('set',array(
			'prop'  => (string) $prop,
			'name'  => (string) $name,
			'value' => (string) $value
		));
	}
	
	/**
	 * Database manager for this class
	 * 
	 * @param  sting $action   The action to do
	 * @param  array $options  The options for the action
	 * @return mixed           The response of the action
	 */
	protected function mgr($action,$options=FALSE){
		static $db;
		if(isset($db)==0){
			$db = array();
		}
		
		$action = strtoupper((string) $action);
		
		if ($action == 'GET_DB') {
			return $db;
		} elseif($action == 'SET') {
			$db[$options['name']][$options['prop']] = $options['value'];
			return TRUE;
		} elseif($action == 'GET') {
			if(isset($db[$options['name']][$options['prop']]) && empty($db[$options['name']][$options['prop']]) == 0) {
				return $db[$options['name']][$options['prop']];
			}
		} elseif($action == 'GET_NAMESPACE') {
			if(isset($db[$options['name']])) {
				return $db[$options['name']];
			}
		}
		
		// default response
		return FALSE;
	}
	
	/**
	 * Property Functions
	 * -------------------
	 * These functions are just wrappers to set_helper().
	 * The imprtant thing to notice is that that the
	 * function name is always used as the property name
	 * whenever it is stored in mgr().
	 * 
	 * Function names are identical to property names
	 * with the exception that dashes are replaced with
	 * underscores.
	 * 
	 * $name is the namespace to store the value under
	 * 
	 * $value is what you want the property set to
	 * 
	 * $return TRUE on success, FALSE otherwise
	 */
	
	public function azimuth($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function background_attachment($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function background_color($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function background_image($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function background_position($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function background_repeat($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function background($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_collapse($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_color($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_spacing($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_style($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_top($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_right($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_bottom($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_left($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_top_color($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_right_color($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_bottom_color($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_left_color($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_top_style($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_right_style($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_bottom_style($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_left_style($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_top_width($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_right_width($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_bottom_width($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_left_width($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border_width($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function border($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function bottom($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function caption_side($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function clear($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function clip($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function color($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function content($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function counter_increment($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function counter_reset($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function cue_after($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function cue_before($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function cue($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function cursor($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function direction($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function display($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function elevation($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function empty_cells($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function float($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function font_family($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function font_size($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function font_style($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function font_variant($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function font_weight($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function font($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function height($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function left($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function letter_spacing($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function line_height($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function list_style_image($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function list_style_position($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function list_style_type($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function list_style($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function margin_right($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function margin_left($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function margin_top($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function margin_bottom($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function margin($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function max_height($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function max_width($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function min_height($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function min_width($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function orphans($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function outline_color($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function outline_style($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function outline_width($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function outline($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function overflow($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function padding_top($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function padding_right($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function padding_bottom($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function padding_left($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function padding($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function page_break_after($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function page_break_before($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function page_break_inside($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function pause_after($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function pause_before($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function pause($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function pitch_range($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function pitch($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function play_during($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function position($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function quotes($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function richness($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function right($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function speak_header($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function speak_numeral($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function speak_punctuation($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function speak($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function speech_rate($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function stress($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function table_layout($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function text_align($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function text_decoration($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function text_indent($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function text_transform($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function top($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function unicode_bidi($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function vertical_align($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function visibility($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function voice_family($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function volume($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function white_space($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function widows($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function width($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function word_spacing($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	public function z_index($name, $value){ return $this->set_helper(__FUNCTION__,$name,$value); }
	
}


