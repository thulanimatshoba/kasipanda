<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access  
	
	if(!empty($wcps_items_custom_css)){
		
		$html.= '<style type="text/css">'.$wcps_items_custom_css.'</style>';
	}
	








	$html.= '<style type="text/css">';


	if($wcps_slider_navigation_position == 'middle-fixed'){
		$html.= '.wcps-container {padding: 0 50px;}';		
		}
	
	if(!empty($wcps_items_thumb_max_hieght)){
		
		$html.= '.wcps-container #wcps-'.$post_id.' .wcps-items-thumb {max-height:'.$wcps_items_thumb_max_hieght.';}';
		
		}
		
	$html.= '</style>';	






	
	$html.= '<style type="text/css">
	.wcps-container #wcps-'.$post_id.' div.wcps-items-cart.custom a.add_to_cart_button,
	.wcps-container #wcps-'.$post_id.' div.wcps-items-cart.custom a.added_to_cart
		{
		 background: '.$wcps_cart_bg .';
		 color:'.$wcps_cart_text_color.';
		} 
		
	.wcps-container #wcps-'.$post_id.' div.owl-pagination span.owl-numbers
		{
		 background: '.$wcps_slider_pagination_bg .';
		 color:'.$wcps_slider_pagination_text_color.';
		}
		
	.wcps-container #wcps-'.$post_id.' .owl-controls .owl-page span
		{
		 background: '.$wcps_slider_pagination_bg .';
		}			
	</style>';