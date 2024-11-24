<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealEstate-Agent</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="images/logo md.png" type="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #message {
            display: none;
            padding: 8px;
            border-radius: 18px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- header section starts -->
        @include('agents.header')
        <!-- header section ends -->
        <!-- @include('agents.body1') -->
        <div class="container">
            <div class="form-container">
                <form action="{{url('/add_property')}}" method="post" id="property_type" enctype="multipart/form-data">
                    @csrf
                    <h1 class="property-details-heading">Add Properties</h1>
                    <div class="form-section">
                        <!-- Company Name -->
                        <div class="form-group">
                            <label for="company-name">Company Name</label>
                            <select id="company-name" name="company_name" required>
                                <option value="">Select Company</option>
                                @foreach($companies as $company)
                                <option value="{{ $company->realtron_company }}">{{ $company->realtron_company }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Agent Name (Automatically populated) -->
                        <div class="form-group">
                            <label for="agent-name">Agent Name</label>
                            <input type="text" id="agent-name" name="agent_name" 
                                   value="{{ Auth::user()->name }}" readonly>
                        </div>

                        <!-- Property Type -->
                        <div class="form-group">
                            <label for="property-type">Property Type</label>
                            <select id="property-type" name="property_type" required>
                                <option value="">Select Type</option>
                                <option value="Houses">Houses</option>
                                <option value="Plots">Plots</option>
                            </select>
                        </div>

                        <!-- Selling Type -->
                        <div class="form-group">
                            <label for="selling-type">Selling Type</label>
                            <select id="selling-type" name="selling_type" required>
                                <option value="">Select Type</option>
                                <option value="Sale">Sale</option>
                                <option value="Rent">Rent</option>
                            </select>
                        </div>

                        <!-- BHK -->
                        <div class="form-group">
                            <label for="bhk">BHK</label>
                            <select id="bhk" name="bhk" required>
                                <option value="">Select</option>
                                <option value="1 BHK">1 BHK</option>
                                <option value="2 BHK">2 BHK</option>
                                <option value="3 BHK">3 BHK</option>
                                <option value="4 BHK">4 BHK</option>
                                <option value="5 BHK">5 BHK</option>
                            </select>
                        </div>

                        <!-- Other Inputs (Bathroom, Bedroom, etc.) -->
                        <div class="form-group">
                            <label for="bedroom">Bedroom</label>
                            <input type="number" id="bedroom" name="bedroom" min="1" max="10" required>
                        </div>
                        <div class="form-group">
                            <label for="bathroom">Bathroom</label>
                            <input type="number" id="bathroom" name="bathroom" min="1" max="10" required>
                        </div>
                        <div class="form-group">
                            <label for="kitchen">Kitchen</label>
                            <input type="number" id="kitchen" name="kitchen" min="1" max="10" required>
                        </div>
                        <div class="form-group">
                            <label for="balcony">Balcony</label>
                            <input type="number" id="balcony" name="balcony" min="1" max="10" required>
                        </div>
                        <div class="form-group">
                            <label for="hall">Hall</label>
                            <input type="number" id="hall" name="hall" min="1" max="10" required>
                        </div>
                    </div>

                    <div class="form-section">
                        <!-- Floor -->
                        <div class="form-group">
                            <label for="floor">Floor</label>
                            <select id="floor" name="floor" required>
                                <option value="Ground Floor">Ground Floor</option>
                                <option value="1st Floor">1st Floor</option>
                                <option value="2nd Floor">2nd Floor</option>
                                <option value="3rd Floor">3rd Floor</option>
                                <option value="4th Floor">4th Floor</option>
                                <option value="5th Floor">5th Floor</option>
                            </select>
                        </div>

                        <!-- Total Floor -->
                        <div class="form-group">
                            <label for="total-floor">Total Floor</label>
                            <select id="total-floor" name="total_floor" required>
                                <option value="5 Floors">1 Floors</option>
                                <option value="5 Floors">2 Floors</option>
                                <option value="5 Floors">3 Floors</option>
                                <option value="5 Floors">4 Floors</option>
                                <option value="5 Floors">5 Floors</option>
                                <option value="5 Floors">6 Floors</option>
                                <option value="5 Floors">7 Floors</option>
                                <option value="5 Floors">8 Floors</option>

                            </select>
                        </div>

                        <!-- Price -->
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" id="price" name="price" required>
                        </div>

                        <!-- Area Size -->
                        <div class="form-group">
                            <label for="area-size">Area Size (in sqft)</label>
                            <input type="text" id="area-size" name="area_size" required>
                        </div>

                        <!-- Location (City, State, Address) -->
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" required>
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" id="state" name="state" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" required>
                        </div>
                    </div>

                    <div class="form-section">
                        <!-- Image Upload -->
                        <h2>Image & Status</h2>
                        <div class="form-group">
                            <label for="image1">Image 1</label>
                            <input type="file" id="image1" name="image1" required>
                        </div>
                        <div class="form-group">
                            <label for="image2">Image 2</label>
                            <input type="file" id="image2" name="image2" required>
                        </div>
                        <div class="form-group">
                            <label for="image3">Image 3</label>
                            <input type="file" id="image3" name="image3" required>
                        </div>
                        <div class="form-group">
                            <label for="image4">Image 4</label>
                            <input type="file" id="image4" name="image4" required>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" required>
                                <option value="">Select Status</option>
                                <option value="Available">Available</option>
                                <option value="Sold Out">Sold Out</option>
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-section button-section">
                        <button type="submit">Submit Property</button>
                    </div>
                </form>
                <div id="message"></div> <!-- Move the message here -->
            </div>
        </div>
    </div>

    <script>
    $(function() {
        // Set CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Submit form using AJAX
        $('#property_type').submit(function(event) {
            event.preventDefault();  // Prevent the default form submission

            let formData = new FormData($('#property_type')[0]);  // Create a FormData object from the form

            $.ajax({
                type: "POST",
                url: "/add_property",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#message').text('Property added successfully')
                        .css({
                            'color': 'green',
                            'display': 'block',
                            'background-color': '#d4edda',
                            'border': '1px solid #c3e6cb'
                        });
                    $('#property_type')[0].reset(); // Clear the form fields
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    $('#message').text('Error adding property. Please try again.')
                        .css({
                            'color': 'red',
                            'display': 'block',
                            'background-color': '#f8d7da',
                            'border': '1px solid #f5c6cb'
                        });
                }
            });
        });
    });
    </script>
