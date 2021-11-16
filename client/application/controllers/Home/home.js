class FController extends FormActivity {

	constructor() {
		super();
		this.id = 'ucapandandoa';
		this.url = apiurl;
		this.init();
	}

	formData() {
		var obj = $('[form-id="' + this.id + '"]');
		var formData = new FormData($('ucapandandoa')[0]);
		var inp = obj.find(':input');
		inp.each(function (idx) {
			formData.append($(this).attr('name'), $(this).val());
		});
		return formData;
	}

	cancel(btn) {
		$(btn).hide();
		this.clear();
		// $('.btn-form-action [name="save"]').show();
		// $('.btn-form-action [name="edit"]').hide();
		// $('.btn-form-action [name="cancel"]').hide();
	}

	btn_ucapandandoa(btn) {
		var ref = this;
		swal({
			title: "Apakah ucapan dan doa anda ingin di kirim ke kami ?",
			text: "",
			type: "info",
			showConfirmButton: true,
			confirmButtonClass: "btn-success",
			showCancelButton: true,
			cancelButtonClass: "btn-default",
			closeOnConfirm: false,
			closeOnCancel: false,
			confirmButtonText: 'Ya',
			cancelButtonText: 'Tidak'
		},
			function (isConfirm) {
				if (isConfirm) {
					ref.postToApi(btn);
				} else {
					swal("Cancelled", "Ucapan dan doa batal dikirimkan", "warning");
				}
			});
	}

	postToApi(btn) {
		var ref = this;
		var formData = this.formData();

		ref.enabled(btn, false);
		$.ajax({
			type: 'POST',
			data: formData,
			url: apiurl + 'wedding/ucapandandoa.api/add',
			processData: false,
			contentType: false,
			success: function (data, textStatus, jqXHR) {
				if (data.status == 1000) {
					ref.notif(data.status, data.errmsg);
					// this.clear();
					swal("Terimakasih Banyak", "atas ucapan dan doa-nya.", "success");
					DtUcapan.getData();
					// Dtstatusbeasiswa.getData();
				} else {
					swal("Error", data.errmsg, "error");
					ref.enabled(btn, true);
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				ref.notiferr(jqXHR);
				ref.enabled(btn, true);
			}
		});

	}

}

var formCtrl = new FController();