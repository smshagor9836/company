<?php 

namespace Amcoders\Plugin\contactform;
use Illuminate\Support\Facades\Mail;
use Amcoders\Plugin\contactform\Mail\ContactMail;
use App\Options;
class Contact 
{
	public static function send($name,$email,$subject,$message)
	{
		$data = [
			'name' => $name,
			'email' => $email,
			'subject' => $subject,
			'message' => $message
		];
		$mail=Options::where('key','system_basic_info')->first();
		$mail=json_decode($mail->value);
		Mail::to($mail->contact_email)->send(new ContactMail($data));
		return response()->json(['Mail Sent Success']);
	}
}