</body>
</html>



<style>

.home-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            filter: blur(5px);
        }
        .container {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 169vh;
}

.property-details-heading {
    font-weight: bold;
    text-align: center;
    font-size: 24px;
    position: relative;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100%;
    margin-top: -222px;
    padding: 15px;
}
.hero_area {
    display: flex;
    flex-direction: column;
    width: 100%;
}

.container {
    position: relative; /* To position the overlay */
    display: flex;
    justify-content: center; /* Center the form horizontally */
    align-items: center; /* Center vertically */
    height: 115vh; /* Full screen height */
}

.container::before {
    content: ""; /* Empty content for the pseudo-element */
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('/images/bgagent.png'); /* Set the background image */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    filter: blur(10px); /* Adjust the blur intensity as needed */
    z-index: -1; /* Ensure it stays behind other elements */
    opacity: 0.8; /* Optional: Add a slight opacity for a subtle effect */
}

.form-container {
    z-index: 1;
    background: rgba(255, 255, 255, 0.9);
    padding: 171px;
    margin-top: 440px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 82%;
}



.form-section {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
}

.form-group {
    flex: 1;
    min-width: 200px;
}

.form-group label {
    width: 100%;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group select,
.form-group input {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.form-section h2 {
    width: 100%;
}

.button-section {
    display: flex;
    justify-content: center; /* Center the button horizontally */
    width: 100%;
}

button[type="submit"] {
    padding: 10px 20px;
    background-color: #cd991b;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #5e3806;
}
</style>