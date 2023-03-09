<?php

namespace App\Http\Controllers\pay;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Contestant;
use App\Models\Payment;
use App\Models\Vote;
class paymentController extends Controller
{
    public function payinit(Request $request){
        $res = $request->all();
        $id = $res['id'];
        $phone = '250'.$res['phone'];
        $amount = $res['vote'];
        $transactionId = Str::uuid();

        $response = Http::post("https://opay-api.oltranz.com/opay/paymentrequest",[
            "telephoneNumber" => $phone,
            "amount" => $amount,
            "organizationId" => "9b69fdf9-81ac-49db-b4ea-8a4b6a046dff",
            "description" => "Payment for Printing services",
            "callbackUrl" =>"http://localhost/payments/callback",
            "transactionId" => $transactionId,
        ]);

        if($response['code'] == 200){
          $contestant = Contestant::find($id);
          $vote = new Vote();
          $vote->VotingCode = $contestant['VotingCode'];
          $vote->TransactionId = $transactionId;
          $vote->Votes= 0;
          $vote->save();
        }
        return $response->json();
    }


    public function callbacker(Request $request){
        $payload = json_decode($request->getContent(), true);
        
        if($payload['statusCode'] == 200){
        $payment = new Payment();
        $payment->TransactionId = $payload['transactionId'];
        $payment->Amount = $payload['paidAmount'];
        $payment->Usernumber=643645634;
        $payment->save();
        
        $UUID =$payload['transactionId'];
        $votes = Vote::where('TransactionId','=',$UUID)->firstOrFail();
        $votes->Votes = $payload['paidAmount']+100;
        $votes->save();
         $checked =  "<div class='paymentLoad'  style='display:block' id='loader'>
         <div class='closeBtn'><span>X</span></div>
          <div class='circheck'>
             <i class='material-icons loaderI'>checked</i>
         </div>
     </div> ";
      return $checked;

        } else if($payload['statusCode'] == 401){
            $UUID =$payload['transactionId'];
            $votes = Vote::where('TransactionId','=',$UUID)->firstOrFail();
            $votes->delete();
            $canceled = " 
            <div class='paymentLoad' id='loaderX' style='display:block'>
            <div class='closeBtn'><span>X</span></div>
            <p class='error2'></p>
             <div class='circheckx'>
                <i class='material-icons loaderI2'>closed</i>
            </div>
        </div> ";
    
           return $canceled;
        }
        // return json_encode($votes);

    }
}









