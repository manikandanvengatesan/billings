<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Customer;
use App\Invoice;
use Session;

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
}
