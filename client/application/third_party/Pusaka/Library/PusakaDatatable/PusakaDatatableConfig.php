<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$Ci = &get_instance();

$GLOBALS['pusaka']['datatable']['resource']  	= $Ci->config->item('system_url').'pusaka/';
$GLOBALS['pusaka']['datatable']['path']			= 'application/third_party/Pusaka/Library/PusakaDatatable/';
$GLOBALS['pusaka']['datatable']['driver'] 		= 'MysqlDriver';
