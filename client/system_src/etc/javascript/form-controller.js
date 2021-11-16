class FormController {

	constructor() {
		this.debug = true;
	}

	/*
	|-----------------------------------------------------------
	| saveForm
	|-----------------------------------------------------------
	| 	sendForm(
	|		this.id,
	|		this.url + 'actions', {
	|			key:'value'
	|		}
	|	);
	|
	*/
	saveForm(BtnObj) {
		this.saveFormObj = {
			'id'	:this.id,
			'url'	:this.url + 'actions',
			'data'	:{}
		}
		this.onSaveForm(this.saveFormObj);
		/*
		|------------------------
		| id, url, data = {}
		*/
		var ref = this;
		sendForm(
			this.saveFormObj.id,
			this.saveFormObj.url,
			this.saveFormObj.data,
			// success
			{
				run: function(data) {
					ref.refreshDatatable();
					try{
						ref.saveFormObj.success(data);
					}catch(e){
						console.log(e);
					}
				}
			},
			// error
			{
				run: function(data) {
					ref.refreshDatatable();
					try{
						ref.saveFormObj.error(data);
					}catch(e){
						console.log(e);
					}
				}
			},
			// debug mode
			ref.debug
		);
	} // end function

	saveEdit(BtnObj) {
		this.saveEditObj = {
			'id'	:this.id,
			'url'	:this.url + 'actions',
			'data'	:{}
		}
		this.onSaveEdit(this.saveEditObj);
		/*
		|------------------------
		| id, url, data = {}
		*/
		var ref = this;
		sendForm(
			this.saveEditObj.id,
			this.saveEditObj.url,
			this.saveEditObj.data,
			// success
			{
				run: function(data) {
					ref.refreshDatatable();
					try{
						ref.saveEditObj.success(data);
					}catch(e){
						console.log(e);
					}
				}
			},
			// error
			{
				run: function(data) {
					ref.refreshDatatable();
					try{
						ref.saveEditObj.error(data);
					}catch(e){
						console.log(e);
					}
				}
			},
			// debug mode
			ref.debug
		);

	} // end function

	delete(data) {

		this.deleteObj = {
			'id'		:this.id,
			'url'		:this.url + 'actions',
			'data'		:{},
			'confirm'	:true,
			'success'  	:function(response){
			}
		}
		this.onDelete(this.deleteObj, data);

		var ref = this;

		if(this.deleteObj.confirm) {
			var c = confirm('Confirm ?');
			if(!c) {
				return;
			}
		}

		var debugmode = ref.debug;

		$.ajax({
			type 	:'POST',
			data 	:ref.deleteObj.data,
			url 	:ref.deleteObj.url,
			dataType: 'html',
			success:function(response) {
				ref.deleteObj.success(response);
				try{
					var response = JSON.parse(response);

					var stat 	 = 0;

					if(response.STATUS==100) {
						stat 	 = 1; 
					}

					if(debugmode==true) {
						response.MESSAGE = dump(response);
					}

					dialogBox(stat, response.MESSAGE);
				}catch(e){
					if(debugmode==true) {
						data = '<pre>'+e+'</pre>' + '<pre>Response : </pre>' + data;
						dialogBox(0, data);
					}
					console.log(e);
				}
				ref.refreshDatatable();
			}
		});

	} // end function

	prepareEdit(data) {
		this.prepareEditObj = {
			'id'	: this.id,
			'read'	: ['CustomerCode'],
			'data'	: {},
			'url'	: this.url + 'preparedata'
		};
		this.onPrepareEdit(this.prepareEditObj, data);
		prepareEditForm(
			this.prepareEditObj.id,
			this.prepareEditObj.read,
			this.prepareEditObj.data,
			this.prepareEditObj.url,
			this.prepareEditObj.cbxsetting,
			this.prepareEditObj.success
		);
	}

	refreshDatatable() {
		for(var i=0, m=this.datatable.length; i<m; i++) {
			window[this.datatable[i]].getData();
		}
	}

	ucfirst(text) {
	    return text.charAt(0).toUpperCase() + text.slice(1);
	}

}

var defaultFormReadonly = {};

function cancelForm(Obj, shortcut=false) {
	try {
		var id = '';
		if(shortcut==false){
			var elid 	= $(Obj).parent().parent().attr('form-id');
			var ronly 	= defaultFormReadonly[elid];
			id 			= '[form-id="'+ elid + '"]';
			$('#'+elid).find(':input').removeAttr('readonly');
			$('#'+elid).find(':input').val('');
			$('#'+elid).find(':input').each(function(){
				$(this).removeAttr('checked');
			});
			for(i=0, m=ronly.length; i<m; i++) {
				$('#'+elid).find('[name="'+ronly[i]+'"]').attr('readonly', true);
			}
		}else {
			id = '[form-id="'+ Obj + '"]';
			defaultFormReadonly[Obj] = [];
			$('#'+Obj).find(':input').each(function(){
				if($(this).is('[readonly]')==true) {
					defaultFormReadonly[Obj].push($(this).attr('name'));
				}
			});
			//defaultFormReadonly[Obj] =
		}
		$('#'+elid).find('img').each(function(){
			$(this).attr('src', '');		
		});
		$(id).find('[name="save"]').show();
		$(id).find('[name="edit"]').hide();
		$(id).find('[name="cancel"]').show();

	}catch(e) {
		console.log(e);
	}

	try{
		onCancelFormPrototype();
	}catch(e){};

}// end method

