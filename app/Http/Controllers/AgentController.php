<?php

namespace App\Http\Controllers;

use App\Models\Assigntask;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Property;
use App\Models\Contact;
use App\Models\Generate;
use Illuminate\Support\Facades\Validator; // Import the Validator facade
use Auth;

class AgentController extends Controller
{
    public function selecttype()
    {
        return view('admin.selecttype');
    }

    public function addcategory(Request $request)
    {
        // Validate the request data

        $validatedData = $request->validate([
            'category' => 'required|string|max:255',
        ]);

        // Create the category
        $category = new Category;

        $category->category_name = $validatedData['category'];
        $category->save();

        // Return a JSON response indicating success
        return response()->json([
            'success' => true,
            'message' => 'Category created successfully.',
            'data' => $category
        ], 201);
    }

    public function showcategory()
    {
        // Assuming you're using Laravel Eloquent ORM

        // Fetch all categories from the 'categories' table
        $categories = Category::all();

        // Return the fetched categories in JSON format along with a custom message
        return response()->json([
            'message' => 'Categories fetched successfully',
            'categories' => $categories,
        ]);
    }


    //write detele code here

    public function deletecategory($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return response()->json([
                'success' => 200,
                'message' => 'category delete successfully'
            ]);
        } else {
            return response()->json([
                'success' => 404,
                'message' => 'No Category Found'
            ]);
        }
    }

    public function view_properties()
    {
        $property = Property::all();
        return view('admin.properties', compact('property'));
    }

    public function addproperty(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
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

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        // If validation passes, proceed to store the property data
        $property = new Property();
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
        $property->address = $request->address;
        $property->status = $request->status;
        $property->price = $request->price;


        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $imageName1 = time() . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('properties'), $imageName1);
            $property->image1 = 'properties/' . $imageName1;
        }

        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $imageName2 = time() . '.' . $image2->getClientOriginalExtension();
            $image2->move(public_path('properties'), $imageName2);
            $property->image2 = 'properties/' . $imageName2;
        }

        // Handling image uploads
        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $imageName3 = time() . '.' . $image3->getClientOriginalExtension();
            $image3->move(public_path('properties'), $imageName3);
            $property->image3 = 'properties/' . $imageName3;
        }

        if ($request->hasFile('image4')) {
            $image4 = $request->file('image4');
            $imageName4 = time() . '.' . $image4->getClientOriginalExtension();
            $image4->move(public_path('properties'), $imageName2);
            $property->image4 = 'properties/' . $imageName4;
        }



        // Saving the floor plans


        // Save the property
        $property->save();

        // Return success response
        return response()->json([
            'status' => 'success',
            'message' => 'Property added successfully',
            'data' => $property
        ], 201);
    }

    public function show_properties()
    {

        $property = property::all();

        // Return the fetched categories in JSON format along with a custom message
        if (request()->expectsjson()) {
            return response()->json([
                'message' => 'Properties fetched successfully',
                'property' => $property,
            ]);
        } else {
            return view('admin.showproperty', compact('property'));
        }
    }

 

   public function editProperty($id)
{
    $property = Property::findOrFail($id);
    return view('agents.editproperty', compact('property'));
}

public function update(Request $request, $id)
{
    // Validate request
    $request->validate([
        'property_type' => 'required|string',
        'selling_type' => 'required|string',
        'address' => 'required|string',
        'status' => 'required|string|in:Available,Soldout', // Add validation for status
        'city' => 'required|string',
        'price' => 'nullable|numeric'
    ]);

    // Find the property and update it
    $property = Property::find($id);
    if (!$property) {
        return response()->json(['success' => false, 'message' => 'Property not found'], 404);
    }

    // Assign updated values to the property model
    $property->property_type = $request->property_type;
    $property->selling_type = $request->selling_type;
    $property->address = $request->address;
    $property->status = $request->status; // Add status field
    $property->city = $request->city;
    $property->price = $request->price;

    // Save and respond
    if ($property->save()) {
        return response()->json(['success' => true, 'message' => 'Property updated successfully!']);
    } else {
        return response()->json(['success' => false, 'message' => 'Failed to update property.']);
    }
}



    


    public function fetchtask()
    {
        $user = Auth::user(); // Get the authenticated user
        $assigntask = Assigntask::where('agent_name', $user->name)->get(); // Fetch assigned tasks
        // return response()->json($assigntask);

        // Return the fetched categories in JSON format along with a custom message
        if (request()->expectsjson()) {
            return response()->json([
                'message' => 'Properties fetched successfully',
                'assigntask' => $assigntask,
            ]);
        } else {
            return view('agents.task', compact('assigntask'));
        }

    }
    public function showContactPage()
    {
        return view('user.user_contact'); // Ensure this view is created in resources/views
    }

    /**
     * Handle the contact form submission.
     */
    public function sendAgentMessage(Request $request)
{
    // Validate form data
    $request->validate([
        'user_name' => 'required|string|max:255',
        'user_phone' => 'required|string|max:20',
        'user_address' => 'required|string',
        'agent_name' => 'required|string|max:255',
        'agent_phone' => 'required|string|max:20',
        'message' => 'required|string',
    ]);

    // Save data to the database
    $contact = new Contact();
    $contact->user_name = $request->user_name;
    $contact->user_phone = $request->user_phone;
    $contact->user_address = $request->user_address;
    $contact->agent_name = $request->agent_name;
    $contact->agent_phone = $request->agent_phone;
    $contact->message = $request->message;
    $contact->save();

    // Respond with JSON
    return response()->json(['status' => 'success', 'message' => 'Your message has been sent to the agent!']);
}

public function showGeneratePage($id)
{
    $property = Property::findOrFail($id);
    return view('agents.generate', compact('property'));
}

// PropertyController.php
// PropertyController.phppublic function saveProperty(Request $request)
public function saveProperty(Request $request)
{
    // Create a new instance of Generate
    $property = new Generate();

    // Retrieve data from the request
    $property->company_name = $request->input('company_name');
    $property->agent_name = $request->input('agent_name');
    $property->price = $request->input('price');
    $property->admin_share = $request->input('admin_share');
    $property->company_share = $request->input('company_share');
    $property->agent_share = $request->input('agent_share');
    $property->user_share = $request->input('user_share');

    // Assign foreign keys
    $property->user_id = auth()->id(); // Assuming the user is logged in
    $property->company_id = $request->input('company_id');
    $property->agent_id = $request->input('agent_id');
    $property->admin_id = $request->input('admin_id');

    // Save to the database and send response
    if ($property->save()) {
        return response()->json(['message' => 'Property details saved successfully!']);
    } else {
        return response()->json(['message' => 'Error saving property details. Please try again.'], 500);
    }
}


}
