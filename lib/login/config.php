<?php

// config simple-php-login


if (version_compare(PHP_VERSION, '5.3.7', '<')) {
	_define('LAI_CAN_LOGIN',FALSE);
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
	// if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
	// (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
	_require_once(ABSPATH_THIRD_PARTY.DS."simple-php-login".DS."libraries".DS."password_compatibility_library.php");
	_define('LAI_CAN_LOGIN',$config->enabled,FALSE);
} else {
	_define('LAI_CAN_LOGIN',$config->enabled,FALSE);
}

if(!LAI_CAN_LOGIN){
	return;
}

// [comeback] make login optional



/**
 * Configuration file for: Database Connection
 * This is the place where your database login constants are saved
 * 
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 */
/** database host, usually it's "127.0.0.1" or "localhost", some servers also need port info, like "127.0.0.1:8080" */
define("DB_HOST", $config->db->host);
/** name of the database. please note: database and database table are not the same thing! */
define("DB_NAME", $config->db->name);
/** user for your database. the user needs to have rights for SELECT, UPDATE, DELETE and INSERT.
/** By the way, it's bad style to use "root", but for development it will work */
define("DB_USER", $config->db->user);
/** The password of the above user */
define("DB_PASS", $config->db->pass);

/**
 * Configuration for: Cookies
 * Please note: The COOKIE_DOMAIN needs the domain where your app is, 
 * in a format like this: .mydomain.com
 * Note the . in front of the domain. No www, no http, no slash here!
 * For local development .127.0.0.1 or .localhost is fine, but when deploying you should
 * change this to your real domain, like '.mydomain.com' ! The leading dot makes the cookie available for
 * subdomains too.
 * @see http://stackoverflow.com/q/9618217/1114320
 * @see php.net/manual/en/function.setcookie.php
 */
define('COOKIE_RUNTIME', $config->cookie->runtime); // 1209600 seconds = 2 weeks
define('COOKIE_DOMAIN', $config->cookie->domain); // the domain where the cookie is valid for, like '.mydomain.com'
define('COOKIE_SECRET_KEY', $config->cookie->secret); // use to salt cookie content and when changed, can invalidate all databases users cookies

/**
 * Configuration for: Email server credentials
 * 
 * Here you can define how you want to send emails.
 * If you have successfully set up a mail server on your linux server and you know
 * what you do, then you can skip this section. Otherwise please set EMAIL_USE_SMTP to true
 * and fill in your SMTP provider account data.
 * 
 * An example setup for using gmail.com [Google Mail] as email sending service, 
 * works perfectly in August 2013. Change the "xxx" to your needs.
 * Please note that there are several issues with gmail, like gmail will block your server
 * for "spam" reasons or you'll have a daily sending limit. See the readme.md for more info.
 *
 * define("EMAIL_USE_SMTP", true);
 * define("EMAIL_SMTP_HOST", 'ssl://smtp.gmail.com');
 * define("EMAIL_SMTP_AUTH", true);
 * define("EMAIL_SMTP_USERNAME", 'xxxxxxxxxx@gmail.com');
 * define("EMAIL_SMTP_PASSWORD", 'xxxxxxxxxxxxxxxxxxxx');
 * define("EMAIL_SMTP_PORT", 465);
 * define("EMAIL_SMTP_ENCRYPTION", 'ssl');  
 * 
 * It's really recommended to use SMTP!
 * 
 */
define("EMAIL_USE_SMTP", $config->email->use_smtp);
define("EMAIL_SMTP_HOST", $config->email->smtp->host);
define("EMAIL_SMTP_AUTH", $config->email->smtp->auth); // leave this true until your SMTP can be used without login
define("EMAIL_SMTP_USERNAME", $config->email->smtp->user);
define("EMAIL_SMTP_PASSWORD", $config->email->smtp->pass);
define("EMAIL_SMTP_PORT", $config->email->smtp->port);
define("EMAIL_SMTP_ENCRYPTION", $config->email->smtp->encryption);

/**
 * Configuration file for: password reset email data
 * This is the place where your constants are saved
 * 
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 */

/** absolute URL to register.php, necessary for email password reset links */
define("EMAIL_PASSWORDRESET_URL", $config->email->password_reset->url);
define("EMAIL_PASSWORDRESET_FROM", $config->email->password_reset->from);
define("EMAIL_PASSWORDRESET_FROM_NAME", $config->email->password_reset->from_name);
define("EMAIL_PASSWORDRESET_SUBJECT", $config->email->password_reset->subject);
define("EMAIL_PASSWORDRESET_CONTENT", $config->email->password_reset->body);

/**
 * Configuration file for: verification email data
 * This is the place where your constants are saved
 * 
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 */

/** absolute URL to register.php, necessary for email verification links */
define("EMAIL_VERIFICATION_URL", $config->email->email_verify->url);
define("EMAIL_VERIFICATION_FROM", $config->email->email_verify->from);
define("EMAIL_VERIFICATION_FROM_NAME", $config->email->email_verify->from_name);
define("EMAIL_VERIFICATION_SUBJECT", $config->email->email_verify->subject);
define("EMAIL_VERIFICATION_CONTENT", $config->email->email_verify->body);

/**
 * Configuration file for: Hashing strength
 * This is the place where you define the strength of your password hashing/salting
 * 
 * To make password encryption very safe and future-proof, the PHP 5.5 hashing/salting functions
 * come with a clever so called COST FACTOR. This number defines the base-2 logarithm of the rounds of hashing,
 * something like 2^12 if your cost factor is 12. By the way, 2^12 would be 4096 rounds of hashing, doubling the
 * round with each increase of the cost factor and therefore doubling the CPU power it needs.
 * Currently, in 2013, the developers of this functions have chosen a cost factor of 10, which fits most standard
 * server setups. When time goes by and server power becomes much more powerful, it might be useful to increase
 * the cost factor, to make the password hashing one step more secure. Have a look here
 * (@see https://github.com/panique/php-login/wiki/Which-hashing-&-salting-algorithm-should-be-used-%3F)
 * in the BLOWFISH benchmark table to get an idea how this factor behaves. For most people this is irrelevant,
 * but after some years this might be very very useful to keep the encryption of your database up to date.
 * 
 * Remember: Every time a user registers or tries to log in (!) this calculation will be done.
 * Don't change this if you don't know what you do.
 * 
 * To get more information about the best cost factor please have a look here
 * @see http://stackoverflow.com/q/4443476/1114320
 * 
 * Those constants will be used in the login and the registration class.
 * 
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 */

// the hash cost factor, PHP's internal default is 10. You can leave this line commented out until you need
// another factor then 10.
//define("HASH_COST_FACTOR", "10");

if(isset($_GET['register']) || isset($_GET['verify'])){
	// include the PHPMailer library
	_require_once(ABSPATH_THIRD_PARTY.DS."simple-php-login".DS."libraries".DS."PHPMailer.php");
	
	//load the registration class
	_require_once(ABSPATH_THIRD_PARTY.DS."simple-php-login".DS."classes".DS."Registration.php");
	
	$_lai->register = new Registration();
} else {
	// load the login class
	_require_once(ABSPATH_THIRD_PARTY.DS."simple-php-login".DS."classes".DS."Login.php");
	
	$_lai->login    = new Login();
}








