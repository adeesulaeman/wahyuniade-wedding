<?php
function dump($str) {
	echo("<pre>");
	print_r($str);
	echo("</pre>");
}
function inc($path) {
	$path = "views/".$path;
	require_once($path);
}
function route($idx) {
	$Controllers = isset($_GET['page'])?$_GET['page']:'';
	$parts 		 = explode("/", $Controllers);
	if(isset($parts[$idx])) {
		return $parts[$idx];
	}
	return '';
}
function template($path) {
	$base = "templates/".$path.".php";
	if(file_exists($base)) {
		return file_get_contents($base);
	}else {
		echo "File ".$base." not exist!";
		return '';
	}
}

function force_download($filename = '', $set_mime = FALSE, $is_exit = TRUE) {

		if ($filename === '') {
			return;
		}else {
			if (@is_file($filename) && ($filesize = @filesize($filename)) !== FALSE){
				$filepath = $filename;
				$filename = explode('/', str_replace(DIRECTORY_SEPARATOR, '/', $filename));
				$filename = end($filename);
			}else {
				return;
			}
		}//END IF

		$mime = 'application/octet-stream';

		$x = explode('.', $filename);
		$extension = end($x);

		if ($set_mime === TRUE) {
			if (count($x) === 1 OR $extension === '') {
				return;
			}//END METHOD

			// Load the mime types
			$mimes = Mime::getmimetype();

			// Only change the default MIME if we can find one
			if (isset($mimes[$extension])) {
				$mime = is_array($mimes[$extension]) ? $mimes[$extension][0] : $mimes[$extension];
			}
		}//END IF

		if (count($x) !== 1 && isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/Android\s(1|2\.[01])/', $_SERVER['HTTP_USER_AGENT'])) {
			$x[count($x) - 1] = strtoupper($extension);
			$filename = implode('.', $x);
		}//END IF

		if (($fp = @fopen($filepath, 'rb')) === FALSE) {
			return;
		}//END IF

		// Clean output buffer
		if (ob_get_level() !== 0 && @ob_end_clean() === FALSE) {
			@ob_clean();
		}//END IF

		// Generate the server headers
		header('Content-Type: '.$mime);
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		header('Expires: 0');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: '.$filesize);

		// Internet Explorer-specific headers
		if (isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) {
			header('Cache-Control: no-cache, no-store, must-revalidate');
		}

		header('Pragma: no-cache');

		// Flush 1MB chunks of data
		while ( ! feof($fp) && ($data = fread($fp, 1048576)) !== FALSE) {
			echo $data;
		}

		fclose($fp);
		if($is_exit) {
			exit;
		}//END IF

	}