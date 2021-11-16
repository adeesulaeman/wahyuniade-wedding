class FormController {

	constructor() {
		this.id 	= '';
		this.url 	= BASE_URL + CWDIR;
	}

	save() {
		var ref 	 = this;
		var id 		 = this.id;
		var formData = new FormData($('[form-id="'+id+'"]')[0]);
		$.ajax({
			type:'POST',
			data:formData,
			url:this.url + '/actions',
			processData: false,
			contentType: false,
			success:function(response, textStatus, jqXHR){
				//do success
				try{
					var error = {code:0};
					ref.onSave(error, response);
				}catch(e){console.log(e)}
			},
			error: function(jqXHR, textStatus, errorThrown){
				//do error
				var error 		= {
					code:-100,
					message:textStatus
				};
				var response 	= null;
				ref.onSave(error, response);
			}
		});
	}

	edit() {
		var ref 	 = this;
		var id 		 = this.id;
		var formData = new FormData($('[form-id="'+id+'"]')[0]);
		$.ajax({
			type:'POST',
			data:formData,
			url:this.url + '/actions',
			processData: false,
			contentType: false,
			success:function(response, textStatus, jqXHR){
				//do success
				try{
					var error = {code:0};
					ref.onEdit(error, response);
				}catch(e){}
			},
			error: function(jqXHR, textStatus, errorThrown){
				//do error
			}
		});
	}

	delete() {
		var ref 	 = this;
		var id 		 = this.id;
		var formData = new FormData($('[form-id="'+id+'"]')[0]);
		$.ajax({
			type:'POST',
			data:formData,
			url:this.url + '/actions',
			processData: false,
			contentType: false,
			success:function(response, textStatus, jqXHR){
				//do success
				try{
					var error = {code:0};
					ref.onDelete(error, response);
				}catch(e){}
			},
			error: function(jqXHR, textStatus, errorThrown){
				//do error
			}
		});
	}

	cancel() {
	}

	obj() {
		return {
			response : function(msg) {
				alert(msg);
			}

		}
	}

}

class FormActivity {

	constructor() {
		this.id 		= '';
		this.rfields 	= [];
	}

	enabled(btn, isenable) {
		if(isenable) {
			$(btn).removeAttr('disabled');
		}else {
			$(btn).attr('disabled', true);
		}
	}

	rId(name) {
		var id = this.id;
		return $('[form-id="'+id+'"] [name="'+name+'"]');
	}

	notif(data, msg) {
		
		try{
			if(data == 1000) {
				toastr.success(msg, "Success");
			}else
			if(data == 2000) {
				toastr.error(msg, 'Terjadi Kesalahan');
			}else 
			if(data == 3000) {
				toastr.warning(msg, 'Warning');
			}
		}catch(e){
			toastr.error(msg, 'Error');
		}
	}

	notiferr(jqXHR) {
		toastr.error(jqXHR.status, 'error');
	}

	fillform(data) {
		var id = this.id;
		$('[form-id="'+id+'"]').find(':input').each(function(){
			var name = $(this).attr('name');
			if (typeof data[name] !== 'undefined') {
				$(this).val(data[name]);
			}
		});
	}

	fillformCustom(data, id) {
		$('[form-id="'+id+'"]').find(':input').each(function(){
			var name = $(this).attr('name');
			if (typeof data[name] !== 'undefined') {
				$(this).val(data[name]);
			}
		});
	}

	readonly(fields) {
		var id = this.id;
		for(i=0, c=fields.length; i<c; i++) {
			$('[form-id="'+id+'"] [name="'+fields[i]+'"]').attr('readonly', true);
		}
	}

	clear() {
		var ref = this;
		var id 	= this.id;
		$('[form-id="'+id+'"]').find(':input').each(function(){
			$(this).val('');
			if(ref.rfields.indexOf($(this).attr('name'))==-1) {
				$(this).removeAttr('readonly');
			}
		});
	}

	init() {
		var ref = this;
		var id 	= this.id;
		var i 	= 0;
		$('[form-id="'+id+'"]').find(':input').each(function(){
			var attr = $(this).attr('readonly');
			if (typeof attr !== typeof undefined && attr !== false) {
				ref.rfields[i] = $(this).attr('name');
				i++;
			}
		});	

		this.component = new ComponentEvent(id);
	}

}