class ComponentEvent {

	constructor(id) {
		this.id 	= id;
		this.win 	= {};
	}

	r(name) {
		return '[form-id="'+this.id+'"] [name="'+name+'"]';
	}

	popup(options) {
		var ref = this;
		$.each(options, function(key, value){
			$(ref.r(key)).click(function(){
				ref.open($(this), value.params, cwurl + '/components/' + value.url);
			});
		});
	}

	open(obj, params, url) {

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
			this.win[winId].ObjParameters 		= params;
			this.win[winId].onbeforeunload 		= function() {
				ref.win[winId] = undefined;
			}
		}// end if

	}
}