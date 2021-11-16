<div class="row-fluid dttable-row-prehead" style="margin-top: 5px; margin-bottom:5px;">
	<div style="padding:10px">
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
		<div class="col-md-4 col-sm-4 col-xs-4">
		</div>
		<div dtpart="count" class="col-md-4 col-sm-4 col-xs-4" style="text-align:right;">
			Total : 0 Rows
		</div>
	</div>
</div>
<div class="row-fluid dttable-row-head" style="padding-bottom: 10px;">
	<div style="padding:10px">
		<div class="span5 dt-search-control">
			<input dtpart="searchglobal" name="" class="form-control" placeholder="search..." />
		</div>
		<div dtpart="pageinfo" class="span3 dt-info-control">
			1/1
		</div>
		<div class="span4 dt-page-control">
			<button dtpart="next" class="button-page-control btn btn-xs btn-icon-only btn-success"><i class="fa fa-chevron-right"></i></button>
			<input  dtpart="page" class="input-page-control" value="1"/>
			<button dtpart="prev" class="button-page-control btn btn-xs btn-icon-only btn-success"><i class="fa fa-chevron-left"></i></button>
		</div>
	</div>
</div>

<div class="row-fluid dttable-row-body">
	<div class="col-md-12">
		<div class="table-responsive" style="border: 1px solid #e4885d;"> 
			<table class="dttable table table-striped table-bordered table-hover">
				<thead class="thead" dtpart="head">
				</thead>
				<tbody class="tbody" dtpart="body">
				</tbody>
				<tfoot dtpart="foot">
				</tfoot>
			</table>
		</div>
	</div>
</div>
<div class="row-fluid dttable-row-foot">
</div>

<style>
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
	.dttable-row-head .input-page-control {
		height: 32px;
		width: 40px;
		border: none;
		text-align: center;
		float: right;
		display: inline;
	}
	.dt-page-control {
		display: inline;
	}

	.dttable-row-foot {
	}

	input[dtpart="searchadvance"], input[dtpart="searchglobal"] {
		border: 1px solid #ccc;
		padding: 3px 8px; 
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