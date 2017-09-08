<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 	

class class_wcps_functions  {
	
	
    public function __construct(){

		}
		
		
	public function wcps_themes($themes = array())
		{

			$themes = array(
							'theme1'=>'Theme 1',							
							'theme6'=>'Theme 6',
																	
							);
			
			foreach(apply_filters( 'wcps_themes', $themes ) as $theme_key=> $theme_name)
				{
					$theme_list[$theme_key] = $theme_name;
				}

			
			return $theme_list;

		}	
		
		
	public function wcps_themes_dir($themes_dir = array())
		{
			$main_dir = wcps_plugin_dir.'themes/';
			$themes_dir = $this->wcps_themes();

			foreach($themes_dir as $theme_key=> $theme_dir)
				{
					$theme_list_dir[$theme_key] = $main_dir.$theme_key;
				}

			return $theme_list_dir;

		}


	public function wcps_themes_url($themes_url = array())
		{
			$main_url = wcps_plugin_url.'themes/';
			$themes_url = $this->wcps_themes();			

			foreach($themes_url as $theme_key=> $theme_url)
				{
					$theme_list_url[$theme_key] = $main_url.$theme_key;
				}

			return $theme_list_url;

		}
		
		
		
		
	public function wcps_grid_items($grid_items = array()){
		
			$grid_items = array(
							'thumb'=>'Thumbnail',
							'title'=>'Title',
							'excerpt'=>'Excerpt',							
							'category'=>'Category',												
							'price'=>'Price',						
							'cart'=>'Cart',
							'sale'=>'Sale',					
							//'featured'=>'Featured',																						
							);
			return $grid_items;
		}		
		
		
		
		
		
		
		
	
}