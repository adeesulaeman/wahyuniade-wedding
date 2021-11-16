<div class="row dttable-row-prehead">
	<div class="col-md-4 col-sm-4 col-xs-4">
		<select dtpart="limit" class="form-control" style="width:70px;">
			<option value="10">10</option>
			<option value="25" selected>25</option>
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
<div class="row dttable-row-head">
	<div class="col-md-5 col-sm-5 col-xs-5 dt-search-control">
		<input dtpart="searchglobal" name="" class="form-control" placeholder="search..." />
	</div>
	<div dtpart="pageinfo" class="col-md-3 col-sm-3 col-xs-3 dt-info-control">
		1/1
	</div>
	<div class="col-md-4 col-sm-4 col-xs-4 dt-page-control">
		<button dtpart="next" class="button-page-control btn btn-xs btn-icon-only btn-info"><i class="fa fa-chevron-right"></i></button>
		<input  dtpart="page" class="input-page-control" value="1"/>
		<button dtpart="prev" class="button-page-control btn btn-xs btn-icon-only btn-info"><i class="fa fa-chevron-left"></i></button>
	</div>
</div>
<div class="row dttable-row-body">
	<div class="col-md-12">
		<div class="table-responsive"> 
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
<div class="row dttable-row-foot">
</div>

<style>
	.dttable {
		margin-bottom: 10px !important;
	}
	.dttable tr {
		cursor: pointer;
	}
	.dttable-row-head, .dttable-row-body, .dttable-row-foot {
		margin-bottom: 5px;
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
</style>