<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase"> Data</span>
        </div>
        <div class="actions">
            <button style="display: none;" onclick="formCtrl.adddata(this)" type="button" name="toolbtn-add" class="btn blue-steel btn-outline toolbar-btn"><i class="fa fa-plus"></i> Add Data
            </button>
            &nbsp;
            <!-- <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a> -->
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-toolbar">
<!--             
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        <button id="sample_editable_1_new" class="btn sbold green"> Add New
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="btn-group pull-right">
                        <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-print"></i> Print </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
 -->
            <div class="row">
                <div class="col-md-6">
                    <div class="span4">
                        <select dtpart="limit" class="form-control" style="width:70px;">
                            <option value="5" selected>5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="*">All</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6" align="right">
                    <div class="span5 dt-search-control">
                        <input dtpart="searchglobal" name="" class="form-control" placeholder="search..." />
                    </div>
                </div>
            </div>
        </div>
        <table class="dttable table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
            <thead class="thead" dtpart="head">
            </thead>
            <tbody class="tbody" dtpart="body">
            </tbody>
            <tfoot dtpart="foot">
            </tfoot>
        </table>
        <div class="row">
            
            <div class="col-md-6" align="right">
                <div dtpart="pageinfo" class="span3 dt-info-control">
                    1/1
                </div>
            </div>
            <div class="col-md-6" align="right">
                <div class="span4 dt-page-control">
                    <button dtpart="prev" class="button-page-control btn btn-xs btn-success"><i class="fa fa-chevron-left"></i></button>
                    <input  dtpart="page" size="5" class="input-page-control" value="1"/>
                    <button dtpart="next" class="button-page-control btn btn-xs btn-success"><i class="fa fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .dt-search-control{
        width: 40%;

    }

    .dttable {
        margin-bottom: 10px !important;
    }
    .dttable tr {
        cursor: pointer;
    }
    .dttable-row-head, .dttable-row-body, .dttable-row-foot {
        margin-bottom: 0px;
    }
    
    .dttable-row-prehead {
        margin-bottom: 20px;
    }
    .dttable-row-head .dt-info-control {
        text-align: center;
        padding-top: 7px;
        height: 32px;
    }
    .dttable-row-head .button-page-control {
        float: right;
        display: inline;
    }
    .dttable-row-head  {
        height: 32px;
        width: 40px;
        border: none;
        text-align: center;
        float: right;
        display: inline;
    }
    .input-page-control{
        height: 24px;
        text-align: center;
        display: inline;
    }
    .dt-page-control {
        display: inline;
    }

    .dttable-row-foot {
    }

    input[dtpart="searchadvance"], input[dtpart="searchglobal"] {
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    input[dtpart="searchadvance"] {
        border:none;
        width: 100%;
    }

    .insearch-head {
        padding: 0px !important;
    }
</style>