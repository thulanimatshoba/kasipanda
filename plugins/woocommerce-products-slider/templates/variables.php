<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 
	
	$wcps_ribbons = get_option( 'wcps_ribbons' );

	$wcps_bg_img = get_post_meta( $post_id, 'wcps_bg_img', true );
	$wcps_themes = get_post_meta( $post_id, 'wcps_themes', true );
	$wcps_total_items = get_post_meta( $post_id, 'wcps_total_items', true );
			
	$wcps_total_items_price_format = get_post_meta( $post_id, 'wcps_total_items_price_format', true );				
			
	$wcps_column_number = get_post_meta( $post_id, 'wcps_column_number', true );
	$wcps_column_number_mobile = get_post_meta( $post_id, 'wcps_column_number_mobile', true );
	$wcps_column_number_tablet = get_post_meta( $post_id, 'wcps_column_number_tablet', true );	
		
	$wcps_auto_play = get_post_meta( $post_id, 'wcps_auto_play', true );
	$wcps_stop_on_hover = get_post_meta( $post_id, 'wcps_stop_on_hover', true );
	$wcps_slider_navigation = get_post_meta( $post_id, 'wcps_slider_navigation', true );
	$wcps_slider_navigation_position = get_post_meta( $post_id, 'wcps_slider_navigation_position', true );		
	$wcps_slide_speed = get_post_meta( $post_id, 'wcps_slide_speed', true );
			
	$wcps_slider_pagination = get_post_meta( $post_id, 'wcps_slider_pagination', true );
	$wcps_pagination_slide_speed = get_post_meta( $post_id, 'wcps_pagination_slide_speed', true );
	$wcps_slider_pagination_count = get_post_meta( $post_id, 'wcps_slider_pagination_count', true );
	
	$wcps_slider_pagination_bg = get_post_meta( $post_id, 'wcps_slider_pagination_bg', true );
	$wcps_slider_pagination_text_color = get_post_meta( $post_id, 'wcps_slider_pagination_text_color', true );		
	
	$wcps_slider_touch_drag = get_post_meta( $post_id, 'wcps_slider_touch_drag', true );
	$wcps_slider_mouse_drag = get_post_meta( $post_id, 'wcps_slider_mouse_drag', true );
	
	$wcps_query_order = get_post_meta( $post_id, 'wcps_query_order', true );
	$wcps_query_orderby = get_post_meta( $post_id, 'wcps_query_orderby', true );
	

	$wcps_content_source = get_post_meta( $post_id, 'wcps_content_source', true );
	$wcps_content_year = get_post_meta( $post_id, 'wcps_content_year', true );
	$wcps_content_month = get_post_meta( $post_id, 'wcps_content_month', true );
	$wcps_content_month_year = get_post_meta( $post_id, 'wcps_content_month_year', true );
	
	$wcps_taxonomy = get_post_meta( $post_id, 'wcps_taxonomy', true );		
	$wcps_taxonomy_category = get_post_meta( $post_id, 'wcps_taxonomy_category', true );		
		
	$wcps_product_ids = get_post_meta( $post_id, 'wcps_product_ids', true );		
	
	$wcps_cat_display = get_post_meta( $post_id, 'wcps_cat_display', true );
	$wcps_featured_display = get_post_meta( $post_id, 'wcps_featured_display', true );
	$wcps_featured_icon_url = get_post_meta( $post_id, 'wcps_featured_icon_url', true );	
					
	$wcps_sale_display = get_post_meta( $post_id, 'wcps_sale_display', true );
	$wcps_sale_icon_url = get_post_meta( $post_id, 'wcps_sale_icon_url', true );	
	
	$wcps_cart_style = get_post_meta( $post_id, 'wcps_cart_style', true );		
	$wcps_cart_display = get_post_meta( $post_id, 'wcps_cart_display', true );		
	$wcps_ratings_display = get_post_meta( $post_id, 'wcps_ratings_display', true );		
	$wcps_cart_bg = get_post_meta( $post_id, 'wcps_cart_bg', true );
	$wcps_cart_text_color = get_post_meta( $post_id, 'wcps_cart_text_color', true );		

	$wcps_grid_items = get_post_meta( $post_id, 'wcps_grid_items', true );
	$wcps_grid_items_hide = get_post_meta( $post_id, 'wcps_grid_items_hide', true );	

	$wcps_items_title_display = get_post_meta( $post_id, 'wcps_items_title_display', true );		
	$wcps_items_title_color = get_post_meta( $post_id, 'wcps_items_title_color', true );			
	$wcps_items_title_font_size = get_post_meta( $post_id, 'wcps_items_title_font_size', true );		
	
	$wcps_items_excerpt_count = get_post_meta( $post_id, 'wcps_items_excerpt_count', true );
	$wcps_items_excerpt_read_more = get_post_meta( $post_id, 'wcps_items_excerpt_read_more', true );	
	
	$wcps_items_price_display = get_post_meta( $post_id, 'wcps_items_price_display', true );		
	$wcps_items_price_color = get_post_meta( $post_id, 'wcps_items_price_color', true );			
	$wcps_items_price_font_size = get_post_meta( $post_id, 'wcps_items_price_font_size', true );			
	
	$wcps_items_thumb_link_to = get_post_meta( $post_id, 'wcps_items_thumb_link_to', true );		
	$wcps_items_thumb_size = get_post_meta( $post_id, 'wcps_items_thumb_size', true );
	$wcps_items_thumb_max_hieght = get_post_meta( $post_id, 'wcps_items_thumb_max_hieght', true );
	
	$wcps_items_empty_thumb = get_post_meta( $post_id, 'wcps_items_empty_thumb', true );		
	
	$wcps_ribbon_name = get_post_meta( $post_id, 'wcps_ribbon_name', true );
	$wcps_ribbon_custom = get_post_meta( $post_id, 'wcps_ribbon_custom', true );	
	
	$wcps_items_custom_css = get_post_meta( $post_id, 'wcps_items_custom_css', true );	

	if ( wp_is_mobile() ) {
	$wcps_is_mobile =  "wcps_mobile";
	}
	else {
	$wcps_is_mobile =  "";
	}

		
	$class_wcps_functions = new class_wcps_functions();
	if(empty($wcps_grid_items)){
		$wcps_grid_items = $class_wcps_functions->wcps_grid_items();
		}
