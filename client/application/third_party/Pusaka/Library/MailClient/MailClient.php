<?php 
namespace Pusaka\Library;

class MailClient {

	private $Url;

	private $ApiKey;
	private $Username;
	private $Password;

	private $recipient;
	private $subject;
	private $message;

	private $logfile;

	function __construct($ApiKey = NULL, $Username = NULL, $Password = NULL) {
		
		if(!class_exists('\\Curl\\Curl')) {
			die('required class : [ Curl\\Curl ]');
		}

		// Config
		//-------------------------------------------------------
		require_once(__DIR__.'/MailConfig.php');

		$this->Url 		= $MailConfig["ServerUrl"];//"http://localhost/hress/mailer/server/send.php";
		$this->ApiKey 	= "blZJzsqByPjUsnnC";
		$this->Username = "BizlineESS";
		$this->Password = "pr0b1zpi";
		//-------------------------------------------------------

		$this->recipient= []; 

		if($ApiKey!==NULL) {
			$this->ApiKey = $ApiKey;
		}

		if($Username!==NULL) {
			$this->Username = $Username;
		}

		if($Password!==NULL) {
			$this->Password = $Password;
		}

		$this->logfile = __DIR__ . '/log.php';

	}

	function recipient($addr, $name) {
		$this->recipient[] = array( 
				"address" 	=> $addr,
				"name"		=> $name
		);
	}

	function subject(string $subject) {
		$this->subject 	= $subject;
	}

	function message(string $message) {
		$this->message 	= $message;
	}

	function send() {
		
		$curl 	= new \Curl\Curl();
		
		$url 	= $this->Url . '?ukey=' . $this->ApiKey;
		$data 	= array (
			"appuser" 	=> $this->Username,
			"apppass"	=> $this->Password,
			"recipient" => json_encode($this->recipient),
			"subject" 	=> $this->subject,
			"message"	=> $this->message
		);

		$std 	= $curl->post($url, $data);

		if($curl->error) {
			return False;
		}

		return $std;

	}

	function log(string $message) {
		$file = $this->logfile;
		if(file_exists($file)) {
			$last 	= file_get_contents($file);
			$fh  	= fopen($file, 'w');
			$last 	= $last . "\r\n" . day('Y/m/d H:i:s log: ') . $message;
			fwrite($fh, $last);
			fclose($fh);
			return True;
		}
		return False;
	}

	function readlog() {
		$file = $this->logfile;
		if(file_exists($file)) {
			$read 	= file_get_contents($file);
			return $read;
		}
		return "";
	}

}