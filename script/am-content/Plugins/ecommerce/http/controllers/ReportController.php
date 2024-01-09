<?php 

namespace Amcoders\Plugin\ecommerce\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Options;
use Carbon\Carbon;
use DB;
/**
 * 
 */
class ReportController extends controller
{
	public function index(Request $request)
	{
		return Order::select(DB::raw('YEAR(created_at) year'),DB::raw('MONTH(created_at) month'))->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))->get();
	}	


}