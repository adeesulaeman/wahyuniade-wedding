[BEGIN:MAIN]
	<form role="form" class="form-horizontal">
		<div class="form-group">
			<div class="col-md-4 col-sm-4 col-xs-4">
				<input class="{(search)} form-control" style="width:70%; float: left;" type="text" placeholder="Search">
			</div>
			<div class="col-md-4 col-sm-4 col-xs-2" style="vertical-align:middle; text-align:center; padding-top:5px;">
				<span class="{(page)}">Page : 0/0</span>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-6">
				<span  class="{(next)} btn-next btn btn-sm btn-primary pull-right"><i class="fa fa-chevron-right"></i></span>
				<input class="{(number)} inp-number form-control pull-right text-center" type="text" style="width:50px" value="0"/>
				<span  class="{(prev)} btn-prev btn btn-sm btn-primary pull-right"><i class="fa fa-chevron-left"></i></span>
			</div>
		</div>
	</form>
	<div class="table-responsive">
			<table class="table table-hover table-bordered pusaka-table">
				<thead class="{(head)}">
					{(thead_content)}
				</thead>
				<tbody class="{(body)}">
					{(tbody_content)}
				</tbody>
			</table>
	</div>
[END:MAIN]

[BEGIN:HEAD]
	<th {(sort)} class="sort_both {(class)}">{(thead)}</th>
[END:HEAD]

[BEGIN:BODY]
	<tr>{(tbody)}</tr>
[END:BODY]
