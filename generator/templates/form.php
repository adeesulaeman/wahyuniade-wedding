<div class="span6">
	<div class="widget-box">
		<div class="widget-title bg_ly" data-toggle="collapse" href="#collapseMainForm"><span class="icon"><i class="icon-chevron-down"></i></span>
			<h5>Manage Period</h5>
		</div>
		<div class="widget-content nopadding collapse" id="collapseMainForm">
			<form form-id="textformidhere" action="" method="post" class="form-horizontal" enctype="multipart/form-data">
				<div class="form-actions btn-form-action">
					<button onclick="formCtrl.save(this)"    name="save"   style="display:block;" type="button" class="btn btn-mini btn-primary"><i class="fa fa-save"></i> Save</button>
					<button onclick="formCtrl.edit(this)"    name="edit"   style="display:none;"  type="button" class="btn btn-mini btn-info"><i class="fa fa-save"></i> Edit</button>
					<button onclick="formCtrl.cancel(this)"  name="cancel" style="display:none;"  type="button" class="btn btn-mini btn-danger"><i class="fa fa-remove"></i> Batal</button>
				</div>
				{{form_group}}
			</form>
		</div>
	</div>
</div>