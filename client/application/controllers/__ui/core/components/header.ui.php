<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
/*
| Config Variable
*/
$apiurl 	= $this->config->item('api_url');
$baseurl 	= $this->config->item('base_url');
$assets 	= $this->config->item('assets_url');
$systemurl 	= $this->config->item('system_url');
$basepath 	= $this->config->item('path_url');
$cwurl 		= $baseurl.$cwdir;
/*
| Information Variable
*/
$info['title'] 			= isset($info['title'])?$info['title']:'';
$info['description']	= isset($info['description'])?$info['description']:'';
$info['author'] 		= isset($info['author'])?$info['author']:'';
$info['meta']			= isset($info['meta'])?$info['meta']:'';
?>
<head>
	<meta charset="utf-8"/>
	<title><?=$info['title']?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="<?=$info['description']?>" 	name="description"/>
	<meta content="<?=$info['author']?>" 		name="author"/>


	<link rel="stylesheet" href="<?=$assets?>template/admin/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?=$assets?>template/admin/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="<?=$assets?>template/admin/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="<?=$assets?>systemvendor/font-awesome/css/font-awesome.min.css" />
	
	<link rel="shortcut icon" href="favicon.ico"/>
	
	<script type="text/javascript">
		var BASE_URL 							= "<?= $baseurl 	?>";
		var ASSETS_URL 							= "<?= $assets 		?>";
		var BASEPATH_URL 						= "<?= $basepath 	?>";
		var SYSTEM_URL 							= "<?= $systemurl 	?>";
		var CWDIR 								= "<?= $cwdir 		?>";
		var apiurl 								= "<?= $apiurl 		?>";
		var cwurl 								= "<?= $cwurl 		?>";
		var p94a08da1fecbb6e8b46990538c7b50b2 	= "<?= $AuthToken 	?>"; 
	</script>

	<script src="<?=$assets?>template/admin/js/jquery.min.js" type="text/javascript"></script>
</head>

<body class="">	
<div class="container">