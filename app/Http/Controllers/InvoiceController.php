<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Customer;
use App\Invoice;
use App\InvoiceDetails;
use Session;
use Illuminate\Support\Facades\Log;

class InvoiceController extends Controller
{
    /**
     * Load the Invoice view page with client details
     * 
     * @return Response
     */
    function show(Request $request){
        $customers = Customer::all();
        return view('invoice')->with('customers',$customers);
    }

    /**
     * create invoice using this method
     * @param Request invoice details
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
        $invoice = new Invoice;
        $invoice->customer=$request->client;
        $invoice->date=date('Y-m-d');
        $invoice->amount=$request->sumHidden;
        if($invoice->save()){
            $count = $request->count;
            for($i=0;$i<$count;$i++){
                if($i==0){
                    $invoiceDetails = new InvoiceDetails;
                    $invoiceDetails->customer = $request->client;
                    $invoiceDetails->invoice = $invoice->id;
                    $invoiceDetails->date = date('Y-m-d');
                    $invoiceDetails->description = $request->description;
                    $invoiceDetails->unit = $request->unit;
                    $invoiceDetails->quantity = $request->quantity;
                    $invoiceDetails->rate = $request->rate;
                    $invoiceDetails->amount = $request->amount;
                    $invoiceDetails->remarks = $request->remarks;
                    $invoiceDetails->save();
                }else{
                    $description = "description".$i;
                    $unit = "unit".$i;
                    $quantity = "quantity".$i;
                    $rate = "rate".$i;
                    $amount = "amount".$i;
                    $remarks = "remarks".$i;
                    $invoiceDetails = new InvoiceDetails;
                    $invoiceDetails->customer = $request->client;
                    $invoiceDetails->invoice = $invoice->id;
                    $invoiceDetails->date = date('Y-m-d');
                    $invoiceDetails->description = $request->$description;
                    $invoiceDetails->unit = $request->$unit;
                    $invoiceDetails->quantity = $request->$quantity;
                    $invoiceDetails->rate = $request->$rate;
                    $invoiceDetails->amount = $request->$amount;
                    $invoiceDetails->remarks = $request->$remarks;
                    $invoiceDetails->save();
                }
                
            }
            return redirect('/invoice');
        }
        
    }
}
