<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Pusaka_Loader extends CI_Loader
{
	/** Load a module view **/
	public function view($view, $vars = array(), $return = FALSE) {

		$this->_ci_view_paths = array(APPPATH . 'controllers/' => TRUE);

		$test = str_replace('/', '\\', APPPATH . 'controllers/' . $view . '.ui.php');

		//echo $test;

		if(file_exists($test))
		{
			$view 		= $view.'.ui.php';
		}
		else
		{

			$segmen 	= explode("/", $view);
			if(count($segmen)>0) {
				$sub 		= end($segmen);
				array_pop($segmen);
				array_push($segmen, ucfirst($sub));
				array_push($segmen, $sub);
				$view 		= implode("/", $segmen);
			}

		 	$view 		= $view.'.ui.php';
		}

		return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
	}
}
