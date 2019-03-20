<?php
namespace App\Http\Controllers;
use URL;
use Input;
use Stripe;
use Session;
use App\User;
use Redirect;
use Validator;
use App\Http\Requests;
use Stripe\Error\Card;
use App\Models\College;
use App\Models\Payment;
use PDF;
use App\Models\EventStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoneySetupController extends Controller
{
	 public function paymentStripe()
	 {
		$user=Auth::user();

		$college =College::where('user_id',$user->id)->first();

		$student=$college->studentDetails();

		$count =$student->count();

		$coding =EventStudent::where([['college_id',$college->user_id],['event_id','3']])->count();

		$college->studentfee=$count*120;
	
		$college->codingfee=$coding*200;

		$college->totalfee=$college->studentfee+$college->codingfee;

		if($college->totalfee == '0'){

			session()->flash('nostudents','sucess');

			return redirect('/student');
		}
		elseif($user->payment == '1'){

			session()->flash('payment','sucess');

			return redirect('/student');

		}

	 	return view('stripe',compact('college'));
	 }
	public function postPaymentStripe(Request $request)
	 {

		$user=Auth::user();

		$college =College::where('user_id',$user->id)->first();

		$student=$college->studentDetails();

		$count =$student->count();

		$coding =EventStudent::where([['college_id',$college->id],['event_id','3']])->count();

		$college->studentfee=$count*120;

		$college->codingfee=$coding*200;

		$college->totalfee=$college->studentfee+$college->codingfee;

	 	$stripe=Stripe::setApiKey(env('STRIPE_SECRET'));

		$token = $stripe->tokens()->find($request->stripeToken);

	 	$charge = $stripe->charges()->create([

				 'card' => $token['id'],
				 'currency' => 'USD',
				 'amount' => $college->totalfee,
				 'metadata' => ['user_id' => $user->id,'student_fee' =>$college->studentfee,'codingfee' => $college->codingfee],
				 'description' => 'participants fee = '.$college->studentfee . '  coding fee = '.$college->codingfee,

			]);
		
		$payment = new Payment;

		$payment->tokenid = $token['id'];
		
		$payment->chargeid = $charge['id'];

		$payment->userid = $user->id;

		$payment->amount = $charge['amount']/100;

		$payment->save();

		$user->payment = '1';

		$user->save();
		
		$this->invoiceDownload($user,$college->studentfee,$college->codingfee);

		return redirect('/student');
		
	 }

	 public function invoiceDownload(Request $request)
	 {
		$user=Auth::user(); 
		
		if($user->payment == 0)
			return back();
			
		$college=College::where('user_id',$user->id)->first();

		$student=$college->studentDetails();

		$count =$student->count();

		$coding =EventStudent::where([['college_id',$college->id],['event_id','3']])->count();

		$studentfee=$count*120;

		$codingfee=$coding*200;

		$data = [

			'name' => $college->name,
			'phone' => $college->phone_no,
			'email' => $user->email,
			'username' =>$user->username,
			'date' =>  date('dd-mm-YY'),
			'studentfee' => $studentfee,
			'codingfee' => $codingfee		
		];
		
		$pdf = PDF::loadView('invoice',compact('data'));
		
        return $pdf->download('results.pdf'); 

	 }
}
