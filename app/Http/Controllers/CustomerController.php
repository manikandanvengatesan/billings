<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Customer;
use Session;

class CustomerController extends Controller
{
    /**
     * Load the customer view with existing customer data
     * 
     * @return Response
     */
    function show(Request $request){
        $customers = Customer::all();
        return view('customer')->with('customers',$customers);
    }

    /**
     * Add customer using this method
     * @param Request customer details
     * 
     * @return Response 
     * 
     */
    function create(Request $request){
        $validator = $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        $customer = new Customer;
        $customer->title=$request->title;
        $customer->name=$request->name;
        $customer->mobile=$request->mobile;
        $customer->email=$request->email;
        $customer->address=$request->address;
        $customer->save();
        return redirect('/customers');
    }

    /**
     * edit customer details using this method
     * @param Request customer details
     * 
     * @return Response 
     * 
     */
    function update(Request $request){
        $validator = $request->validate([
            'id' =>'required',
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        $customer = Customer::find($request->id);
        $customer->title=$request->title;
        $customer->name=$request->name;
        $customer->mobile=$request->mobile;
        $customer->email=$request->email;
        $customer->address=$request->address;
        $customer->save();
        return redirect('/customers');
    }

    /**
     * delete the customer
     * 
     * @return Response
     */
    function delete(Request $request, $id){
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('/customers');
    }
}
