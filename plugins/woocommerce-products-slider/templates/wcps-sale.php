<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 
	
	if(empty($wcps_sale_icon_url)){
		$wcps_sale_style = '';
		}
	else{
		$wcps_sale_style = 'style="background: rgba(0, 0, 0, 0) url('.$wcps_sale_icon_url.') no-repeat scroll 0 0;"';
		}
	
	if(!empty($sale_price) && $wcps_sale_display == 'yes')
		{
		$html.= '<div '.$wcps_sale_style.' title="'.__('Sale Product','wcps').'" class="wcps-items-sale wcps-sale"></div>';
		}