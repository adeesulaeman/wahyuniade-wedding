<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pusaka_Variables {

	private $variables;

	public function __construct() {
		$this->variables 		= array(); 
	}

	public function set($variables) {
		$this->variables 		= $variables;
	}

	public function add($key, $variable) {
		$this->variables[$key] = $variable;
	}

	public function combine(array $array = array()) {
		foreach ($array as $key => $value) {
		 	$this->add($key, $value);
		}		
	}

	public function get($key) {
		return isset($this->variables[$key])?$this->variables[$key]:NULL;
	}

	public function all() {
		return $this->variables;
	}

}

// class UIComponentsGenerator extends CI_Controller {

// 	protected function __UiComponentMenu($item = array()) {

// 		// start active open
// 		// array(
// 		// 	'active'=> '',
// 		// 	'link' 	=> '',
// 		// 	/* -------------------- */
// 		// 	'title' => 'Home',
// 		// 	'icon'	=> 'fa fa-home',
// 		// 	'arrow'	=> '<span class="arrow"></span>',
// 		// 	'child'	=> array()
// 		// )

// 		if(isset($item['title'])) {
// 			//echo var_dump($item['child']);
// 		}

// 		if(		isset($item['active'])
// 			AND isset($item['link'])
// 			AND isset($item['icon'])
// 			AND isset($item['title'])
// 			AND isset($item['arrow'])
// 			AND isset($item['child']) ) {

// 			$childs = '';
// 			if(count($item['child'])>0) {
// 				$childs = '
// 					<ul class="sub-menu">
// 						{{list_item}}
// 					</ul>
// 				';
// 				$list 	= '';
// 				for($i=0, $m=count($item['child']); $i<$m; $i++) {
// 					$list .= $this->__UiComponentMenu($item['child'][$i]);
// 				}
// 				$childs = str_replace('{{list_item}}', $list, $childs);
// 			}

// 			return '
// 				<li class="'.$item['active'].'">
// 					<a href="'.$item['link'].'">
// 						<i class="'.$item['icon'].'"></i>
// 						<span class="title">'.$item['title'].'</span>
// 						'.$item['arrow'].'
// 					</a>
// 					'.$childs.'
// 				</li>
// 			';

// 		}else {
// 			return '';
// 		} // end if


// 	}// end method

// }

abstract class Pusaka_Controller extends CI_Controller {

	abstract protected function __lang();
	abstract protected function __lib();

	protected $vars;
	protected $components;
	protected $response;
	protected $auth;
	protected $user;
	protected $page;

	public function __construct() {

		parent::__construct();

		$this->vars 		= new Pusaka_Variables();

		// Loader
		$this->__loadPusaka();
		$this->__loadLanguage();
		$this->__loadLibrary();
		$this->__loadPage();

		if(!Pusaka\Auth::login()) {
			// No Login
			// die('Access Denied');
		}

		// Response::newInstance
		$this->response 	= new Pusaka\Response();

		// Authorize::newInstance
		$this->user 		= Pusaka\Auth::getUser();
		$this->auth 		= new Pusaka\Auth();

		// Set UserData After Login
		if(!in_array($this->page, ['login', '__system', 'leave/approval/C001'])) {
		        $this->vars->add("Userdata", ["UserId" 		=> "blank"]);
		        $this->vars->add("AuthToken", "blank");
		     	$this->loadUserdata();
		        $this->vars->add('AuthToken', (isset($this->user['Token'])?$this->user['Token']:NULL) );
		 }
		//$this->auth->roles($this->user['Role']);

	}

	private function __loadPage() {
		$this->page = $this->__page();
		$this->vars->add('ui'	, str_replace('/', '\\', APPPATH . 'controllers/' . $this->page . '/sub.ui/'));
		$this->vars->add('cwdir', $this->page);
	}

	private function __loadPusaka() {
		require_once(APPPATH . 'third_party/Pusaka/__autoloader.php');
	}

	private function __loadLibrary() {
		// Load Core
		$this->load->helper('pusaka');
	}


	private function __loadLanguage() {
		/*
		*	Load lang -> default system
		*/

		$idiom 						= 'id';//$this->session->get_userdata('language');
		$this->lang->load('common/system', $idiom);
		$langList = $this->__lang();
		foreach($langList AS $key => $val) {
			$this->lang->load($val, $idiom);
		}
		$this->vars->add('lang', $this->lang);
	}

	protected function CheckToken() {
		// if ($login == null) {
		// 	$uname = Pusaka\Auth::getUser();
		// 	if ($uname['Uname'] == null || $uname['Uname'] == "" ) {
		// 		redirect(base_url(). 'login/' );
		// 		die();
		// 	}
		// }

			$debug 	= False;

			$curl 	= new \Curl\Curl();
			
			$url 	= $this->config->item("api_url") . 'security/login.api/checktoken';
			$data 	= array (
				"TOKEN" => $this->user['Token'],
				"IP"	=> ($_SERVER['REMOTE_ADDR']=='::1'?'127.0.0.1':$_SERVER['REMOTE_ADDR'])
			);

			$std 	= $curl->post($url, $data);

			if ($curl->error) {
				if($debug) {
					die($curl->error);
				}
				redirect(base_url(). 'loginuser/' );
				die();
			}
			
			if(!isset($std->status)) {
				if($debug) {
					die($std);
				}
				redirect(base_url(). 'loginuser/' );
				die();
			}

			if($std->status !== 1000) {
				if($debug) {
					die($std->status);
				}
				redirect(base_url(). 'loginuser/' );
				die();
			}
		

	}

