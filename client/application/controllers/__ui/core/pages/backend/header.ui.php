<!DOCTYPE html>
<html lang="en">
<?php
/*
| Config Variable
*/
$apiurl     = $this->config->item('api_url');
$rootdir 	= $this->config->item('root_dir');
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title -->
    <title> Wahyuni Ade Wedding </title>

    <!-- Favicon and Touch Icons -->
    <link href="<?=$assets?>wedding/images/favicon/favicon.png" rel="shortcut icon" type="image/png">
    <link href="<?=$assets?>wedding/images/favicon/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="<?=$assets?>wedding/images/favicon/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="<?=$assets?>wedding/images/favicon/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="<?=$assets?>wedding/images/favicon/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

    <!-- Icon fonts -->
    <link href="<?=$assets?>wedding/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" rel="stylesheet"> -->
    <link href="<?=$assets?>wedding/css/flaticon.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="<?=$assets?>wedding/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->

    <!-- Plugins for this template -->
    <link href="<?=$assets?>wedding/css/animate.css" rel="stylesheet">
    <link href="<?=$assets?>wedding/css/owl.carousel.css" rel="stylesheet">
    <link href="<?=$assets?>wedding/css/owl.theme.css" rel="stylesheet">
    <link href="<?=$assets?>wedding/css/slick.css" rel="stylesheet">
    <link href="<?=$assets?>wedding/css/slick-theme.css" rel="stylesheet">
    <link href="<?=$assets?>wedding/css/owl.transitions.css" rel="stylesheet">
    <link href="<?=$assets?>wedding/css/jquery.fancybox.css" rel="stylesheet">
    <link href="<?=$assets?>wedding/css/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=$assets?>wedding/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="<?=$assets?>global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
    <script src="<?=$assets?>template/admin/js/jquery.min.js" type="text/javascript"></script>
    <link href="<?=$assets?>global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
        
	<script type="text/javascript">
		var BASE_URL 							= "<?= $baseurl 	?>";
		var ASSETS_URL 							= "<?= $assets 		?>";
		var BASEPATH_URL 						= "<?= $basepath 	?>";
        var SYSTEM_URL                          = "<?= $systemurl   ?>";
		var ROOTDIR 							= "<?= $rootdir 	?>";
		var CWDIR 								= "<?= $cwdir 		?>";
		var apiurl 								= "<?= $apiurl 		?>";
		var cwurl 								= "<?= $cwurl 		?>";
		var p94a08da1fecbb6e8b46990538c7b50b2 	= "<?= $AuthToken 	?>";
	</script>
    <script type="text/javascript" src="<?=$assets?>plugins/pusaka/DataTable/PusakaDatatableClient.js"></script>
</head>
<body id="home">
    