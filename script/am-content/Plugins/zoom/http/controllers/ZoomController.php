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
class ZoomController extends controller
{
	public function index($type,$page_number)
	{
		if (!empty(env('ZOOM_API_KEY'))) {
			
		
		$get_meeting = new Getmetting();
		$get_data = $get_meeting->getmettings($type,100,$page_number);
		$data = json_encode($get_data);
		$main_data = json_decode($data,true);
		}
		 $main_data= $main_data ?? [];

		return view('plugin::zoom',compact('main_data','type'));
	}

	public function create()
	{
		return view('plugin::zoom.create');
	}

	public function view($mettingid)
	{
		$edit_meeting = new Editmetting();
		$data = $edit_meeting->edit($mettingid);
		if($data->status == 'waiting'){
			$meeting = Meeting::where('meeting_id',$mettingid)->first();
			$meeting->status = "waiting";
			$meeting->save();
			return back()->with('status','This is already finished by Host');
		}
		$password = Meeting::where('meeting_id',$mettingid)->first()->password;
		return view('plugin::zoom.host',compact('mettingid','password'));
	}

	public function host($mettingid)
	{
		$meeting = Meeting::where('meeting_id',$mettingid)->first();
		$meeting->status = "started";
		$meeting->save();
		$password = Meeting::where('meeting_id',$mettingid)->first()->password;
		return view('plugin::zoom.host',compact('mettingid','password'));
	}

	public function create_metting(Request $request)
	{
		$this->validate($request,[
			'topic' => 'required',
			'start_time' => 'required',
			'duration' => 'required',
			'timezone' => 'required',
			'user' => 'required',
			'password' => 'required|max:10'
		]);

		if($request->host_video)
		{
			$host_video = 1;
		}else{
			$host_video = 0;
		}

		if($request->participant_video)
		{
			$participant_video = 1;
		}else{
			$participant_video = 0;
		}

		if($request->join_before_host)
		{
			$join_before_host = 1;
		}else{
			$join_before_host = 0;
		}

		$zoom_meeting = new Createmetting();
	    try{
	        $z = $zoom_meeting->createAMeeting(
	            array(
	            	'topic'=> $request->topic,
	                'type'=> $request->type,
	                'start_date'=> $request->start_time,
	                'duration'=> $request->duration,
	                'timezone'=> $request->timezone,
	                'password'=> $request->password,
	                'option_host_video' => $host_video,
	                'option_participant_video' => $participant_video,
	                'join_before_host' => $join_before_host,
	            )
	        );
	        $data = json_encode($z);

	        $main_data = json_decode($data);

	        $meeting = new Meeting();
	        $meeting->title = $request->topic;
	        $meeting->meeting_id = json_encode($z->id);
	        $meeting->status = $main_data->status;
	        $meeting->host_id = $main_data->host_id;
	        if(isset($main_data->duration)){
	        	$meeting->duration = $main_data->duration;
	        }
	       	if(isset($main_data->start_time))
	       	{
	       		$meeting->start_time = $main_data->start_time;
	       	}
	        $meeting->password = $main_data->password;
	        $meeting->save();

	        foreach ($request->user as $key => $value) {
	        	User::find($value)->meeting()->attach($meeting->id);
	        }

	        return redirect()->route('zoom',['upcoming'=>"upcoming",'id'=>1]);
	    } catch (Exception $ex) {
	        echo $ex;
	    }
		
	}

	public function delete($meetingid)
	{
		$delete_mettings = new Deletemetting();
		$delete_mettings->delete($meetingid);

		$meeting = Meeting::where('meeting_id',$meetingid)->first();
		$meeting->delete();

		return redirect()->route('zoom',['upcoming'=>"upcoming",'id'=>1]);
	}

	public function edit($meetingid)
	{
	    $meeting_user = Meeting::where('meeting_id',$meetingid)->first()->users;
		$edit_meeting = new Editmetting();
		$data = $edit_meeting->edit($meetingid);
		return view('plugin::zoom.edit',compact('data','meeting_user'));
	}

	public function update(Request $request,$meetingid)
	{
		$this->validate($request,[
			'topic' => 'required',
			'start_time' => 'required',
			'duration' => 'required',
			'timezone' => 'required',
			'password' => 'required|max:10'
		]);

		if($request->host_video)
		{
			$host_video = 1;
		}else{
			$host_video = 0;
		}

		if($request->participant_video)
		{
			$participant_video = 1;
		}else{
			$participant_video = 0;
		}

		if($request->join_before_host)
		{
			$join_before_host = 1;
		}else{
			$join_before_host = 0;
		}

		$requestdata = [
			'meetingid' => $meetingid,
			'topic'=> $request->topic,
            'type'=> $request->type,
            'start_date'=> $request->start_time,
            'duration'=> $request->duration,
            'timezone'=> $request->timezone,
            'password'=> $request->password,
            'option_host_video' => $host_video,
            'option_participant_video' => $participant_video,
            'join_before_host' => $join_before_host
		];

		$update_meeting = new Updatemeeting();
		$data = $update_meeting->update($requestdata);

		if(Meeting::where('meeting_id',$meetingid)->first())
		{
			$meeting = Meeting::where('meeting_id',$meetingid)->first();
        	$meeting->title = $request->topic;
        	$meeting->status = $request->mstatus;
	        if(isset($request->duration)){
	        	$meeting->duration = $request->duration;
	        }
	       	if(isset($request->start_time))
	       	{
	       		$meeting->start_time = $request->start_time;
	       	}
	        $meeting->password = $request->password;
        	$meeting->save();
		}
		
		$meeting->users()->sync($request->user);


		return redirect()->route('zoom',['upcoming'=>"upcoming",'id'=>1]);
	}

	public function callback($id)
	{
		$meeting = Meeting::where('meeting_id',$id)->first();
		if(Auth::User()->role->id == 1)
		{
			$meeting->status = "waiting";
			$meeting->save();
			return redirect()->route('zoom',['upcoming'=>"upcoming",'id'=>1]);
		}else{
			return redirect()->route('zoom.user.index','live');
		}

	}

}