	protected function loadUserdata() {

		$debug 	= False;

		$curl 	= new \Curl\Curl();
		
		$url 	= $this->config->item("api_url") . 'security/login.api/getuserdata';
		$data 	= array (
			"TOKEN" => $this->user['Token'],
			"IP"	=> ($_SERVER['REMOTE_ADDR']=='::1'?'127.0.0.1':$_SERVER['REMOTE_ADDR'])
		);

		$std 	= $curl->post($url, $data);

		if ($curl->error) {
			if($debug) {
				die($curl->error);
			}
			$data 	= NULL;
			redirect(base_url(). 'loginuser/' );
			die('Access Denied!');
		}
		
		if(!isset($std->status)) {
			if($debug) {
				die($std);
			}
			$data 	= NULL;
			redirect(base_url(). 'loginuser/' );
			die('Access Denied!');
		}

		if($std->status !== 1000) {
			if($debug) {
				die($std->status);
			}
			redirect(base_url(). 'loginuser/' );
			die('Access Denied!');
		}

		$data 	= json_decode(json_encode($std), true);

		$this->vars->add("Userdata", isset($data['data'])?$data['data']:NULL);

	}

	// Protected Method


	// private function __menu($registered, $return) {
	// 	if(in_array($this->current_menu, $registered)) {
	// 		return $return;
	// 	}else {
	// 		return '';
	// 	}
	// }

	// protected function __loadSidebar($menu_id = '') {

	// 	$this->current_menu = $menu_id;

	// 	//$pagecomponent['sidebar'] 	=
	// 	$sidebar = require_once('application/core/components/sidebar.php');

	// 	$pagecomponent['sidebar'] = '';
	// 	foreach ($sidebar as $key => $value) {
	// 		$pagecomponent['sidebar'] .= $this->__UiComponentMenu($value);
	// 	}// end foreach

	// 	$this->addData('pagecomponent', $pagecomponent);
	// }

	// protected function setActiveMenu(string $activemenu) {
	// 	$this->activemenu = $activemenu;
	// }

	// protected function loadComponent($page, $name) {
	// 	$ComponentController = APPPATH . 'controllers/' . $page . '/Components/Components.php';

	// 	if(file_exists($ComponentController)) {
	// 		require_once($ComponentController);
	// 		$class = basename($ComponentController, '.php');
	// 		$Class = new $class($this);
	// 		if(method_exists($Class, $name)) {
	// 			$Class->$name();
	// 		}
	// 	}
	// }

}

abstract class Pusaka_MainController extends CI_Controller {

	abstract protected function __lang();
	abstract protected function __lib();

	protected $vars;
	protected $components;
	protected $response;
	protected $auth;
	protected $user;
	protected $page;

	public function __construct() {

		parent::__construct();

		$this->vars 		= new Pusaka_Variables();

		// Loader
		$this->__loadPusaka();
		$this->__loadLanguage();
		$this->__loadLibrary();
		$this->__loadPage();

		if(!Pusaka\Auth::login()) {
			// No Login
			// die('Access Denied');
		}

		// Response::newInstance
		$this->response 	= new Pusaka\Response();

		// Authorize::newInstance
		$this->user 		= Pusaka\Auth::getUser();
		$this->auth 		= new Pusaka\Auth();
		//$this->auth->roles($this->user['Role']);

	}

	private function __loadPage() {
		$this->page = $this->__page();
		$this->vars->add('ui'	, str_replace('/', '\\', APPPATH . 'controllers/' . $this->page . '/sub.ui/'));
		$this->vars->add('cwdir', $this->page);
	}

	private function __loadPusaka() {
		require_once(APPPATH . 'third_party/Pusaka/__autoloader.php');
	}

	private function __loadLibrary() {
		// Load Core
		$this->load->helper('pusaka');
	}


	private function __loadLanguage() {
		/*
		*	Load lang -> default system
		*/

		$idiom 						= 'id';//$this->session->get_userdata('language');
		$this->lang->load('common/system', $idiom);
		$langList = $this->__lang();
		foreach($langList AS $key => $val) {
			$this->lang->load($val, $idiom);
		}
		$this->vars->add('lang', $this->lang);
	}

