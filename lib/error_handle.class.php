<?php

/**
 * A standalone class to handle errors.
 * 
 * not everythinmg makes sense here (yet), this class was ported from a seperate
 * project that was using WordPress.
 * 
 * Supports logging to:
 *    Database
 *    Email
 *    File
 *    PHP Default
 */
class error_handle {
	
	
	// vars
	private $error_array = array();
	private $mail_list   = array();
	private $send_info    = array();
	
	public function __construct(){
		$this->mail_list = array(
			'njordon@sgfmag.com'
		);
	}
	
	public function error_num(){
		return count($this->error_array);
	}
	
	public function add($str){
		// 
		// $this->error_array[] = $str;
		
		$done = 0;
		$i = 0;
		while ($done == 0) {
			$key = rand();
			if(isset($error_array[$key])==0 || $i>30){
				// if it actually takes 30 tries,you either messed up
				// this function, or your error count it likely in the
				// millions.
				$done = 1;
			}
			$i++;
		}
		if($i>10){
			$this->error_array[] = "Well, it took $i trys to get an error($key) in there, but she's in there.";
		}
		$this->error_array[$key] = $str;
		
		return $key;
	}
	
	public function remove($key){
		if(isset($this->error_array[$key])){
			unset($this->error_array[$key]);
			return TRUE;
		}
		return FALSE;
	}
	
	private function mail($message,$subject=FALSE){
		$tos = $this->mail_list;
		$to = '';
		$cc = '';
		foreach ($tos as $key => $value) {
			$email = str_replace(array(' ',"\r","\n"), '', $value);
			if($key==0){
				$to = $email;
			}else{
				$cc .= $email;
			}
		}
		
		$from = "no-reply@sg-f.info";
		if(!$subject){
			$subject = sprintf('[IMPORTANT] LastAutoIndex: '.$_GET['hook'].' has %1$s error(s)',$this->error_num());
		}
		
		return cw_mail($from,$to,$subject,$message,NULL,$cc);
	}
	
	private function db_insert($data){
		global $wpdb;
		$response = $wpdb->insert('LastAutoIndex_error',array('str' => base64_encode($data),'timestamp' => time()));
		if(!$response){
			// attempt email
			$emsg = sprintf(
'
FAILED TO WRITE TO DATABASE.<br />
<br />
There are also <b>%3$s error(s)</b> with the %2$s LastAutoIndex!<br />
<br />
<h3>Output:</h3><br />
<pre><code> %1$s </code></pre>
',
				print_r($data,1)
			);
			if(!$this->mail($emsg,"[IMPORTANT] LastAutoIndex ".$_GET['hook']." \"Database write failed\"")){
				// all else fails send to PHP's error log
				error_log("[IMPORTANT] LastAutoIndex ".$_GET['hook']." says: \"Email & Database write failed\" for `".__FUNCTION__."` in: ".__FILE__);
			}
			return FALSE;
		}
		return $response;
	}
	
	public function send(){
		if($this->error_num()==0){
			return TRUE; // nothing to process, so success
		}
		$this->send_info = array(
			'GET'    => $_GET,
			'POST'   => $_POST,
			'ERRORS' => $this->error_array
		);
		$data = print_r($this->send_info,1);
		// try DB
		$response = $this->db_insert($data);
		
		// Warn dev(s) about error
		$msg = sprintf(
'
There are <b>%3$s error(s)</b> with the %2$s LastAutoIndex!<br />
<br />
<h3>Output:</h3><br />
<pre><code> %1$s </code></pre>
',
			print_r($this->send_info,1),
			$_GET['hook'],
			$this->error_num()
		);
		$mail_response = $this->mail($msg);
		if(!$mail_response){
			// try db first, then log via php's default
			if($response){
				$emsg = $this->db_insert(print_r(array(
					'GET'      => $_GET,
					'POST'     => $_POST,
					'ERRORS'   => array( // keep structure in DB
						array(
							'msg'      => "LastAutoIndex ".$_GET['hook']." says: \"Email failed\" for `".__FUNCTION__."` in: ".__FILE__,
							'response' => $mail_response
						)
					)
				),1));
				if(!$emsg){
					$this->error_array = array(); // clear errors in case this is run 2+ times
					return error_log("[IMPORTANT] LastAutoIndex ".$_GET['hook']." says: \"Email & Database write failed\" for `".__FUNCTION__."` in: ".__FILE__);
				}
			}else{
				$this->error_array = array(); // clear errors in case this is run 2+ times
				return error_log("[IMPORTANT] LastAutoIndex ".$_GET['hook']." says: \"Email & Database write failed\" for `".__FUNCTION__."` in: ".__FILE__);
			}
			$this->error_array = array(); // clear errors in case this is run 2+ times
			return $emsg;
		}
		$this->error_array = array(); // clear errors in case this is run 2+ times
		return $response; // success
	}
	
	
}







