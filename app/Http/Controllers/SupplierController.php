<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Supplier;
use Session;

class SupplierController extends Controller
{
    /**
     * Load the supplier view with existing supplier data
     * 
     * @return Response
     */
    function show(Request $request){
        $suppliers = Supplier::all();
        return view('supplier')->with('suppliers',$suppliers);
    }

    /**
     * get specific supplier data
     * 
     * @return Response
     */
    function getSupplier(Request $request,$id){
        $supplier = Supplier::find($id);
        return $supplier;
    }

    /**
     * Add supplier using this method
     * @param Request supplier details
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
        $supplier = new Supplier;
        $supplier->gst_no=$request->gst_no;
        $supplier->name=$request->name;
        $supplier->mobile=$request->mobile;
        $supplier->email=$request->email;
        $supplier->address=$request->address;
        $supplier->save();
        return redirect('/suppliers');
    }

    /**
     * edit supplier details using this method
     * @param Request supplier details
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
        $supplier = Supplier::find($request->id);
        $supplier->gst_no=$request->gst_no;
        $supplier->name=$request->name;
        $supplier->mobile=$request->mobile;
        $supplier->email=$request->email;
        $supplier->address=$request->address;
        $supplier->save();
        return redirect('/suppliers');
    }

    /**
     * delete the supplier
     * 
     * @return Response
     */
    function delete(Request $request, $id){
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect('/suppliers');
    }
}
