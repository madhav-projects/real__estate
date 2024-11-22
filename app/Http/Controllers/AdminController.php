<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Realtron;
use App\Models\Agent;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // Fetch Realtron details
    public function realtrondetails() {
        $realtron = Realtron::all();
        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Realtron fetched',
                'realtron' => $realtron,
            ]);
        } else {
            return view('admin.realtrondetails', compact('realtron'));
        }
    }

    // View properties
    public function view_properties() {
        $view_properties = Agent::all();
        $companies = Realtron::all();

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Properties fetched successfully',
                'data' => $view_properties,
            ]);
        } else {
            return view('agents.properties', compact('view_properties', 'companies'));
        }
    }

    // Add property
    public function addproperty(Request $request) {
        $validator = Validator::make($request->all(), [
            'agent_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'property_type' => 'required|string|max:255',
            'selling_type' => 'required|string|max:255',
            'bhk' => 'required|string|max:255',
            'bedroom' => 'required|string|max:255',
            'bathroom' => 'required|string|max:255',
            'kitchen' => 'required|string|max:255',
            'balcony' => 'required|string|max:255',
            'hall' => 'required|string|max:255',
            'floor' => 'required|string|max:255',
            'total_floor' => 'required|string|max:255',
            'area_size' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $property = new Property();
        $property->agent_name = $request->agent_name;
        $property->company_name = $request->company_name;
        $property->property_type = $request->property_type;
        $property->selling_type = $request->selling_type;
        $property->bhk = $request->bhk;
        $property->bedroom = $request->bedroom;
        $property->bathroom = $request->bathroom;
        $property->kitchen = $request->kitchen;
        $property->balcony = $request->balcony;
        $property->hall = $request->hall;
        $property->floor = $request->floor;
        $property->total_floor = $request->total_floor;
        $property->area_size = $request->area_size;
        $property->city = $request->city;
        $property->state = $request->state;
        $property->price = $request->price;
        $property->address = $request->address;
        $property->status = $request->status;

        // Handling image uploads
        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $imageName1 = uniqid().'.'.$image1->getClientOriginalExtension();
            $image1->move(public_path('properties'), $imageName1);
            $property->image1 = 'properties/'.$imageName1;
        }

        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $imageName2 = uniqid().'.'.$image2->getClientOriginalExtension();
            $image2->move(public_path('properties'), $imageName2);
            $property->image2 = 'properties/'.$imageName2;
        }

        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $imageName3 = uniqid().'.'.$image3->getClientOriginalExtension();
            $image3->move(public_path('properties'), $imageName3);
            $property->image3 = 'properties/'.$imageName3;
        }

        if ($request->hasFile('image4')) {
            $image4 = $request->file('image4');
            $imageName4 = uniqid().'.'.$image4->getClientOriginalExtension();
            $image4->move(public_path('properties'), $imageName4);
            $property->image4 = 'properties/'.$imageName4;
        }

        $property->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Property added successfully',
            'data' => $property
        ], 201);
    }

    // Show properties belonging to logged-in agent
    public function show_properties() {
        $user = auth()->user();
        $property = Property::where('agent_name', $user->name)->get();

        if (request()->expectsJson()) {
            return response()->json([
                'message' => 'Properties fetched successfully',
                'property' => $property,
            ]);
        } else {
            return view('agents.showproperty', compact('property'));
        }
    }

   
     public function agentdetails() {
        $agentdetails = Agent::all();
        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Agent fetched',
                'agentdetails' => $agentdetails,
            ]);
        } else {
            return view('admin.agentdetails', compact('agentdetails'));
        }
    }


    public function properties() {
        $propertydetails = property::all();
        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'property fetched',
                'propertydetails' => $propertydetails,
            ]);
        } else {
            return view('admin.properties', compact('propertydetails'));
        }
    }


}
