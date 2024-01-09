<?php 

namespace Amcoders\Plugin\zoom\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Token;
use App\Terms;
use Auth;
use Amcoders\Plugin\zoom\models\Createmetting;
use Amcoders\Plugin\zoom\models\Getmetting;
use Amcoders\Plugin\zoom\models\Meeting;
use Amcoders\Plugin\zoom\models\Deletemetting;
use Amcoders\Plugin\zoom\models\Editmetting;
use Amcoders\Plugin\zoom\models\Updatemeeting;
use App\User;

/**
 * 
 */
class UserController extends controller
{
	public function index($status)
	{
		$meetings = Auth::User()->meeting()->where('status',$status)->paginate(10);
		return view('plugin::user.zoom.index',compact('meetings'));
	}
}