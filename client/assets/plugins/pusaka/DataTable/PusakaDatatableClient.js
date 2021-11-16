function PusakaDatatableClient(options) {

	var totalpage 				= 0;
	var countrows 				= 0;

	options.post 				= {};

	options.post.next 			= 1;
	options.post.prev 			= 1;
	options.post.page 			= 1;

	if(options.init!=undefined) {
		try {
			options.post.limit = options.init.limit;
		}catch(e) {}
	}

	options.post.keysearch 		= '';
	options.post.search 		= {};							

	options.getData 	= function() {

		var FData 	= new FormData();
		FData.append('current', options.post.page);
		FData.append('limit', 	options.post.limit);
		FData.append('keysearch', options.post.keysearch);
		
		try {
			$.each(options.init.post, function (key, val) {
				FData.append(key, val);
			});
		}catch(e) {}

		$.each(options.post.search, function (key, val) {
			FData.append('search['+key+']', val);
		});

		$('#'+options.id+' [dtpart="pageinfo"]').html('<i class="fa fa-spinner fa-spin"></i>');

		$.ajax({
			type 	:'POST',
			data 	:FData,
			url  	:options.url,
			processData: false,
			contentType: false,
			success:function(data, textStatus, jqXHR){

				options.post.page 	= data.data.current;
				totalpage 			= data.data.total;
				countrows 			= data.data.count;

				$('#'+options.id+' [dtpart="page"]').val(data.data.current);
				$('#'+options.id+' [dtpart="pageinfo"]').html(options.post.page + '/' + totalpage);
				$('#'+options.id+' [dtpart="count"]').html('Total : '+countrows+' Rows');

				var tempBody 		= '';

				for(i=0, c=data.data.rows.length; i<c; i++) {
					tempBody += options.body(data.data.rows[i], i);
				}

				$('#'+options.id+' [dtpart="body"]').html(tempBody);

			},
			error: function(jqXHR, textStatus, errorThrown){
				//do error
			}
		});
	}

	$.ajax({
		type 	:'GET',
		data 	:{},
		url  	:options.template,
		success:function(response) {
			$('#'+options.id).html(response);
			options.header($('#'+options.id+' [dtpart="head"]'));
			options.footer($('#'+options.id+' [dtpart="foot"]'));

			$('#'+options.id+' [dtpart="next"]').click(function(){
				if(options.post.page < totalpage) {
					options.post.page += 1;
					options.getData();
				}
			});

			$('#'+options.id+' [dtpart="prev"]').click(function(){
				if(options.post.page > 1) {
					options.post.page -= 1;
					options.getData();
				}
			});

			$('#'+options.id+' [dtpart="page"]').change(function(){
				if($(this).val() <= totalpage && $(this).val() >= 1) {
					options.post.page = $(this).val();
					options.getData();
				}else {
					$(this).val(options.post.page);
				}
			});

			$('#'+options.id+' [dtpart="searchglobal"]').change(function(){
				options.post.keysearch = $(this).val();
				options.getData();
			});

			$('#'+options.id+' [dtpart="searchadvance"]').change(function(){
				options.post.search[$(this).attr('name')] = $(this).val();
				options.getData();
			});

			$('#'+options.id+' [dtpart="limit"]').change(function(){
				options.post.limit = $(this).val();
				options.getData();
			});

			options.getData();
		}
	});


	return options;

}