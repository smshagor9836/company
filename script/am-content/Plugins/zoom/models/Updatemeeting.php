<?php 

namespace Amcoders\Plugin\zoom\models;
use \Firebase\JWT\JWT;

class Updatemeeting{

	
	//function to generate JWT
    private function generateJWTKey() {
        $key = env("ZOOM_API_KEY");
        $secret = env("ZOOM_API_SECRET");
        $token = array(
            "iss" => $key,
                "exp" => time() + 3600 //60 seconds as suggested
            );
        return JWT::encode( $token, $secret );
    }

    function update($data){
    	$client = new \GuzzleHttp\Client();
		 
	    $response = $client->request('PATCH', 'https://api.zoom.us/v2/meetings/'.$data['meetingid'].'', [
	        "headers" => [
				"Authorization" => "Bearer ".$this->generateJWTKey().""
			],
            'json' => [
                "topic" => $data['topic'],
                "type" => $data['type'],
                "start_time" => $data['start_date'],
                "timezone" => $data['timezone'],
                "duration" => $data['duration'], // 30 mins
                "password" => $data['password'],
                "settings" => [
                    "host_video" => $data['option_host_video'],
                    "participant_video" => $data['option_participant_video'],
                    "join_before_host" => $data['join_before_host']
                ]
            ],
	    ]);
	    $data = json_decode($response->getBody());
	    return $data;
    }
}

 