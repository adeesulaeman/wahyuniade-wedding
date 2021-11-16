<?php 
namespace Pusaka; 

class Log {

	public static function error($str) {

		/* Build Content */
		$content   = "<?php die(); ?>\r\n";
		$content  .= $str;


		$config['app']	= Config::app();
		$path 			= $config['app']['error_log'];

		$date 	= new \DateTime();
		$date->setTimezone(new \DateTimeZone('Asia/Jakarta'));
		$ndate 	= $date->format("YmdHis.").microtime(true);

		$file 	= $ndate.'.php';
		$loc 	= str_replace('\\', '/', $path.$file);

		$fopen 	= fopen($loc, 'wb');
		fwrite($fopen, $content);
		fclose($fopen); 

		return True;

	}

}