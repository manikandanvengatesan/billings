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
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceCreated;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Load the reports
     * 
     * @return View
     */
    function reports(Request $request){
        return view('reports');
    }

    /**
     * Load the Invoice reports
     * 
     * @return Response
     */
    function invoiceReport(Request $request){
        
    }
}
