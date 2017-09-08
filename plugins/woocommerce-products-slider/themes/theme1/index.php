<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access  


	include wcps_plugin_dir.'/templates/variables.php';
	include wcps_plugin_dir.'/templates/custom-css.php';
	
	$html.= '<div  class="wcps-container '.$wcps_is_mobile.' " style="background-image:url('.$wcps_bg_img.')">';
	
	include wcps_plugin_dir.'/templates/wcps-ribbon.php';
	
	$html.= '<div  id="wcps-'.$post_id.'" class="owl-carousel  wcps-'.$wcps_themes.'">';
	
	include wcps_plugin_dir.'/templates/query.php';
		
				
	
	if ( $wp_query->have_posts() ) :
	
	while ( $wp_query->have_posts() ) : $wp_query->the_post();
	
	global $product;

	$wcps_featured = get_post_meta( get_the_ID(), '_featured', true );
	
	$wcps_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $wcps_items_thumb_size );
	$wcps_thumb_url = $wcps_thumb['0'];
	
	if(empty($wcps_thumb_url)){
			$wcps_thumb_url = $wcps_items_empty_thumb;
		}

	
	
	$currency = get_woocommerce_currency_symbol();
	
	$sale_price = get_post_meta( get_the_ID(), '_sale_price', true);
	
	if($wcps_total_items_price_format=='full'){
			$price = $product->get_price_html();	
		}
	elseif($wcps_total_items_price_format=='sale'){

			$price= $currency.get_post_meta( get_the_ID(), '_sale_price', true);
		}
	elseif($wcps_total_items_price_format=='regular'){
			$price = $currency.get_post_meta( get_the_ID(), '_regular_price', true);
		}
	else{
			$price = $product->get_price_html();
		}


	if($wcps_items_thumb_link_to == 'product'){
			$permalink = get_permalink();
		}
	else if($wcps_items_thumb_link_to == 'category'){
			
			if(empty($cat_link[0])){
				$permalink = get_permalink();
				}
			else{
				$permalink = $cat_link[0];
				}
		}
	else{
			$permalink = get_permalink();
		}


	$html.= '<div class="wcps-items" >';
	
	foreach($wcps_grid_items as $item_key=>$item){
		
		if(empty($wcps_grid_items_hide[$item_key])){
			include wcps_plugin_dir.'/templates/wcps-'.$item_key.'.php';
			}

		}

	$html.= '</div>'; // .wcps-items
	
	
	endwhile;
	wp_reset_query();
	
	else :
		$html.= __('No Product to Slide','wcps');

	endif;
	
	$html.=  '</div></div>';
	
	include wcps_plugin_dir.'/templates/scripts.php';		
