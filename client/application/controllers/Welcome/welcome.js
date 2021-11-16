class FController extends FormActivity {

	constructor() {
		super();
		this.id  = 'employee';
		this.url = apiurl;
		this.init();
	}

	formData() {
		var obj 	 = $('[form-id="'+this.id+'"]');
		var formData = new FormData($('hiddenformcontroller')[0]);
		var inp 	 = obj.find(':input');
		inp.each(function(idx){
			formData.append($(this).attr('name'), $(this).val());
		});
		return formData;
	}

	save(btn) {

		var ref 	 = this;
		var formData = this.formData();

		ref.enabled(btn, false);
		$.ajax({
			type : 'POST',
			data : formData,
			url  : apiurl + 'master/employee.api/register',
			processData: false,
			contentType: false,
			success:function(data, textStatus, jqXHR){
				ref.notif(data);
				ref.enabled(btn, true);
				DtMateri.getData();
			},
			error: function(jqXHR, textStatus, errorThrown){
				ref.notiferr(jqXHR);
				ref.enabled(btn, true);
			}
		});

	}

	edit(btn) {

		var ref 	 = this;
		var formData = this.formData();

		ref.enabled(btn, false);
		$.ajax({
			type : 'POST',
			data : formData,
			url  : apiurl + 'master/employee.api/update',
			processData: false,
			contentType: false,
			success:function(data, textStatus, jqXHR){
				ref.notif(data);
				ref.enabled(btn, true);
				DtMateri.getData();
			},
			error: function(jqXHR, textStatus, errorThrown){
				ref.notiferr(jqXHR);
				ref.enabled(btn, true);
			}
		});

	}

	delete(btn, params) {

		var ref 	 = this;
		var formData = new FormData();

		ref.enabled(btn, false);
		$.ajax({
			type : 'POST',
			data : formData,
			url  : apiurl + 'master/employee.api/remove/' + params,
			processData: false,
			contentType: false,
			success:function(data, textStatus, jqXHR){
				ref.notif(data);
				ref.enabled(btn, true);
				DtMateri.getData();
			},
			error: function(jqXHR, textStatus, errorThrown){
				ref.notiferr(jqXHR);
				ref.enabled(btn, true);
			}
		});
	}

	openedit(params) {
		
		var ref 	 = this;

		$.ajax({
			type : 'POST',
			data : {},
			url  : apiurl + 'master/employee.api/datasingle/' + params,
			processData: false,
			contentType: false,
			success:function(data, textStatus, jqXHR){
				//ref.notif(data);
				//ref.enabled(btn, true);
				//DtMateri.getData();
				ref.readonly([
					'Code'
				]);
				ref.fillform(data.data);
				$('.btn-form-action [name="save"]').hide();
				$('.btn-form-action [name="edit"]').show();
				$('.btn-form-action [name="cancel"]').show();
			},
			error: function(jqXHR, textStatus, errorThrown){
				ref.notiferr(jqXHR);
			}
		});

	}

	cancel(btn) {
		$(btn).hide();
		this.clear();
		$('.btn-form-action [name="save"]').show();
		$('.btn-form-action [name="edit"]').hide();
		$('.btn-form-action [name="cancel"]').hide();
	}

	materi() {
		this.clear();
		$('#materi').hide();
		$('#sku').hide();
		$('#skk').hide();
		$('#approve').hide();
		$('#pengujian').hide();
		$('#isimateri').show();
	}

	back(btn) {
		this.clear();
		$('#materi').show();
		$('#sku').show();
		$('#skk').show();
		$('#approve').show();
		$('#pengujian').show();
		$('#isimateri').hide();
	}

}

var formCtrl = new FController();