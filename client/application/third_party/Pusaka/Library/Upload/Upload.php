<?php 
namespace Pusaka\Library;

class Upload {

	private $name;
	private $form;
	private $config;
	private $files;
	private $error;

	public function __construct($name, $user_config = array()) {

		$config['upload_path'] 			= 'storage/';
		$config['allowed_ext'] 			= 'gif|jpg|png';
		$config['max_size'] 			= Upload::getByte(100, 'KB');
		$config['encrypt']				= False;
		$config['remove_char']			= ['#'];

		foreach ($user_config as $key => $value) {
			if(isset($config[$key])) {
				$config[$key] = $value;
			} // end method
		} // end foreach

		$config['allowed_ext']			= explode('|', $config['allowed_ext']);

		if(isset($_FILES[$name])) {
			$this->form = $_FILES[$name];
		} else {
			$this->form = NULL;
		} // end if

		$this->name 	= $name;
		$this->config 	= $config;
		$this->error 	= '';

	} // end method

	public static function getByte($size, $base) {
		$units = array('KB', 'MB', 'GB', 'TB');
		
		if(!is_numeric($size)){
			return 0;
		}
		
		$precision = 2;
		
		if($base == "KB"){
			$bytes = $size * (1024);
			return $bytes;
		}else if($base == "MB"){
			$bytes = $size * (1024*1024);
			return $bytes;
		}else if($base == "GB"){
			$bytes = $size * (1024*1024*1024);
			return $bytes;
		}else if($base == "TB"){
			$bytes = $size * (1024*1024*1024*1024);
			return $bytes;
		}
	}// end method

	public static function getByteInfo($bytes, $precision = 2) {
		$units = array('B', 'KB', 'MB', 'GB', 'TB');
 
		$bytes = max($bytes, 0);
		$pow = floor(($bytes ? log($bytes) : 0) / log(1024));
		$pow = min($pow, count($units) - 1);
 
		$bytes /= pow(1024, $pow);
 
		return round($bytes, $precision) . ' ' . $units[$pow];
	}// end method

	public function original() {
		$ext 	= pathinfo($this->form['name'], PATHINFO_EXTENSION);
		$name 	= basename($this->form['name'], ".".$ext);
		$this->files['name'] = $name;
		$this->files['ext']	 = $ext;
	}

	public function removeCharacter($char = ['#']) {
		$name 		= $this->files['name'];
		foreach ($char as $search) {
			$name 	= str_replace($search, '', $name);
		}// end foreach
		$this->files['name'] = $name;
	}// end method

	public function encrypt() {
		$this->files['name'] = md5(uniqid());
	}

	public function getFileInfo() {
		$this->original();
		if($this->config['encrypt']) {
			$this->encrypt();
		}else {
			$this->removeCharacter($this->config['remove_char']);
		}
		$this->files['ext']		= pathinfo($this->form['name'], PATHINFO_EXTENSION);
		$this->files['size'] 	= $this->form['size'];
	}// end method

	public function start() {
		
		if($this->form === NULL) {
			$this->error = 'reference is null. in $_FILES[\''.$this->name.'\']';
 			return false;
 		}

 		// set files info
 		$this->getFileInfo();

 		// sys files info
 		$name 	= $this->files['name'];
 		$ext 	= $this->files['ext'];
 		$size 	= $this->files['size'];

 		// sys files directory
 		$tmp 	= $this->form['tmp_name'];
 		$save 	= $this->config['upload_path'];
 		$saveas = $save.$name.'.'.$ext;

 		if(!file_exists($save)) {
 			$this->error = 'directory not found. in '.$save;
			return false;
		} // end if

		if(!in_array($ext, $this->config['allowed_ext'])) {
			$this->error = 'extension type not allowed. ( '.$ext.' )';
			return false;
		} // end if

		if(!($size < $this->config['max_size'])) {
			$this->error = 'max size is '.Upload::getByteInfo( $this->config['max_size'] );
			return false;
		} // end if

		if(!move_uploaded_file($tmp, $saveas)) {
			$this->error = 'upload failed.';
			return false;
		} // end if

		$this->files['path'] 	= $save;
		$this->files['link'] 	= $saveas;

		return true;

	}// end method

	public function link() {
		return $this->files['link'];
	}// end method

	public function delete() {

		$link = $this->files['link'];
		if(!file_exists($link)) {
			$this->error = 'file not found.';
			return false;
		}else {
			unlink($link);
			return true;
		}

	}// end method

	public function error() {
		return $this->error;
	}// end method

}