	protected function CheckToken() {

		$curl 	= new \Curl\Curl();
		
		$url 	= $this->config->item("api_url") . 'security/login.api/checktoken';
		$data 	= array (
			"TOKEN" => $this->user['Token'],
			"IP"	=> ($_SERVER['REMOTE_ADDR']=='::1'?'127.0.0.1':$_SERVER['REMOTE_ADDR'])
		);

		$std 	= $curl->post($url, $data);

		if ($curl->error) {
			redirect(base_url(). 'backend/login/' );
			die();
		}
		
		if(!isset($std->status)) {
			redirect(base_url(). 'backend/login/' );
			die();
		}

		if($std->status !== 1000) {
			redirect(base_url(). 'backend/login/' );
			die();
		}

	}

	// Protected Method


	// private function __menu($registered, $return) {
	// 	if(in_array($this->current_menu, $registered)) {
	// 		return $return;
	// 	}else {
	// 		return '';
	// 	}
	// }

	// protected function __loadSidebar($menu_id = '') {

	// 	$this->current_menu = $menu_id;

	// 	//$pagecomponent['sidebar'] 	=
	// 	$sidebar = require_once('application/core/components/sidebar.php');

	// 	$pagecomponent['sidebar'] = '';
	// 	foreach ($sidebar as $key => $value) {
	// 		$pagecomponent['sidebar'] .= $this->__UiComponentMenu($value);
	// 	}// end foreach

	// 	$this->addData('pagecomponent', $pagecomponent);
	// }

	// protected function setActiveMenu(string $activemenu) {
	// 	$this->activemenu = $activemenu;
	// }

	// protected function loadComponent($page, $name) {
	// 	$ComponentController = APPPATH . 'controllers/' . $page . '/Components/Components.php';

	// 	if(file_exists($ComponentController)) {
	// 		require_once($ComponentController);
	// 		$class = basename($ComponentController, '.php');
	// 		$Class = new $class($this);
	// 		if(method_exists($Class, $name)) {
	// 			$Class->$name();
	// 		}
	// 	}
	// }

}


abstract class Pusaka_ControllerHome extends CI_Controller {

	abstract protected function __lang();
	abstract protected function __lib();

	protected $vars;
	protected $components;
	protected $response;
	protected $auth;
	protected $user;
	protected $page;

	public function __construct() {

		parent::__construct();

		$this->vars 		= new Pusaka_Variables();

		// Loader
		$this->__loadPusaka();
		$this->__loadLanguage();
		$this->__loadLibrary();
		$this->__loadPage();

		if(!Pusaka\Auth::login()) {
			// No Login
			// die('Access Denied');
		}

		// Response::newInstance
		$this->response 	= new Pusaka\Response();

		// Authorize::newInstance
		$this->user 		= Pusaka\Auth::getUser();
		$this->auth 		= new Pusaka\Auth();

		// Set UserData After Login
		if(!in_array($this->page, ['login', '__system', 'leave/approval/C001'])) {
		        $this->vars->add("Userdata", ["UserId" 		=> "blank"]);
		        $this->vars->add("AuthToken", "blank");
		     	$this->loadUserdata();
		        $this->vars->add('AuthToken', (isset($this->user['Token'])?$this->user['Token']:NULL) );
		 }
		//$this->auth->roles($this->user['Role']);

	}

	private function __loadPage() {
		$this->page = $this->__page();
		$this->vars->add('ui'	, str_replace('/', '\\', APPPATH . 'controllers/' . $this->page . '/sub.ui/'));
		$this->vars->add('cwdir', $this->page);
	}

	private function __loadPusaka() {
		require_once(APPPATH . 'third_party/Pusaka/__autoloader.php');
	}

	private function __loadLibrary() {
		// Load Core
		$this->load->helper('pusaka');
	}


	private function __loadLanguage() {
		/*
		*	Load lang -> default system
		*/

		$idiom 						= 'id';//$this->session->get_userdata('language');
		$this->lang->load('common/system', $idiom);
		$langList = $this->__lang();
		foreach($langList AS $key => $val) {
			$this->lang->load($val, $idiom);
		}
		$this->vars->add('lang', $this->lang);
	}

	protected function CheckToken() {

			$debug 	= False;

			$curl 	= new \Curl\Curl();
			
			$url 	= $this->config->item("api_url") . 'security/login.api/checktoken';
			$data 	= array (
				"TOKEN" => $this->user['Token'],
				"IP"	=> ($_SERVER['REMOTE_ADDR']=='::1'?'127.0.0.1':$_SERVER['REMOTE_ADDR'])
			);

			$std 	= $curl->post($url, $data);
		

	}

	protected function loadUserdata() {

		$debug 	= False;

		$curl 	= new \Curl\Curl();
		
		$url 	= $this->config->item("api_url") . 'security/login.api/getuserdata';
		$data 	= array (
			"TOKEN" => $this->user['Token'],
			"IP"	=> ($_SERVER['REMOTE_ADDR']=='::1'?'127.0.0.1':$_SERVER['REMOTE_ADDR'])
		);

		$std 	= $curl->post($url, $data);

		$data 	= json_decode(json_encode($std), true);

		$this->vars->add("Userdata", isset($data['data'])?$data['data']:NULL);

	}
}