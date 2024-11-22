<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realtron;
use App\Models\User;
use App\Models\Agent;
use App\Models\property;
use App\Models\Seller;
use App\Models\Assigntask;
use Illuminate\Support\Facades\Session; // Include the Agent model
use Validator;

class RealtronController extends Controller
{
    public function viewregister(Request $request)
    {
        $realtron = Realtron::all(); // Retrieve all records
    
        // Check if the request expects a JSON response
        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'data' => $realtron
            ], 200);
        }
    
        // Otherwise, return the view
        return view('register.agentregistration', compact('realtron'));
    }

    public function createRegister(Request $request)
{
    // Validate request data
    $request->validate([
        'username' => 'required|string|max:255',
        'realtron_company' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'email' => 'required|email|max:255',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'area' => 'required|string|max:255',
        'pincode' => 'required|string|max:255',
        'bussiness_phone'=>'required|string|max:15',
        'age_of_company' => 'required|string|max:255',
        'password' => 'required|string|min:8',
        'profile' => 'required|image|mimes:jpg,png,svg|max:2048', // Validate image: jpg, png, svg format, max 2MB
        'upload_file' => 'required|file|mimes:pdf|max:2048',
        // Validate file: PDF format, max 2MB
    ]);

    // Create new Realtron instance and save other data
    $realtron = new Realtron();
    $realtron->username = $request->username;
    $realtron->realtron_company = $request->realtron_company;
    $realtron->phone = $request->phone;
    $realtron->email = $request->email;
    $realtron->address = $request->address;
    $realtron->city = $request->city;
    $realtron->area = $request->area;
    $realtron->pincode = $request->pincode;
    $realtron->bussiness_phone = $request->bussiness_phone; 
    $realtron->age_of_company = $request->age_of_company;
    $realtron->password = $request->password;
    $realtron->status = 'pending'; 
    // Encrypt password before saving

    // Handle profile image upload
    if ($request->hasFile('profile')) {
        $profileImage = $request->file('profile');
        $profileImageName = time() . '.' . $profileImage->getClientOriginalExtension();
        $profileImage->move(public_path('profiles'), $profileImageName);
        $realtron->profile = 'profiles/' . $profileImageName;
    }

    // Handle file upload
    if ($request->hasFile('upload_file')) {
        $upload_file = $request->file('upload_file');
        $fileName = time() . '.' . $upload_file->getClientOriginalExtension();
        $upload_file->move(public_path('upload'), $fileName);
        $realtron->upload_file = 'upload/' . $fileName;
    }

    // Save the Realtron instance
    $realtron->save();

    // Return success response
    return response()->json([
        'status' => 'success',
        'message' => 'Realtron registered successfully',
        'realtron' => $realtron
    ], 201);
}


public function createagentregister(Request $request)
{
    // Validate request data for Agent registration
    $request->validate([
        // Validate realtron_company input
        'username' => 'required|string|max:255',
        'agent_company' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'email' => 'required|email|max:255',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'area' => 'required|string|max:255',
        'pincode' => 'required|string|max:255',
        'password' => 'required|string|min:8',
        'profile' => 'required|image|mimes:jpg,png,svg|max:2048', // Validate image: jpg, png, svg format, max 2MB
    ]);

    // Retrieve the Realtron instance based on realtron_company
    $realtron = Realtron::where('realtron_company', $request->agent_company)->first();//reatron and agent company ah
    //fiest join panren atha kela realtron oda id ah agent la vara reatron id la fix panren

    // Check if Realtron exists
    if (!$realtron) {
        return response()->json([
            'status' => 'error',
            'message' => 'Realtron not found for the selected company name.'
        ], 404);
    }

    // Create new Agent instance and save other data
    $agent = new Agent();
    $agent->realtron_id = $realtron->id; // Assign realtron_id from fetched Realtron instance
    $agent->username = $request->username;
    $agent->agent_company = $request->agent_company;
    $agent->phone = $request->phone;
    $agent->email = $request->email;
    $agent->address = $request->address;
    $agent->city = $request->city;
    $agent->area = $request->area;
    $agent->pincode = $request->pincode;
    $agent->password = $request->password; // Ensure to encrypt the password
    $agent->status = 'pending'; 

    // Handle profile image upload
    if ($request->hasFile('profile')) {
        $profileImage = $request->file('profile');
        $profileImageName = time() . '.' . $profileImage->getClientOriginalExtension();
        $profileImage->move(public_path('profiles'), $profileImageName);
        $agent->profile = 'images/' . $profileImageName;
    }

    // Save the Agent instance
    $agent->save();

    // Return success response
    return response()->json([
        'status' => 'success',
        'message' => 'Agent registered successfully',
        'agent' => $agent
    ], 201);
}

public function showagent(Request $request)
{
    // Get the logged-in user's ID from the session
    $loggedInUserId = Session::get('realtron_id');

    // Fetch agents where realtron_id matches the logged-in user's ID
    $agent = Agent::where('realtron_id', $loggedInUserId)->get();

    // Check if the request expects a JSON response
    if ($request->expectsJson()) {
        return response()->json([
            'success' => true,
            'message' => 'Agent fetched',
            'agent' => $agent,
        ]);
    } else {
        return view('realtron.agentdetails', compact('agent'));
    }
}

