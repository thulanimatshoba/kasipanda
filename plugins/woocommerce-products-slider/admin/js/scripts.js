
jQuery(document).ready(function($)
	{



		$(document).on('click','.wcps_grid_items_reset',function(){
			
			if(confirm('Do you really want to reset ?')){
				wcps_id = jQuery(this).attr('wcps_id');
				
				//alert(wcps_id);
				
				
				jQuery.ajax(
					{
					type: 'POST',
					context:this,
					url: wcps_ajax.wcps_ajaxurl,
					data: {"action": "wcps_grid_items_reset","wcps_id":wcps_id},
					success: function(data)
							{	
								jQuery(this).html(data);
								window.location.reload();
							}
					});
				}

			

			})
			
			
			

		$(document).on('change', '#wcps_ribbon_name', function()
			{	
				value = $(this).val();
				
				if(value=='custom'){
					
					$('#wcps_ribbon_custom').css('display','block');
					}
				else{
					$('#wcps_ribbon_custom').css('display','none');
					
					}
				
	
				
			})





		$(document).on('click', '.wcps_content_source', function()
			{	
				var source = $(this).val();
				var source_id = $(this).attr("id");
				
				$(".content-source-box.active").removeClass("active");
				$(".content-source-box."+source_id).addClass("active");
				
			})

		
		jQuery(".wcps_taxonomy").click(function()
			{
				


				var taxonomy = jQuery(this).val();
				
				jQuery(".wcps_loading_taxonomy_category").css('display','block');

						jQuery.ajax(
							{
						type: 'POST',
						url: wcps_ajax.wcps_ajaxurl,
						data: {"action": "wcps_get_taxonomy_category","taxonomy":taxonomy},
						success: function(data)
								{	
									jQuery(".wcps_taxonomy_category").html(data);
									jQuery(".wcps_loading_taxonomy_category").fadeOut('slow');
								}
							});

		
			})
		
	
 		

	});	







