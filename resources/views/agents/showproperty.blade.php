<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealEstate-Admin</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="images/logo md.png" type="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Additional Styles */
        #message {
            display: none;
            padding: 8px;
            border-radius: 18px;
            margin-bottom: 20px;
        }
        .modal-header, .modal-footer {
            border: none;
        }
    </style>
</head>
<body>
<div class="hero_area">
        <!-- header section starts -->
        @include('agents.header')
        <!-- header section ends -->
        <div class="container">
        
            <div class="col-md-9" style="width: 100%;">
                
                <div class="row">
                    
                    <div class="table-responsive table-container">
                        <table class="table table-section w-100">
                        

                            <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Username</th>
                                    <th>Property Type</th>
                                    <th>Selling Type</th>
                                    <th>BHK</th>
                                    <th>Bedroom</th>
                                    <th>Bathroom</th>
                                    <th>Kitchen</th>
                                    <th>Balcony</th>
                                    <th>Hall</th>
                                    <th>Floor</th>
                                    <th>Total Floor</th>
                                    <th>Area Size</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <th>Image 1</th>
                                    <th>Image 2</th>
                                    <th>Image 3</th>
                                    <th>Image 4</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="Propertydetails">
                                <!-- Content will be injected here -->
                            </tbody>
                        </table>
                    </div>
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

        // Function to fetch properties via AJAX
        function fetchCategories() {
            $.ajax({
                url: '{{ url('show_properties') }}',
                method: 'GET',
                success: function(response) {
                    $('tbody').html(""); // Clear table body
                    var tableBody = $('#Propertydetails');
                    tableBody.empty(); // Clear existing rows

                    // Iterate through the properties and append to the table
                    if (response.property) {
                        response.property.forEach(function(property) {
                            var actionButtons = 
                                '<button class="btn btn-primary editBtn" data-id="' + property.id + '">Edit</button>' +
                                '<button class="btn btn-danger deleteBtn" data-id="' + property.id + '">Delete</button>';

                            // Add Generate button if the status is "Soldout"
                            if (property.status === "Soldout") {
                                actionButtons += 
                                    '<button class="btn btn-secondary generateBtn" data-id="' + property.id + '">Generate</button>';
                            }

                            // Construct the row with conditional action buttons
                            var row = '<tr>' +
                                '<td>' + property.company_name + '</td>' +
                                '<td>' + property.agent_name + '</td>' +
                                '<td>' + property.property_type + '</td>' +
                                '<td>' + property.selling_type + '</td>' +
                                '<td>' + property.bhk + '</td>' +
                                '<td>' + property.bedroom + '</td>' +
                                '<td>' + property.bathroom + '</td>' +
                                '<td>' + property.kitchen + '</td>' +
                                '<td>' + property.balcony + '</td>' +
                                '<td>' + property.hall + '</td>' +
                                '<td>' + property.floor + '</td>' +
                                '<td>' + property.total_floor + '</td>' +
                                '<td>' + property.area_size + '</td>' +
                                '<td>' + property.state + '</td>' +
                                '<td>' + property.city + '</td>' +
                                '<td>' + property.address + '</td>' +
                                '<td>' + property.status + '</td>' +
                                '<td>' + property.price + '</td>' +
                                '<td><img src="' + property.image1 + '" width="50px" height="50px"></td>' +
                                '<td><img src="' + property.image2 + '" width="50px"></td>' +
                                '<td><img src="' + property.image3 + '" width="50px"></td>' +
                                '<td><img src="' + property.image4 + '" width="50px"></td>' +
                                '<td>' + actionButtons + '</td>' +
                                '</tr>';
                            tableBody.append(row);
                        });
                    }

                    // Bind delete action to newly created delete buttons
                    $('.deleteBtn').click(function() {
                        var propertyId = $(this).data('id');
                        deleteCategory(propertyId);
                    });

                    // Bind edit action to newly created edit buttons
                    $('.editBtn').click(function() {
                        var propertyId = $(this).data('id');
                        window.location.href = '/edit_property/' + propertyId;
                    });

                    // Bind generate action to newly created generate buttons
                    $('.generateBtn').click(function() {
                            var propertyId = $(this).data('id');
                            // Redirect to the route for generating details
                            window.location.href = '/generate/' + propertyId;
                        });
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        // Function to delete category via AJAX
        function deleteCategory(categoryId) {
            var confirmation = confirm("Do you really want to delete this property?");
            if (confirmation) {
                $.ajax({
                    url: '{{ url('delete_category') }}/' + categoryId,
                    method: 'DELETE',
                    success: function(response) {
                        $('button[data-id="' + categoryId + '"]').closest('tr').remove();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        }

        // Call fetchCategories after document is ready
        fetchCategories();
    });
</script>

</body> 
</html>
<style>
    body {
            padding-top: 60px;
            font-family: Arial, sans-serif;
            background-image: url('images/bgagent.png'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        


.hero_area {
    display: flex;
    flex-direction: column;
    width: 100%;
}

.container {
           
            padding: 30px;
            border-radius: 8px;
            max-width:1324 px;
            width: 100%;
            
        }

.table-container {
    overflow-x: auto; /* Allows horizontal scroll if needed */
    margin: 90px -68px; /* Adjusted for proper spacing */
    width: 100%; /* Full width to avoid overlap */
}

.table-section {
    margin-top: 20px;
}

.table-section table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table-section th,
.table-section td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

.table-section th {
    background-color: #f2f2f2;
}

.table-section tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table-section tbody tr:hover {
    background-color: #f1f1f1;
}

.table-section button {
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.table-section .delete {
    background-color: #e67e22;
    color: white;
}

</style>