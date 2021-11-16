<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Form Generator</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="assets/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    .nav > li > a {
        padding: 3px 15px;
    }
    .nav > li {
        cursor: pointer;
    }
    #side-menu li .active {
        background: #666;
    }
    #side-menu li .active a {
        color: white;
    }
    #side-menu li .active a:hover {
        background: #666;
    }
    .sidebar .nav-second-level li a {
        padding-left: 25px;   
    }
    </style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Form Generator</a>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input onkeyup="refreshSidebar()" id="tablesearch" type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button onclick="refreshSidebar()" class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li class="active">
                            <a href="javascript:;"><i class="fa fa-table fa-fw"></i> Tables<span class="fa arrow"></span></a>
                            <ul id="sidebartables" class="nav nav-second-level">
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12" style="padding-top:15px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Save Directory : </h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_form" data-toggle="tab" aria-expanded="true">Form</a>
                                </li>
                                <li class=""><a href="#tab_entities" data-toggle="tab" aria-expanded="false">Entities</a>
                                </li>
                                <li class=""><a href="#tab_datatable_view" data-toggle="tab" aria-expanded="false">Datatable View</a>
                                </li>
                                <li class=""><a href="#tab_datatable_response" data-toggle="tab" aria-expanded="false">Datatable Response</a>
                                </li>
                                <li class=""><a href="#tab_model" data-toggle="tab" aria-expanded="false">Model</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab_form">
                                </div>
                                <div class="tab-pane fade in" id="tab_entities">
                                </div>
                                <div class="tab-pane fade in" id="tab_datatable_view">
                                </div>
                                <div class="tab-pane fade in" id="tab_datatable_response">
                                </div>
                                <div class="tab-pane fade in" id="tab_model">
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>

            </div>
            <!-- /.row -->
            <div class="row">
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <!-- Custom Theme JavaScript -->
    <script src="assets/dist/js/sb-admin-2.js"></script>

<script type="text/javascript">
    function refreshSidebar() {
        $.ajax({
            type:'POST',
            data:{
                tablesearch:$('#tablesearch').val()
            },
            url:'<?= url()."?page=sidebartable/response" ?>',
            dataType: 'html',
            success:function(response) {
                $('#sidebartables').html(response.trim());
            }
        });
    }
    $(document).ready(function(){
        refreshSidebar();
    });
</script>

<script type="text/javascript">
    function setTabContent(id, url='', data={}) {
        $.ajax({
            type:'POST',
            data:data,
            url:url,
            dataType: 'html',
            success:function(response) {
                $('#'+id).html(response.trim());
            }
        });
    }// end function

    function stc(table, obj) {

        $('#side-menu li').removeClass('active');

        var data = {
            id:table
        }
        // Form
        setTabContent(
            'tab_form',
            '<?= url()."?page=form/response" ?>',
            data
        );
        // Entities
        setTabContent(
            'tab_entities',
            '<?= url()."?page=entities/response" ?>',
            data
        );
        $(obj).addClass('active');

        // Entities
        setTabContent(
            'tab_datatable_view',
            '<?= url()."?page=datatable_view/response" ?>',
            data
        );

        // Entities
        setTabContent(
            'tab_datatable_response',
            '<?= url()."?page=datatable_response/response" ?>',
            data
        );

        // Entities
        setTabContent(
            'tab_model',
            '<?= url()."?page=model/response" ?>',
            data
        );

        $(obj).addClass('active');
    }

    function export_entities(id) {
        $.ajax({
            type:'POST',
            data:{id:id},
            url:'<?= url()."?page=entities/export" ?>',
            dataType: 'html',
            success:function(response) {
                window.location = '<?= url()."?page=entities/download&download=" ?>' + response.trim();
            }
        });
    }

    function export_datatable_response(id) {
        $.ajax({
            type:'POST',
            data:{id:id},
            url:'<?= url()."?page=datatable_response/export" ?>',
            dataType: 'html',
            success:function(response) {
                window.location = '<?= url()."?page=datatable_response/download&download=" ?>' + response.trim();
            }
        });
    }

    function export_model(id) {
        $.ajax({
            type:'POST',
            data:{id:id},
            url:'<?= url()."?page=model/export" ?>',
            dataType: 'html',
            success:function(response) {
                window.location = '<?= url()."?page=model/download&download=" ?>' + response.trim();
            }
        });
    }
</script>

</body>
</html>
