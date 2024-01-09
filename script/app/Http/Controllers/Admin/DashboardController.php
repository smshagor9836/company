<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Amcoders\Plugin\zoom\models\Getmetting;

class DashboardController extends Controller
{
	public function Dashboard()
	{
		$type = "upcoming";
		if (!empty(env('ZOOM_API_KEY'))) {
			$get_meeting = new Getmetting();
			$get_data = $get_meeting->getmettings($type,100,1);
			$data = json_encode($get_data);
			$main_data = json_decode($data,true);
		}

		$main_data = $main_data  ?? [];

		return view('admin.dashboard',compact('main_data','type'));
	}
}
