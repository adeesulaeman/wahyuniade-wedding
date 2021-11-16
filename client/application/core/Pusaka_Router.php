<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Pusaka_Router extends CI_Router
{
	public function _validate_request($segments) {
		$c = count($segments);
		$directory_override = isset($this->directory);

		// Loop through our segments and return as soon as a controller
		// is found or when such a directory doesn't exist
		while ($c-- > 0)
		{
			//echo var_dump($this->directory);
			
			$sub  = ucfirst($segments[0]);

			$test = $this->directory
				.$sub.'/'
				.ucfirst($this->translate_uri_dashes === TRUE ? str_replace('-', '_', $segments[0]) : $segments[0]);
			
			if ( ! file_exists(APPPATH.'controllers/'.$test.'.php')
				&& $directory_override === FALSE
				&& is_dir(APPPATH.'controllers/'.$this->directory.$segments[0])
			)
			{
				$this->set_directory(array_shift($segments), TRUE);
				continue;
			}
			
			$segments[0] = ucfirst($segments[0]);
			
			return $segments;
		}
		// This means that all segments were actually directories
		return $segments;
	}

	protected function _set_request($segments = array())
	{
		$segments = $this->_validate_request($segments);
		// If we don't have any segments left - try the default controller;
		// WARNING: Directories get shifted out of the segments array!
		
		if (empty($segments))
		{
			$this->_set_default_controller();
			return;
		}


		if ($this->translate_uri_dashes === TRUE)
		{
			$segments[0] = str_replace('-', '_', $segments[0]);
			if (isset($segments[1]))
			{
				$segments[1] = str_replace('-', '_', $segments[1]);
			}
		}

		$this->set_class($segments[0]);
		if (isset($segments[1]))
		{
			$this->set_method($segments[1]);
		}
		else
		{
			$segments[1] = 'index';
		}

		$c 						= $this->directory;
		$this->directory 	  	= $c.'/'.$segments[0].'/';

		array_unshift($segments, NULL);
		unset($segments[0]);
		$this->uri->rsegments = $segments;
		//echo var_dump($this->uri->rsegments);
	}

	public function _set_routing() {
		//echo var_dump($this->uri->uri_string);//"aaaaaaaaaaa";
		parent::_set_routing();
	}

	public function _set_default_controller() {
		if(!empty($this->default_controller)) {
			$c 					= $this->default_controller;
			$this->directory 	= $c.'/';
		}
		parent::_set_default_controller();
	}
}