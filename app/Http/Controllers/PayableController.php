<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Customer;
use App\Invoice;
use App\InvoiceDetails;
use App\Supplier;
use App\Payable;
use App\PayableDetails;
use Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceCreated;
use Illuminate\Support\Facades\DB;

class PayableController extends Controller
{
    /**
     * Load the Payable view page with supplier details
     * 
     * @return Response
     */
    function show(Request $request){
        $suppliers = Supplier::all();
        return view('payable')->with('suppliers',$suppliers);
    }

    /**
     * create payable using this method
     * @param Request payable details
     * 
     * @return Response 
     * 
     */
    function create(Request $request){
        // $validator = $request->validate([
        //     'name' => 'required',
        //     'mobile' => 'required',
        //     'email' => 'required',
        //     'address' => 'required'
        // ]);
        Log::info($request);
        $payable = new Payable;
        $payable->supplier=$request->supplier;
        $payable->date=date('Y-m-d');
        $payable->amount=$request->sumHidden;
        if($payable->save()){
            $count = $request->count;
            for($i=0;$i<$count;$i++){
                if($i==0){
                    $payableDetails = new PayableDetails;
                    $payableDetails->supplier = $request->supplier;
                    $payableDetails->payable = $payable->id;
                    $payableDetails->date = date('Y-m-d');
                    $payableDetails->description = $request->description;
                    $payableDetails->unit = $request->unit;
                    $payableDetails->quantity = $request->quantity;
                    $payableDetails->rate = $request->rate;
                    $payableDetails->amount = $request->amount;
                    $payableDetails->remarks = $request->remarks;
                    $payableDetails->save();
                }else{
                    $description = "description".$i;
                    $unit = "unit".$i;
                    $quantity = "quantity".$i;
                    $rate = "rate".$i;
                    $amount = "amount".$i;
                    $remarks = "remarks".$i;
                    $payableDetails = new PayableDetails;
                    $payableDetails->supplier = $request->supplier;
                    $payableDetails->payable = $payable->id;
                    $payableDetails->date = date('Y-m-d');
                    $payableDetails->description = $request->$description;
                    $payableDetails->unit = $request->$unit;
                    $payableDetails->quantity = $request->$quantity;
                    $payableDetails->rate = $request->$rate;
                    $payableDetails->amount = $request->$amount;
                    $payableDetails->remarks = $request->$remarks;
                    $payableDetails->save();
                }
                
            }
            // $payable = DB::table('payable')
            //             ->join('payableDetails', 'payable.id', '=', 'payableDetails.payable')
            //             ->join('customers', 'payable.customer', '=', 'customers.id')
            //             ->select('*')
            //             ->where('payable.id',$payable->id)
            //             ->get();
            // Mail::to("manikandan.vengatesan@gmail.com")->send(new payableCreated($payable));
            return redirect('/payable');
        }
        
    }
}
