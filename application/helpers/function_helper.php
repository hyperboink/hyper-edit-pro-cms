<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('pre')){

	function pre($data = ''){

		echo '<pre>';
		print_r($data);
		echo '</pre>';
		die();
	}   

}

if(!function_exists('print_multi')){

	function pre_multi($data = ''){
		$fn_arguments = '';

		foreach(func_get_args() as $fn_argument){
			
			$fn_arguments .= ' '.$fn_argument;
		}

		echo '<pre>';
		print_r($fn_arguments);
		echo '</pre>';
		die();
	}   

}

if(!function_exists('str_replace_first')){

	function str_replace_first($search, $replace, $subject){

		$pos = strpos($subject, $search);

		if ($pos !== false) {
			return substr_replace($subject, $replace, $pos, strlen($search));
		}

		return $subject;
	}   

}

if(!function_exists('dateFormat')){
	function dateFormat($date = null, $format = 'm/d/Y h:iA'){
		return date($format, strtotime($date));
	}
}

if(!function_exists('menu')){
	function menu($array){
		echo '<ol class="dd-list">';
		foreach($array as $key => $arr){
			echo '<li class="dd-item'.($arr['type'] == 'custom' ? ' custom-menu-item' : '').'" data-type="'.$arr['type'].'" data-id="'.$arr['id'].'" data-name="'.($arr['id'] == 'custom' ? 'custom' : $arr['slug']).'-'.$arr['id'].'" data-title="'.$arr['title'].'" data-slug="'.$arr['slug'].'">';

			echo '<div class="dd-handle"><div class="dd-handle-text">'.$arr['title'].'</div></div>';

			if($arr['type'] == 'custom'){
				echo '<div class="menu-action"><i class="fa fa-pencil-square-o edit-custom-menu" aria-hidden="true"></i><span class="remove-menu">X</span><div class="edit-menu-fields" style="display: none;"><input type="text" class="edit-custom-title" placeholder="Type Title here..."><input type="text" class="edit-custom-link" placeholder="Type link here..."></div></div>';
			}

			if(isset($arr['children']) && count($arr['children'])){
				menu($arr['children']);
			}

			echo '</li>';
		}
		echo '</ol>';
	}
}

if(!function_exists('display_menu_item')){

	function display_menu_item($array, $index){

		$i = $index;
		
		foreach($array as $key => $arr){

			echo '<li class="nav-item'.(isset($arr['children']) && count($arr['children']) ? ' parent parent-'.$i : '').'">';
				echo '<a href="'.($arr['type'] == 'custom' ? '' : base_url()). $arr['slug'].'">' .$arr['title']. '</a>';
				
				if(isset($arr['children']) && count($arr['children'])){
					echo '<span class="expand expand-'.$i.'"></span>';
					
					echo '<ul class="sub-level clear child child-'.$i.'">';
					$i++;
					display_menu_item($arr['children'], $i);
					echo '</ul>';
				}
			echo '</li>';

		}

	}
}

if(!function_exists('display_menu')){
	function display_menu($array){
		$index = 1;
		echo '<ul class="nav clear">';
		display_menu_item($array, $index);
		echo '</ul>';

	}
}

if(!function_exists('array_keyval_exists')){
	function array_keyval_exists($array, $key, $val) {

		foreach($array as $item){
			if(isset($item[$key]) && $item[$key] == $val) return true;
		}

		return false;
	}
}

if(!function_exists('filter_data')){
	function filter_data($array, $key, $val) {
		return array_filter($array, function ($var) use ($key, $val){
			return ($var[$key] == $val);
		});
	}
}


if(!function_exists('get_from_last_uri_segment')){
	function get_from_last_uri_segment($obj, $segment = 0)
	{
		$total_segments = $obj->uri->total_segments() - $segment;
		return $obj->uri->segment($total_segments);
	}
}

if(!function_exists('image_data')){

	function image_data($source){
		$reversed = explode('.', $source, 2);
		$name = $reversed[0];
		$ext = $reversed[1];

		return [
			'filename' => $source,
			'name' => $reversed[0],
			'ext' => $reversed[1]
		];
	}

} 

if(!function_exists('remove_image')){

	function remove_image($image){

		if($image){
			$image_data = image_data($image);
			
			unlink("uploads/" . $image);
			unlink("uploads/" . $image_data['name'] . '-200x200.' . $image_data['ext']);
		}
	}

}

if(!function_exists('is_meta_tags')){

	function is_meta_tags($string){

		if(strstr($string, 'Meta')){
			return true;
		}

		return false;
		
	}

}

if(!function_exists('get_all_by_keys')){
	function get_all_by_keys($ar, $key) { 
				
		$keys = [];

		array_walk_recursive($ar, function ($value, $k) use (&$keys, $key){
			if($key == $k){
				$keys[] = $value;
			}
		   
		}, $keys);

		return $keys;
	}

}

if(!function_exists('get_all_keys')){
	function get_all_keys($ar) { 

	   foreach($ar as $k => $v) { 
			$keys[] = $k; 
			if (is_array($ar[$k])) 
				$keys = array_merge($keys, get_all_keys($ar[$k])); 
		}

		return $keys; 
	} 
}

if(!function_exists('count_by_keys')){
	function count_by_keys($array, $key) { 
		$keys = array_filter(get_all_keys($array), function($value) use ($key) {
			return $value && $value == $key;
		});

		return count($keys);
	} 
}







