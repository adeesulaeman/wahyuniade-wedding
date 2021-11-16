class ComponentController {
								
	constructor() {
		this.win 			= {};
		this.config();
		this.registerDatatableComponent();
		this.registerDisabledAffect();
		//this.registerComponent();
	}

	gc(name = '') {
		if(name!='') {
			name = ' [name="'+name+'"]';
		}
		return '#' + this.id + name;
	}

	open(obj, url) {
		var ref 	= this;
		var winId 	= obj.attr('name');

		if(this.win[winId]!=undefined) {
			this.win[winId].focus();
		}else {
			var eTop 	= obj.offset().top; 		//get the offset top of the element
			var locLeft = obj.offset().left;
			var locTop 	= (eTop - $(window).scrollTop()); 	//position of the ele w.r.t window
			this.win[winId] 		 			= window.open(url, "_blank", "toolbar=no,scrollbars=yes,resizable=yes,location=no,top="+locTop+",left="+locLeft+",width=600,height=300");
			this.win[winId].ObjComponentField	= obj;
			this.win[winId].onbeforeunload 		= function(){
				ref.win[winId] = undefined;
			}
		}// end if
	}

	registerDatatableComponent() {
		
		var ref 	= this; 
		var dtReg 	= this.datatableReg();

		$.each( dtReg, function( key, value ) {
			var obj = $('#'+ref.id).find('[name="'+key+'"]');
			obj.click(function(){
				ref.open($(this), value);
			});	
		});

	}

	// registerComponent() {

	// 	var ref     = this;
	// 	var cmpReg 	= [];
	// 	try{
	// 		cmpReg = this.componentReg();
	// 	}catch(e) {
	// 		cmpReg = [];
	// 	}

	// 	$.each( cmpReg, function( key, value ) {

	// 		var obj = $('#'+ref.id).find('[name="'+key+'"]');


	// 	});

	// }

	setOpenWindowObject(windowObjects) {
		this.ObjectsOpenWindow = windowObjects;
	}

	openWindow(component, swidth, sheight, locTop=10, locLeft=10) {
		var url 				= this.url + component;
		var popup 				= window.open(url, "_blank", "toolbar=no,scrollbars=yes,resizable=yes,location=no,top="+locTop+",left="+locLeft+",width="+swidth+",height="+sheight);
		try{
			popup.focus();
			popup.RegisterObjects 	= this.ObjectsOpenWindow;
		}catch(e){
			console.log(e);
		}
	}


	registerDisabledAffect() {

		try {

			var ref 	= this;
			var disReg 	= this.disabledEvent();

			$.each( disReg, function( key, value ) {
				var obj = $('#'+ref.id).find('[name="'+key+'"]');
				obj.change(function(){
					var a = value['disabled'];
					if(value['value'] == $(this).val()) {
						for(var i=0, m=a.length; i<m; i++) {
							$('#'+ref.id).find('[name="'+ a[i] +'"]').attr('disabled', true);
						}
						var b = value['setvalue'];
						$.each(b, function(keyB, valB) {
							$('#'+ref.id).find('[name="'+ keyB +'"]').val(valB);	
						});
					}else {
						for(var i=0, m=a.length; i<m; i++) {
							$('#'+ref.id).find('[name="'+ a[i] +'"]').removeAttr('disabled');
						}
					}
				});	
			});

		}catch(e) {
		}

	}

	loadComponent(component, data, onsuccess) {
			
		var ref = this;

		this.componenturl = this.url + component;

		$.ajax({
			type 	:'POST',
			data 	:data,
			url 	:this.componenturl,
			dataType: 'html',
			success:function(response) {
				onsuccess(response);
			},
			error: function (xhr, ajaxOptions, thrownError) {
		        if(xhr.status=='404') {
		        	console.log('Error: 404 on Component. ( ' + ref.componenturl + ' )');
		        }else {
		        	console.log(xhr.status);
		        	alert(thrownError);
		        }
		    }
		});
	}

}

// set value to component
//----------------------------------------
function setObjComponent(target, value) {
	target.val(value);
	target.change();
}

function setDispComponent(target, value) {
	target.val(value);
	target.change();
}

function setImageUrl(input, imgObj) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            imgObj.attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}