public function Approve_detail(Request $request, $id)
{
    try {
        // Fetch the Realtron by ID
        $realtron = Realtron::find($id);
        
        if (!$realtron) {
            return response()->json(['success' => false, 'message' => 'Realtron not found.'], 404);
        }

        // Update the status
        $realtron->status = 'accepted';
        $realtron->save();
        
        // Fetch necessary data from Realtron instance
        
        $username = $realtron->username;
        $email = $realtron->email;
        $phone = $realtron->phone;
        $password = $realtron->password;
        $role = 'realtron';
        
        // Check if the user with the same email already exists
        if (User::where('email', $email)->exists()) {
            return response()->json(['success' => false, 'message' => 'Email already exists in the system.'], 400);
        }
        
        // Create a new user in the users table
        $user = new User();
        $user->name = $username;
        $user->email = $email;
        $user->password = bcrypt($password); // Ensure to hash the password securely
        $user->phone = $phone;
        $user->usertype = $role;
        $user->realtron_id = $realtron->id;
        $user->save();
        
        // Prepare success message based on role
        $successMessage = 'Successfully accepted Company details and created a user.';
        
        // Return a success JSON response
        return response()->json(['success' => true, 'message' => $successMessage]);
    } catch (\Exception $e) {
        // Return an error JSON response
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
}




    public function reject_detail($id)
    {
        try {
            $realtron = Realtron::findOrFail($id); // Fetch the Realtron by ID
            $realtron->status = 'rejected'; // Update the status
            $realtron->save(); // Save the changes
    
            // Return a success JSON response
            return response()->json(['success' => true, 'message' => 'Company rejected successfully.']);
        } catch (\Exception $e) {
            // Return an error JSON response
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function approve_detailagent(Request $request, $id)
    {
        try {
            // Fetch the Agent by ID
            $agent = Agent::findOrFail($id);
    
            // Update the status of the agent
            $agent->status = 'accepted';
            $agent->save();
    
            // Fetch necessary data from Agent instance
            $username = $agent->username;
            $email = $agent->email;
            $phone = $agent->phone;
            $password = $agent->password; // Ensure to hash the password securely
            $role = 'agent'; // Define the role for the user
    
            // Check if the user with the same email already exists
            if (User::where('email', $email)->exists()) {
                return response()->json(['success' => false, 'message' => 'Email already exists in the system.'], 400);
            }
    
            // Create a new user in the users table
            $user = new User();
            $user->name = $username;
            $user->email = $email;
            $user->password = bcrypt($password); // Ensure to hash the password securely
            $user->phone = $phone;
            $user->usertype = $role;
            $user->realtron_id = $agent->realtron_id; // Assuming realtron_id is relevant here
            $user->save();
    
            // Prepare success message
            $successMessage = 'Successfully accepted Agent details and created a user.';
    
            // Return a success JSON response
            return response()->json(['success' => true, 'message' => $successMessage]);
        } catch (\Exception $e) {
            // Return an error JSON response
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    




    public function reject_detailagent($id)
    {
        try {
            $agent = Agent::findOrFail($id); // Fetch the Realtron by ID
            $agent->status = 'rejected'; // Update the status
            $agent->save(); // Save the changes
    
            // Return a success JSON response
            return response()->json(['success' => true, 'message' => 'Agent rejected successfully.']);
        } catch (\Exception $e) {
            // Return an error JSON response
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    //here i fecth user details
    public function userrequest(Request $request)
    {
        $loggeduserId = Session::get('realtron_id');
    
        $selleruser = Seller::where('realtron_id', $loggeduserId)->get();
        $agent = Agent::where('realtron_id', $loggeduserId)->get();
    
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'User request fetched successfully',
                'selleruser' => $selleruser,
                'agent' => $agent,
            ]);
        } else {
            return view('realtron.userrequest', compact('selleruser','agent'));
        }
    }


    public function deleteAgent($id)
    {
        try {
            $agent = Agent::findOrFail($id);
            $agent->delete();
            return response()->json(['success' => true, 'message' => 'Agent deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    



    public function assignAgent(Request $request)
{
    // Validate the request data
    $request->validate([
        'agent_name'=>'required|string',
        'task' => 'required|string|max:255',
        'due_date' => 'required|date',
        'notes' => 'nullable|string',
    ]);

    // Create a new assignment (or whatever logic you need)
    $assignment = new Assigntask();
    $assignment->agent_name = $request->agent_name;
    $assignment->task = $request->task;
    $assignment->due_date = $request->due_date;
    $assignment->notes = $request->notes;
    $assignment->save();

    return response()->json(['success' => true, 'message' => 'Agent assigned successfully']);
}
public function deleteCategory($id) {
    $property = Property::find($id);

    if ($property) {
        $property->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Property deleted successfully'
        ], 200);
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'Property not found'
        ], 404);
    }
}
}
   



