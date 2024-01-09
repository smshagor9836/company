var myradiovalue='';
var mycheckboxvalue=[];
var medialink = $('#murl').val();
var last_id = $('.last_id').val();
var last_id1 = $('.last_id1').val();
(function ($) {
	"use strict";

		mediaview()

		multimodal(true)

		//Submit form data via Ajax
		$("#form").on('submit', function(e){
			$('.loading').show();
			e.preventDefault();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type: 'POST',
				url: this.action,
				data: new FormData(this),
				dataType: 'json',
				contentType: false,
				cache: false,
				processData:false,
				
				success: function(response){ 
					$('.loading').hide();
					location.reload();
					Toast.fire({
						icon: 'success',
						title: 'File upload successfully'
					})
					
				},
				error: function(xhr, status, error) 
				{
					$('.loading').hide();
					$('#allmedia').load(' #allmedia');
					
					$.each(xhr.responseJSON.errors, function (key, item) 
					{
						Sweet('error',item)
						
					});

				}
			})
			

		});

        //mediaform upload
        $(".mediaform").on('submit', function(e){
        	$('.loading').show();
        	e.preventDefault();
        	$.ajaxSetup({
        		headers: {
        			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        		}
        	});
        	$.ajax({
        		type: 'POST',
        		url: this.action,
        		data: new FormData(this),
        		dataType: 'json',
        		contentType: false,
        		cache: false,
        		processData:false,
        		success: function(response){ 
        			$('.loading').hide();
        			$('.last_id').val('');
        			mediaview(true);
        			Sweet('success',"Media File Uploaded");
        			multimodal(true);
        		},
        		error: function(xhr, status, error) 
        		{
        			$('.loading').hide();
        			$('#allmedia').load(' #allmedia');
        			$.each(xhr.responseJSON.errors, function (key, item) 
        			{
        				Sweet('error',item)
        			});

        		}
        	});

        });

    	//mediaform1 submit
    	$(".mediaform1").on('submit', function(e){
    		$('.loading').show();
    		e.preventDefault();
    		$.ajaxSetup({
    			headers: {
    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    			}
    		});
    		$.ajax({
    			type: 'POST',
    			url: this.action,
    			data: new FormData(this),
    			dataType: 'json',
    			contentType: false,
    			cache: false,
    			processData:false,

    			success: function(response){ 
    				$('.multi_last').val('');
    				$('.loading').hide();
    				multimodal(true);

    				Sweet('success',"Media File Uploaded");
    				mediaview(true);
    			},
    			error: function(xhr, status, error) 
    			{
    				$('.loading').hide();
    				

    				$.each(xhr.responseJSON.errors, function (key, item) 
    				{

    					Sweet('error',item)
    				});

    			}
    		});

    	});




    	$('.view-more-media').on('click',function(e){
    		mediaview()
    	});

    	



    	function mediaview($reload = false) {
    		if ($reload==true) {
    			$.ajax({
    				type: 'get',
    				url: medialink,
    				dataType: 'json',
    				success: function(response){ 
    					$('.media-item').remove();
    					$.each(response, function(index, value){
    						$(".popupmedia").append("<div class='col-lg-2 media-hover media-item'><label class='single-img'  for='me"+value.url+"' id='media-single-level"+value.id+"' onclick='single_active("+value.id+")'><div class='single-media model-media text-center'><img class='img-fluid' src='"+value.url+"' ></div></label></div>");
    						$('.last_id1').val(value.id)

    					});
    					$('.view-more-media').show();

    				}

    			})
    		}

    		else{

    			last_id = $('.last_id1').val();
    			if (last_id == '') {
    				var mediaurl = medialink; 
    			}
    			else{
    				var mediaurl = medialink+'?id='+last_id;
    			}
    			$.ajax({
    				type: 'get',
    				url: mediaurl,
    				dataType: 'json',
    				success: function(response){ 

    					$.each(response, function(index, value){
    						$(".popupmedia").append("<div class='col-lg-2 media-hover media-item'><label class='single-img'  for='me"+value.url+"' id='media-single-level"+value.id+"' onclick='single_active("+value.id+")'><div class='single-media model-media text-center'><img class='img-fluid' src='"+value.url+"' ></div></label></div>");
    						$('.last_id1').val(value.id)

    					});
    					if (response == '') {
    						$('.view-more-media').hide();
    					}

    				}

    			})

    		}
    	}


    	


    	/*write here*/



    	$('.view-more-media1').on('click',function(e){
    		multimodal()
    	});

    	

    	function multimodal($reload = false) {



    		var medialink =  $('.murl').val();	


    		if ($reload==true) {
    			$.ajax({
    				type: 'get',
    				url: medialink,
    				dataType: 'json',
    				success: function(response){ 
    					$('.media-item1').remove();
    					$.each(response, function(index, value){
    						$(".popupmedia1").append("<div class='col-lg-2 media-hover media-item1'><input type='checkbox' class='checkbox checkbox-checked' name='multi[]' value='"+value.url+"' id='me1"+value.id+"' ><label class='single-img'  for='me1"+value.id+"' id='media-level1"+value.id+"' onclick='active1("+value.id+")'><div class='single-media model-media text-center'><img class='img-fluid' src='"+value.url+"' ></div></label>    						</div>");
    						
    						$('.multi_last').val(value.id)

    					});
    					$('.view-more-media1').show();

    				}

    			})
    		}

    		else{
    			var id = $('.multi_last').val()

    			if (id == '') {
    				var mediaurl = medialink; 
    			}
    			else{
    				var mediaurl = medialink+'?id='+id;
    			}
    			$.ajax({
    				type: 'get',
    				url: mediaurl,
    				dataType: 'json',
    				success: function(response){ 
    					$.each(response, function(index, value){
    						$(".popupmedia1").append("<div class='col-lg-2 media-hover media-item1'><input type='checkbox' class='checkbox checkbox-checked' name='multi[]' value='"+value.url+"' id='me1"+value.id+"' ><label class='single-img'  for='me1"+value.id+"' id='media-level1"+value.id+"' onclick='active1("+value.id+")'><div class='single-media model-media text-center'><img class='img-fluid' src='"+value.url+"' ></div></label>    						</div>");
    						$('.multi_last').val(value.id)

    					});
    					if (response == '') {
    						$('.view-more-media1').hide();
    					}

    				}

    			})

    		}


    		

    	}



		//deleteform submit
		$("#deleteform").on('submit', function(e){
			$('.loading').show();
			e.preventDefault();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type: 'POST',
				url: this.action,
				data: new FormData(this),
				dataType: 'json',
				contentType: false,
				cache: false,
				processData:false,
				success: function(response){ 
					$('.loading').hide();
					location.reload();
					Sweet('success',"Media File Destroyed");
				}
			});

		});
		// id media up when change from will submit
		$('#mediaUp').on('change' ,function(e) {
			$(this).closest('#form').submit();

		});

		// class media up when change from will submit
		$('.mediaUp').on('change' ,function(e) {
			$(this).closest('.mediaform').submit();

		});
		//class mediaUp1 up when change from will submit
		$('.mediaUp1').on('change' ,function(e) {
			$(this).closest('.mediaform1').submit();

		});

		//form infinity loading
		$('.view-more-button').on('click',function(e){
			$('.page-load-status').show()
		});
		$('.use').on('click',function(){

			$('.active').removeClass('active');
			$('.use').hide()

		})

		$('.use1').on('click',function(){

			var val = [];
			$('.checkbox-checked:checked').each(function(i){
				val[i] = $(this).val();
			});
			
			
			$('.active').removeClass('active');

			mycheckboxvalue=val
			
			$('.use1').hide()

			
			
		})


	})(jQuery);	





	function single_active(id) {
		$('.active').removeClass('active');
		$('#media-single-level'+id).addClass('active').siblings().removeClass('active');
		$('.use').show();
		$('.media-info-bar').show();
		let baseUrl=$('#base_url').val();
		$.ajax({
			type: 'get',
			url: baseUrl+'/admin/media/info'+'/'+id,

			dataType: 'json',
			contentType: false,
			cache: false,
			processData:false,
			
			success: function(response){ 
				$(".preview-show-rightbar").remove()
				$('#size').html(response.size)
				$('#type').html(response.type)
				$('#upload').html(response.created_at)
				$('#medialink').val(response.url)
				$('#img-name').val(response.name)
				$('#previewimg').attr('src',response.url)
				myradiovalue=response.url;

			}
		});
	}

	function active(id) {
		$('#media-level'+id).toggleClass("active");
		$('.use').show();
		$('.media-info-bar').show();
		let baseUrl=$('#base_url').val();
		$.ajax({
			type: 'get',
			url:  baseUrl+'/admin/media/info'+'/'+id,
			dataType: 'json',

			success: function(response){ 
				$(".preview-show-rightbar").remove()
				$('#size').html(response.size)
				$('#type').html(response.type)
				$('#upload').html(response.created_at)
				$('#medialink').val(response.url)
				$('#img-name').val(response.name)
				$('#previewimg').attr('src',response.url)


			}
		});
	}

	function active1(id) {
		$('#media-level1'+id).toggleClass("active");
		$('.use1').show();
		$('.media-info-bar1').show();
		let baseUrl=$('#base_url').val();
		$.ajax({
			type: 'get',
			url:  baseUrl+'/admin/media/info'+'/'+id,
			dataType: 'json',

			beforeSend: function(){

			},
			success: function(response){ 
				$(".preview-show1").fadeOut()
				$('#size1').html(response.size)
				$('#type1').html(response.type)
				$('#upload1').html(response.created_at)
				$('#medialink1').val(response.url)
				$('#img-name1').val(response.name)
				$('#previewimg1').attr('src',response.url)


			}
		});
	}



