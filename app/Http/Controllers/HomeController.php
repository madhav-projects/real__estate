<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Auth;
use App\Models\Property;

class HomeController extends Controller
{
    //
    public function index(){
        if(Auth::id()){
            $usertype=Auth()->user()->usertype;

            if($usertype=='0'){
                return view ('user.index');
            }

            elseif($usertype=='1'){
                return view('admin.adminhome');
            }
            elseif($usertype=='realtron'){
                return view('realtron.realtronhome');
            }
            elseif($usertype=='agent'){
                return view('agents.agenthome');
            }
            else{
                return redirect()->back();
            }
        }
    }
    public function fetch_agent_property()
    {
    $properties=Property::All();
        // Return the fetched properties in JSON format along with a custom message
        if (request()->expectsJson()) { // Corrected to expectsJson()
            return response()->json([
                'message' => 'Properties fetched successfully',
                'properties' => $properties, // Changed from $fetch_property to $properties
            ]);
        } else {
            return view('user.buy', compact('properties')); // Assuming you have a 'properties' view for agents
        }
    }
   

    


// HomeController.php
public function all_properties($id)
{
    // Fetch the property based on its ID
    $property = Property::find($id);

    // Check if the property exists
    if ($property) {
        return view('user.allproperties', ['property' => $property]);
    } else {
        return view('user.allproperties', ['property' => null, 'message' => 'Property not found.']);
    }
}


    
    
    


    
    

// public function get_property_images($id)
// {
//     $property = Property::findOrFail($id); // Retrieve the property by ID
    
//     // Collect images into an array (assuming your property model has image1, image2, image3 fields)
//     $images = array_filter([$property->image1, $property->image2, $property->image3->images4]) ?: [];

//     return view('user.allproperties', compact('property', 'images')); // Pass images and property data to view
// }



}
