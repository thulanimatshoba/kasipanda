<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit; // if direct access  


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
	
	if(empty($wcps_thumb_url))
		{
			$wcps_thumb_url = $wcps_items_empty_thumb;
		}

	
	
	$currency = get_woocommerce_currency_symbol();
	
	$sale_price = get_post_meta( get_the_ID(), '_sale_price', true);
	
	if($wcps_total_items_price_format=='full')
		{
			$price = $product->get_price_html();	
		}
	elseif($wcps_total_items_price_format=='sale')
		{

			$price= $currency.get_post_meta( get_the_ID(), '_sale_price', true);
		}
	elseif($wcps_total_items_price_format=='regular')
		{

			$price = $currency.get_post_meta( get_the_ID(), '_regular_price', true);

		}
	else
		{
			$price = $product->get_price_html();
		}

	
	
	
	
	
	$product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );
	$cat_link = array();
	$cat_name = array();

		
	foreach($product_cats as $key => $cat)
		{
		
		$cat_link[] = get_term_link( $cat->term_id, 'product_cat' );					
		$cat_name[] = $cat->name;
			

		}




	if($wcps_items_thumb_link_to == 'product')
		{
			$permalink = get_permalink();
		}
	else if($wcps_items_thumb_link_to == 'category')
		{
			
			if(empty($cat_link[0]))
				{
				$permalink = get_permalink();
				}
			else
				{
				$permalink = $cat_link[0];
				}
				
			
			
		}
	else
		{
			$permalink = get_permalink();
		}



	
	$html.= '<div class="wcps-items" >';
	$html.= '<div style="max-height:'.$wcps_items_thumb_max_hieght.';" class="wcps-items-thumb"><a href="'.$permalink.'"><img alt="'.get_the_title().'" src="'.$wcps_thumb_url.'" /></a>';
	
	include wcps_plugin_dir.'/templates/wcps-featured.php';	
	include wcps_plugin_dir.'/templates/wcps-sale.php';			

		
	$html.= '</div>';
	
	$html.= '<div class="items-info">';
			
		if(!empty($cat_name[0]) && $wcps_cat_display == 'yes')
			$html.= '<div class="wcps-terms"><a href="'.$cat_link[0].'">'.$cat_name[0].'</a></div>';
			
			if($wcps_items_title_display == 'yes') include wcps_plugin_dir.'/templates/wcps-title.php';		
			if($wcps_items_price_display == 'yes') include wcps_plugin_dir.'/templates/wcps-price.php';
			if ( $wcps_ratings_display == 'yes' ) include wcps_plugin_dir.'/templates/wcps-ratings.php';
			if($wcps_cart_display == 'yes') include wcps_plugin_dir.'/templates/wcps-cart.php';
				
			$html.= '</div>
		</div>';
	
	endwhile;
	wp_reset_query();
	
	else :
		$html.= __('No Product to Slide','wcps');

	endif;
	
	$html.=  '</div></div>';
	
	include wcps_plugin_dir.'/templates/scripts.php';		
