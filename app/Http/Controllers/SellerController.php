<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realtron; // Assuming Realtron is your model's name
use App\Models\Seller;
use App\Models\Allproperty;
use Illuminate\Support\Facades\Session; 
class SellerController extends Controller
{
    public function viewseller(Request $request)
    {
        $realtron = Realtron::where('status','accepted')->get(); // Retrieve all records based on accepted status
        
        // Check if the request expects a JSON response
        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'data' => $realtron
            ], 200);
        }
        
        // Otherwise, return the view
        return view('user.seller', compact('realtron'));
    }

    public function sellercontact($id){

        $seller = Realtron::find($id);
        return  view('user.seller_contact',compact('seller'));
    }

    public function createseller(Request $request)
    {
       $request->validate([
        'username'=> 'required|string|max:255',
        'email'=> 'required|email|max:255',
        'phone'=>'required|string|max:10',
        'company_name'=>'required|string|max:255',
        'address'=>'required|string|max:255',
        'property_address'=> 'required|string|max:255',
        'property_image'=>'required|image|mimes:jpg,png,svg|max:2048',
        'property_type'=>'required|string|max:255',

       ]);


       $realtron = Realtron::where('realtron_company', $request->company_name)->first(); //here based on company name
       //reatron id will be fetch in seller table

       $sellerdetails = new Seller();
       $sellerdetails->realtron_id = $realtron->id;
       $sellerdetails->username = $request->username;
       $sellerdetails->email = $request->email;
       $sellerdetails->phone = $request->phone;
       $sellerdetails->company_name = $request->company_name;
       $sellerdetails->address = $request->address;
       $sellerdetails->property_address = $request->property_address;
       $sellerdetails->property_type = $request->property_type;

       if ($request->hasFile('property_image')) {
        $profileImage = $request->file('property_image');
        $profileImageName = time() . '.' . $profileImage->getClientOriginalExtension();
        $profileImage->move(public_path('properties'), $profileImageName);
        $sellerdetails->property_image = 'properties/' . $profileImageName;
        }

        $sellerdetails->save();

        return response()->json([
            'status'=> 'success',
            'message'=> 'user request sent to company',
            'sellerdetails' => $sellerdetails,
        ],200);

    }
   
   
    public function allproperty($id){

        $seller = Realtron::find($id);
        return  view('user.all_property',compact('allproperty'));
    }


}