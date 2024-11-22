<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4a00e0, #8e2de2);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
            background-image: url('images/bg3.webp');
            background-size: cover;
            background-position: center;
        }

        .container {
            display: flex;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 800px;
            width: 90%;
            margin: 20px auto;
            padding: 0;
            backdrop-filter: blur(5px); /* Apply blur effect */
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 150px;
        }

        .welcome-section {
            background: linear-gradient(to bottom, #ffffff, #765050);
            color: white;
            padding: 20px 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex: 1;
            position: relative;
            clip-path: polygon(0 0, 100% 0, 80% 100%, 0% 100%);
        }

        .form-section {
            flex: 2;
            padding: 20px;
        }

        .form-section h3 {
            margin-bottom: 30px;
        }

        .form-control {
            font-size: 14px;
            padding: 8px 12px;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
        }

        .form-row .col-md-6 {
            flex: 1;
            min-width: 45%;
            margin-right: 10px;
        }

        .form-row .col-md-6:nth-child(2n) {
            margin-right: 0;
        }

        .btn-primary, .btn-primary:hover, .btn-primary:active  {
            background-color: #b79292;
            border-color: #272626;
        }
        .btn-primary:not(:disabled):not(.disabled):active{
            background-color: #b79292;
            border-color: #272626;
        }
        .role-buttons .btn-role {
            background-color: #e0e0e0;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            margin: 5px;
        }

        .role-buttons .btn-role.active {
            background-color: #4285F4;
            color: white;
        }

        .login-button,
        .btn-role,
        .btn-primary {
            padding: 8px 20px;
            font-size: 14px;
        }

        .mt-4 {
            margin-top: 1.5rem;
        }

        .alert {
            margin-top: 1rem;
        }
        
        .btn.btn-role{
            background: #6c2805;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome-section">
            <div class="logo-container text-center">
                <img src="images/logo md.png" alt="Logo" class="logo img-fluid">
            </div>
        </div>
        <div class="form-section">
            <h3 class="text-center">Registration</h3>
            <!-- Initial role selection view -->
            <div id="response-message" class="mt-0 alert" style="display: none;"></div>

            <div id="role-selection" class="text-center mb-4">
                <p>Please select your role:</p>
                <button type="button" class="btn btn-role" id="select-realtron-btn">Company</button>
                <button type="button" class="btn btn-role" id="select-agent-btn">Agent</button>
            </div>

            <!-- Realtron form section -->
            <div id="realtron-form-section" class="mt-4" style="display: none;">
                <form method="POST" id="registration-form-realtron" action="{{ url('createregister') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="usernameRealtron">User Name</label>
                            <input class="form-control" id="usernameRealtron" name="username" type="text" placeholder="User Name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="passwordRealtron">Password</label>
                            <input class="form-control" id="passwordRealtron" name="password" type="password" placeholder="Password" minlength="8" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="realtroncompany">Company Name</label>
                            <input class="form-control" id="realtroncompany" name="realtron_company" type="text" placeholder="Realtron Company Name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phoneRealtron">Phone No</label>
                            <input class="form-control" id="phoneRealtron" name="phone" type="text" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="emailRealtron">Email</label>
                            <input class="form-control" id="emailRealtron" name="email" type="email" placeholder="Email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="addressRealtron">Address</label>
                            <input class="form-control" id="addressRealtron" name="address" type="text" placeholder="Address" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="cityRealtron">City</label>
                            <input class="form-control" id="cityRealtron" name="city" type="text" placeholder="City" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="areaRealtron">Area</label>
                            <input class="form-control" id="areaRealtron" name="area" type="text" placeholder="Area" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="pincodeRealtron">Pincode</label>
                            <input class="form-control" id="pincodeRealtron" name="pincode" type="text" placeholder="Pincode" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="businessphoneRealtron">Business Phone No</label>
                            <input class="form-control" id="businessphoneRealtron" name="bussiness_phone" type="text" placeholder="Business Phone Number" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="companyageRealtron">Age of Company</label>
                            <input class="form-control" id="companyageRealtron" name="age_of_company" type="text" placeholder="Age of Company" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fileuploadRealtron">Company License</label>
                            <input class="form-control" id="fileuploadRealtron" name="upload_file" type="file" accept=".pdf" required>
                            <div class="invalid-feedback">
                                Please upload a PDF file.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="profileimageRealtron">Company Profile</label>
                            <input class="form-control" id="profileimageRealtron" name="profile" type="file" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-4"><i class="fas fa-paper-plane"></i> Submit</button>
                    </div>
                </form>
            </div>

            <!-- Agent form section -->
            <div id="agent-form-section" class="mt-4" style="display: none;">
                <form method="POST" id="registration-form-agent" action="{{ url('createagentregister') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="usernameAgent">User Name</label>
                            <input class="form-control" id="usernameAgent" name="username" type="text" placeholder="User Name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="passwordAgent">Password</label>
                            <input class="form-control" id="passwordAgent" name="password" type="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="agentCompanyField">Agent Company</label>
                            <select class="form-control" id="agentCompanyField" name="agent_company" required>
                                <option value="" disabled selected>Select your Company</option>
                                @foreach($realtron as $company)
                                    @if($company->status == 'accepted' && $company->role == 'realtron')
                                        <option value="{{ $company->realtron_company }}">{{ $company->realtron_company }}</option>
                                    @endif
                                @endforeach
                             </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phoneAgent">Phone No</label>
                            <input class="form-control" id="phoneAgent" name="phone" type="text" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="emailAgent">Email</label>
                            <input class="form-control" id="emailAgent" name="email" type="email" placeholder="Email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="addressAgent">Address</label>
                            <input class="form-control" id="addressAgent" name="address" type="text" placeholder="Address" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="cityAgent">City</label>
                            <input class="form-control" id="cityAgent" name="city" type="text" placeholder="City" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="areaAgent">Area</label>
                            <input class="form-control" id="areaAgent" name="area" type="text" placeholder="Area" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="pincodeAgent">Pincode</label>
                            <input class="form-control" id="pincodeAgent" name="pincode" type="text" placeholder="Pincode" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="profileimageAgent">Profile Image</label>
                            <input class="form-control" style="padding: 3px 12px;" id="profileimageAgent" name="profile" type="file" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-4"><i class="fas fa-paper-plane"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Setup CSRF token for Ajax requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Form submission handling for Realtron
            $('#registration-form-realtron').submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "{{ url('/createregister') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#response-message').removeClass('alert-danger').addClass('alert-success').html(' successfully Details sent to admin!').show();
                        $('#registration-form-realtron')[0].reset();
                    },
                    error: function(xhr, status, error) {
                        $('#response-message').removeClass('alert-success').addClass('alert-danger').html('An error occurred. Please try again.').show();
                        console.error('Error:', error);
                    }
                });
            });

            // Form submission handling for Agent
            $('#registration-form-agent').submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "{{ url('/createagentregister') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#response-message').removeClass('alert-danger').addClass('alert-success').html(' successfully Details sent to Company!').show();
                        $('#registration-form-agent')[0].reset();
                    },
                    error: function(xhr, status, error) {
                        $('#response-message').removeClass('alert-success').addClass('alert-danger').html('An error occurred. Please try again.').show();
                        console.error('Error:', error);
                    }
                });
            });

            // Toggle form visibility based on role selection
            $('#select-realtron-btn').click(function() {
                $('#role-selection').hide();
                $('#realtron-form-section').show();
            });

            $('#select-agent-btn').click(function() {
                $('#role-selection').hide();
                $('#agent-form-section').show();
            });

            // Initialize with role selection view visible
            $('#role-selection').show();
            $('#realtron-form-section').hide();
            $('#agent-form-section').hide();
        });
    </script>
</body>
</html>