function prepareEditForm(id, readonly=[], data={}, url='', cbxsetting, fsuccess) {
	try{

		$.ajax({
			type:'POST',
			data:data,
			url:url,
			dataType: 'html',
			success:function(response) {

				var ObjRes 	= {};
				var DataRes = {};
				try{
					ObjRes  = JSON.parse(response.trim());
					DataRes = ObjRes['DATA'];
					fsuccess(DataRes);
				}catch(e) {
				}

				var name 	= '';
				$('#'+id).find(':input').each(function() {
					if($.inArray($(this).attr('name'), readonly )>-1) {
						$(this).attr('readonly', true);
					}
					name = $(this).attr('name');
					try{

						 if(  $(this).attr('type') == 'checkbox' ) {

							 if( typeof( cbxsetting[name] ) != 'undefined' ) {
								 var v_ = DataRes[name];
								 if(DataRes[name]==cbxsetting[name]['checked']) {
										$(this).attr('checked', true);
								 }else {
									 	$(this).removeAttr('checked');
								 }
							 }
						 }

						 if( typeof( $(this).attr('input-date') ) != 'undefined' ){
						 	$(this).val(moment(DataRes[name]).format('DD-MM-YYYY'));
						 }else{
						 	$(this).val(DataRes[name]);
						 }
						 $(this).change();
					}catch(e) {
						console.log(e);
					}
				});
				var elid = '[form-id="'+id+'"]';
				$(elid).find('[name="save"]').hide();
				$(elid).find('[name="edit"]').show();
				$(elid).find('[name="cancel"]').show();
			}
		});

	}catch(e) {
		alert(e);
	}
}// end method

function sendForm(id, url='', data={}, onsuccess, onerror, debugmode) {

	var formData = new FormData($('#'+id)[0]);
	$.each( data, function( key, value ) {
	  	formData.append(key, value);
	});

	$('#'+id).find('input[input-date]').each(function(){
		var date = $(this).val();
		try {
			date  	 = date.split("-").reverse().join("-");
			formData.set($(this).attr('name'), date);
		}catch(e) {}
	});

	$.ajax({
		type:'POST',
		data:formData,
		url:url,
		processData: false,
		contentType: false,
		success:function(data, textStatus, jqXHR){
			try{
				var response = JSON.parse(data);

				var stat 	 = 0;

				if(response.STATUS==100) {
					stat 	 = 1; 
				} else if (response.STATUS==300){
					stat 	 = 2;
				}

				if(debugmode==true) {
					response.MESSAGE = dump(response);
				}

				dialogBox(stat, response.MESSAGE);
				onsuccess.run(data);
			}catch(e){
				if(debugmode==true) {
					data = '<pre>'+e+'</pre>' + '<pre>Response : </pre>' + data;
					dialogBox(0, data);
				}
				console.log(e);
			}
		},
		error: function(jqXHR, textStatus, errorThrown){
			//if fails
			try{
				dialogBox(0, textStatus);
				onerror.run(jqXHR, textStatus, errorThrown);
			}catch(e){
				console.log(e);
			}

		}
	});

}// end method

function dialogBox(status, text) {
	if(status==0) {
		toastr.error(text, 'Error');
	}else if(status==1){
		toastr.success(text, 'Success');
	}else if(status==2){
		toastr.warning(text, 'Warning');
	}

}

function dump(obj) {
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }

    var pre = document.createElement('pre');
    pre.innerHTML = out;
    return pre;
}

function printResponse(data, debugmode = false) {
	try{
		var response = JSON.parse(data);

		var stat 	 = 0;

		if(response.STATUS==100) {
			stat 	 = 1; 
		}else if (response.STATUS==300){
			stat 	 = 2;
		}

		if(debugmode==true) {
			response.MESSAGE = dump(response);
		}

		dialogBox(stat, response.MESSAGE);
	}catch(e){
		if(debugmode==true) {
			data = '<pre>'+e+'</pre>' + '<pre>Response : </pre>' + data;
			dialogBox(0, data);
		}
		console.log(e);
	}
}

function getResponseStatus(data) {
	try{
		var response = JSON.parse(data);
		return response.STATUS;
	}catch(e){
		console.log(e);
		return -1
	}
}

function getResponseData(data) {
	try{
		var response = JSON.parse(data);
		return response.DATA;
	}catch(e){
		console.log(e);
		return -1
	}
}
