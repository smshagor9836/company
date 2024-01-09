<?php 
function RegisterMenu()
{
	$data[]=array(
		'position' => 'Header',
	);
	$data[]=array(
		'position' => 'footer_left',
	);
	$data[]=array(
		'position' => 'footer_right',
	);
	
	return $data;
}

function RegisterThemeOption()
{
	$data[]=array(
		'title'=>'Theme Option',
		'url'=> route('admin.theme-option.index'),
	);

	return $data;
}

function RegisterSitemap()
{
	$data[]= array(
		'url' => url('/').'/page/', 
		'type' => 1, 
	);
	$data[]= array(
		'url' => url('/').'/blog/', 
		'type' => 0, 
	);
	$data[]= array(
		'url' => url('/').'/service/', 
		'type' => 4, 
	);
	$data[]= array(
		'url' => url('/').'/product/', 
		'type' => 3, 
	);

	$static[]= array(
		'url' => url('/').'/about', 	
	);
	$static[]= array(
		'url' => url('/').'/team', 	
	);
	$static[]= array(
		'url' => url('/').'/whychoose', 	
	);
	$static[]= array(
		'url' => url('/').'/mission', 	
	);
	$static[]= array(
		'url' => url('/').'/contact', 	
	);
	$static[]= array(
		'url' => url('/').'/faq', 	
	);
	$static[]= array(
		'url' => url('/').'/shop', 	
	);
	$static[]= array(
		'url' => url('/').'/service', 	
	);
	$static[]= array(
		'url' => url('/').'/blog', 	
	);
	$static[]= array(
		'url' => url('/'), 	
	);


	$arr = array( 
		'dynamic' => $data, 
		'static' => $static, 
	);
	return $arr;
	

}



 ?>