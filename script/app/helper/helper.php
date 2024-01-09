<?php
use App\Terms;
use App\Options;
use Amcoders\Lpress\Lphelper;

/*
replace image name via $name from $url
*/
function ImageSize($url,$name){
	$img_arr=explode('.', $url);
	$ext='.'.end($img_arr);
	$newName=str_replace($ext, $name.$ext, $url);
	return $newName;
}


 /**
 * genarate frontend menu.
 *
 * @param $position=menu position
 * @param $ul=ul class
 * @param $li=li class
 * @param $a=a class
 * @param $icon= position left/right
 * @param $lang= translate true or false
 */

function Menu($position,$ul='',$li='',$a='',$icon_position='top',$lang=false)
{
	return Lphelper::Menu($position,$ul,$li,$a,$icon_position,$lang);
}	

function ConfigCategory($type,$select = ''){
	return Lphelper::ConfigCategory($type,$select);  
	
}
/*
return total active language
*/
function adminLang($c='')
{
	return Lphelper::AdminLang($c);
}

function disquscomment()
{
	return Lphelper::Disqus();	 	
}

/*
return options value
*/
function LpOption($key,$array=false,$translate=false){
	if ($translate == true) {
		$data=Options::where('key',$key)->where('lang',Session::get('locale'))->select('value')->first();
		if (empty($data)) {
			$data=Options::where('key',$key)->select('value')->first();
			
		}
	}
	else{
		$data=Options::where('key',$key)->select('value')->first();
	}

	if ($array==true) {
		return json_decode($data->value,true);
	}
	return json_decode($data->value);
}

function Livechat($param)
{
	return Lphelper::TwkChat($param);  	
}




/*
return posts array
*/
function LpPosts($arr){
	
	$type=$arr['type'];
	$relation=$arr['with'] ?? '';
	$order=$arr['order'] ?? 'DESC';
	$limit=$arr['limit'] ?? null;
	$lang=$arr['translate'] ?? true;

	if (!empty($relation)) {
		if (empty($limit)) {
			if ($lang==true) {
				$data=Terms::with($relation)->where('type',$type)->where('status',1)->orderBy('id',$order)->where('lang',Session::get('locale'))->get();
				
			}
			else{
				$data=Terms::with($relation)->where('type',$type)->where('status',1)->orderBy('id',$order)->where('lang','en')->get();
			}
			
		}
		else{
			if ($lang==true) {
				$data=Terms::with($relation)->where('type',$type)->where('status',1)->where('lang',Session::get('locale'))->orderBy('id',$order)->paginate($limit);
			}
			else{
				$data=Terms::with($relation)->where('type',$type)->where('status',1)->where('lang','en')->orderBy('id',$order)->paginate($limit);
			}
			
		}

	}
	else{
		if (empty($limit)) {
			if ($lang==true) {
				$data=Terms::where('type',$type)->where('status',1)->where('lang',Session::get('locale'))->orderBy('id',$order)->get();
			}		
			else {
				$data=Terms::where('type',$type)->where('status',1)->where('lang','en')->orderBy('id',$order)->get();

			}


		}
		else{
			if ($lang==true) {
				$data=Terms::where('type',$type)->where('status',1)->where('lang',Session::get('locale'))->orderBy('id',$order)->paginate($limit);
			}
			else {
				$data=Terms::where('type',$type)->where('status',1)->where('lang','en')->orderBy('id',$order)->paginate($limit);


			}

		}
	}

	return $data;
}



/*
return admin category
*/

function  AdminCategory($type)
{
	 return Lphelper::LPAdminCategory($type);  
}

/*
return category selected
*/

function AdminCategoryUpdate($type,$arr = []){
	 return Lphelper::LPAdminCategoryUpdate($type,$arr);
}



function theme_asset($path)
{
	return asset('script/am-content/Themes/'.$path);
}


function content($main_id,$id,$get_id=null)
{

	$theme_json_file_get = file_get_contents( base_path().'/am-content/Themes/theme.json');
	$themes = json_decode($theme_json_file_get, true);
	foreach ($themes as $theme) {
		if ($theme['status'] == 'active') {
			$active_theme = $theme['Text Domain'];
		}
	}

	$customizer = App\Customaizer::where([
		['key', $main_id],
		['theme_name', $active_theme],
	])->first();

	if ($customizer) {
		$main_value = json_decode($customizer->value);

		if ($get_id == null) {
			$check_id = json_decode($customizer->value);
			if (isset($check_id->settings->$id)) {

				if (Session::has('locale')) {
					if(Session::get('locale') == 'en'){
						if ($customizer->status == 0) {
							$value = json_decode($customizer->value);
							return $value->settings->$id->old_value;
						}else{
							$value = json_decode($customizer->value);
							return $value->settings->$id->new_value;
						}
					}else{
						if (file_exists(base_path().'/resources/lang/'.Session::get('locale').'.json')) {
						$lang_file = file_get_contents( base_path().'/resources/lang/'.Session::get('locale').'.json');
							
						}
						else{
						$lang_file = file_get_contents( base_path().'/resources/lang/en.json');

						}
						$lang_data = json_decode($lang_file);

						if (isset($lang_data->$id)) {
							return $lang_data->$id;
						}
					}
				}

				if ($customizer->status == 0) {
					$value = json_decode($customizer->value);
					return $value->settings->$id->old_value;
				}else{
					$value = json_decode($customizer->value);
					return $value->settings->$id->new_value;
				}

			}
		}


		if ($get_id != null) {
			$check_get_id  = json_decode($customizer->value);
			if (isset($check_get_id->content->$get_id->$id)) {

				if (Session::has('locale')) {
					if(Session::get('locale') == 'en')
					{
						if ($customizer->status == 0) {
							$value = json_decode($customizer->value);
							return $value->content->$get_id->$id->old_value;
						}else{
							$value = json_decode($customizer->value);
							return $value->content->$get_id->$id->new_value;
						}
					}else{
						if (file_exists(base_path().'/resources/lang/'.Session::get('locale').'.json')) {
						$lang_file = file_get_contents( base_path().'/resources/lang/'.Session::get('locale').'.json');
						}
						else{
						$lang_file = file_get_contents( base_path().'/resources/lang/en.json');

						}
						$lang_data = json_decode($lang_file);

						if (isset($lang_data->$id)) {
							return $lang_data->$id;
						}
					}

				}

				if ($customizer->status == 0) {
					$value = json_decode($customizer->value);
					return $value->content->$get_id->$id->old_value;
				}else{
					$value = json_decode($customizer->value);
					return $value->content->$get_id->$id->new_value;
				}

			}

		}
	}

	
}



function GetThemeRoot()
{
	$file = file_get_contents( base_path().'/am-content/Themes/theme.json');
	$themes = json_decode($file, true);
	foreach ($themes as $theme) {
		if ($theme['status'] == 'active') {
			$customaizer_file = file_get_contents( base_path().'/am-content/Themes/'.$theme['Text Domain'].'/customaizer.json');
			$active_theme = json_decode($customaizer_file,true);
			foreach ($active_theme as $key => $value) {
				if ($value['status'] == 'active') {
					$root = base_path().'/am-content/Themes/'.$theme['Text Domain'].'/';
					break;

				}
			}
		}
	}

	$dir= $root ?? "lp";

	return $dir;
}


function put($content,$root)
{
	$content=file_get_contents($content);
	File::put($root,$content);
}

