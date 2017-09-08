<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 
	
	
	$rating = $product->get_average_rating();
	$rating = (($rating/5)*100);
	
	 
	if( $rating > 0 )
		$html .= '<div class="pg-rating woocommerce wcps-items-rating"><div class="woocommerce-product-rating"><div class="star-rating" style="color:#E0BC0D; padding-bottom:10px;" title="'.__('Rated','wcps').' '.$rating.'"><span style="width:'.$rating.'%;"></span></div></div></div>';

	
	
	
	
	
	
	
	
	