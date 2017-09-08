<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 
	
	
	if(empty($wcps_featured_icon_url)){
		$wcps_featured_style = '';
		}
	else{
		$wcps_featured_style = 'style="background: rgba(0, 0, 0, 0) url('.$wcps_featured_icon_url.') no-repeat scroll 0 0;"';
		}
	

	
	if($wcps_featured=="yes" && $wcps_featured_display == 'yes')
		{
		$html.= '<div '.$wcps_featured_style.' title="'.__('Featured Product','wcps').'" class="wcps-featured"></div>';
		}