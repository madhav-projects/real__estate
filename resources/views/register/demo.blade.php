<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="welcome-section">
            <div class="logo-container text-center">
                <img src="images/logo md.png" alt="Logo" class="logo img-fluid">
            </div>
            <h2>Welcome</h2>
            <p>To RL Groups of RealEstate</p>
            <button type="button" class="login-button" onclick="location.href='http://127.0.0.1:8000/login';">Login</button>
        </div>
        <div class="form-section">
            <h3 class="text-center">Realtron & Agent Registration</h3>
            <div class="mt-4">
                <form method="POST" id="registration-form" action="{{ url('createregister') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row mb-4">
                        <div class="col-md-6">
                            <label for="username">User Name</label>
                            <input class="form-control" id="username" name="username" type="text" placeholder="User Name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="realtroncompany">Realtron Company Name</label>
                            <input class="form-control" id="realtroncompany" name="realtroncompany" type="text" placeholder="Realtron Company Name" required>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-md-6">
                            <label for="companyname">Agent Company</label>
                            <select class="form-control" id="companyname" name="companyname" required>
                                <option value="" disabled selected>Select your Company</option>
                                @foreach($realtron as $company)
                                    @if($company->status == 'accepted' && $company->role == 'realtron')
                                        <option value="{{ $company->realtroncompany }}">{{ $company->realtroncompany }}, {{$company->city}}</option>
                                    @endif
                                @endforeach
                                <option>nill</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Phone No</label>
                            <input class="form-control" id="phone" name="phone" type="text" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" name="email" type="email" placeholder="Email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="address">Address</label>
                            <input class="form-control" id="address" name="address" type="text" placeholder="Address" required>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-md-6">
                            <label for="city">City</label>
                            <input class="form-control" id="city" name="city" type="text" placeholder="City" required>
                        </div>
                        <div class="col-md-6">
                            <label for="area">Area</label>
                            <input class="form-control" id="area" name="area" type="text" placeholder="Area" required>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-md-6">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="" disabled selected>Select your Role</option>
                                <option value="realtron">Realtron</option>
                                <option value="Agent">Agent</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <input class="form-control" id="password" name="password" type="password" placeholder="Password" minlength="8" required pattern=".{8,}" title="Password must be at least 8 characters long">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-md-12">
                            <label for="image">upload file</label>
                            <input class="form-control" id="fileupload" name="fileupload" type="file"  required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-4"><i class="fas fa-paper-plane"></i> Submit</button>
                    </div>
                </form>
                <div id="response-message" class="mt-4 alert" style="display: none;"></div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#registration-form').submit(function(event) {
                event.preventDefault();

                var password = $('#password').val();
                if (password.length < 8) {
                    $('#response-message').removeClass('alert-success').addClass('alert-danger').html('Password must be at least 8 characters long.').show();
                    return;
                }

                var formData = new FormData(this); // Create a FormData object from the form

                $.ajax({
                    type: "POST",
                    url: "{{ url('/createregister') }}",
                    data: formData,
                    contentType: false, // Important for file upload
                    processData: false, // Important for file upload
                    success: function(response) {
                        $('#response-message').removeClass('alert-danger').addClass('alert-success').html('Data saved successfully!').show();
                        $('#registration-form')[0].reset();
                    },
                    error: function(xhr, status, error) {
                        $('#response-message').removeClass('alert-success').addClass('alert-danger').html('An error occurred. Please try again.').show();
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
</body>
</html>
<style>
    /* Reset and base styles */
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to right, #4a00e0, #8e2de2);
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #333;
    background-image: url('images/bg3.webp'); /* Add your background image path here */
    background-size: cover;
    background-position: center;
}

.logo-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px; /* Adjust margin as needed */
}

.logo {
    max-width: 150px; /* Adjust max-width as needed */
}

.container {
    display: flex;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    max-width: 1000px;
    width: 90%;
    margin: 20px auto; /* Center the container */
    padding: 0; /* Ensure no padding */
}

.welcome-section {
    background: linear-gradient(to bottom, #4a00e0, #8e2de2);
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

.welcome-section h2 {
    margin: 0;
    font-size: 2em;
}

.welcome-section p {
    margin: 20px 0;
    font-size: 1.2em;
    text-align: center;
}

.login-button {
    background-color: white;
    color: #4a00e0;
    border: none;
    padding: 10px 20px;
    border-radius: 20px;
    cursor: font-size: 1em;
}

.form-section {
    flex: 2;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

h3 {
    margin: 0 0 20px 0;
    font-size: 1.5em;
    text-align: center;
}

form {
    width: 100%;
    max-width: 600px; /* Adjusted max-width for form */
}

.form-row {
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.col-md-6 {
    flex: 0 0 50%; /* Make columns 50% width for side-by-side layout */
    max-width: 50%;
    padding: 0 15px;
}

.form-control {
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.btn-primary {
    color: #fff;
    background-color: #4a00e0;
    border-color: #4a00e0;
    padding: 10px 20px; /* Adjusted padding for button */
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
}

.btn-primary:hover {
    background-color: #3a00c9;
    border-color: #3a00c9;
}

.alert {
    display: none; /* Hide alert initially */
    margin-top: 10px; /* Adjust margin as needed */
}

@media (max-width: 768px) {
    .container {
        flex-direction: column;
    }

    .col-md-6 {
        flex: 0 0 100%; /* Full width for smaller screens */
        max-width: 100%;
    }
}
</style>
