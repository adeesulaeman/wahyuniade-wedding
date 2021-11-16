<?php 
namespace Pusaka;

class Config {

	public static function app() {
		/*
		* application path folder
		*/
		$app['path'] 				= APPPATH . 'third_party/Pusaka/';

		/*
		* use for password hashing, encryption in application
		*/
		$app['encrypt_key'] 		= '4458f7e34830db92c8bd6205105ce156';
		$app['error_log'] 			= APPPATH . 'logs/';


		return $app;
	} // end static method

	public static function session() {

		$CI 						=& get_instance();

		/*
		* path folder
		*/
		$session['save_path']		= $CI->config->item('sess_save_path');

		/*
		* [ True | False ]
		*/
		$session['encrypt']			= True;
		
		return $session;
	} // end static method

	public static function upload() {

		$upload['upload_path'] 			= 'storage/';
		$upload['allowed_ext'] 			= 'gif|jpg|png';
		$upload['max_size'] 			= Library\Upload::getByte(1, 'MB');
		$upload['encrypt']				= True;
		$upload['remove_char']			= ['#'];

		return $upload;
	} // end static method

}