<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('images/logo md.png') }}" type="">
    <title>RealEstate</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <!-- Font Awesome Style -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- Responsive style -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .hero_area {
            position: relative;
            background-image: url('{{ asset('images/contact bg.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: grid;
            justify-content: center;
            align-items: center;
            color: black;
            text-align: center;
        }
        .header_section {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar-brand img {
            height: 40px;
        }
        .navbar-nav {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .nav-item {
            margin: 0 15px;
        }
        .nav-link {
            text-decoration: none;
            color: #333;
            font-size: 16px;
        }
        .nav-link:hover {
            color: #d4a253;
        }
        textarea.form-control {
            height: auto;
            min-height: auto;
            margin-bottom: 0;
        }
        .form_section {
            width: 500px;
            margin: 0 auto;
        }
        .form_section .seller-form {
            width: 100%;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
            margin-top: 50px;
        }
        .form_section h2 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 700;
            color: #333;
        }
        label {
            text-align: left;
            width: 100%;
            font-weight: 600;
        }
        .form-group {
            margin-bottom: 5px;
        }
        .form-control {
            height: 40px;
            font-size: 14px;
        }
        .btn-primary {
            padding: 10px 20px;
            font-size: 16px;
        }
        .btn-custom {
            background-color: rgb(0, 0, 1);
            border-color: rgb(0, 0, 1);
            color: #fff;
        }
        .btn-custom:hover {
            background-color: rgb(45, 45, 45);
            border-color: rgb(45, 45, 45);
        }
        form input {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <div class="container">
        @include('user.userheader')
            <!-- Form Section -->
            <section class="form_section">
            <div id="response-message" class="mt-4 alert" style="display: none;"></div>
                <form action="{{url('/create_selleruser')}}" class="seller-form" method="post" id="sellerdetails" enctype="multipart/form-data">
                    @csrf
                    <h2>User Details</h2>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="companyname">Company Name</label>
                            <input type="text" class="form-control" id="companyname" name="company_name" placeholder="Enter company name" value="{{ $seller->realtron_company }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="2" placeholder="Enter address" required></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="type">Type</label>
                            <select class="form-control" id="type" name="property_type">
                                <option value="house">House</option>
                                <option value="plot">Plot</option>
                                <option value="apartment">Apartment</option>
                            </select>
                        </div>
                    </div>
                    <!-- Plot address and file upload section -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="plot_address">Property Address</label>
                            <textarea class="form-control" id="plot_address" name="property_address" rows="2" placeholder="Enter plot address"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="file_upload">Property Image</label>
                            <input type="file" class="form-control" id="file_upload" name="property_image" accept=".jpg, .jpeg, .png, .pdf" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-custom">Submit</button>
                </form>
            </section>
            <!-- End Form Section -->
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            // Setup CSRF token for Ajax requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Form submission handling for the seller form
            $('#sellerdetails').submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "{{ url('/create_selleruser') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#response-message').removeClass('alert-danger').addClass('alert-success').html('YourDetails successfully sent to company!').show();
                        $('#sellerdetails')[0].reset();
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
