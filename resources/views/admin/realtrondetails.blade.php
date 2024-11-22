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
        #message {
            display: none;
            padding: 8px;
            border-radius: 18px;
            margin-bottom: 20px;
        }
        /* @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
} */
        .search-container {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    align-items: center;
    z-index: 1000; /* Ensures it's on top of other content */
    background-color: white;
    padding: 10px;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}
.search-bar {
    width: 30%;
    padding: 15px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px 0 0 5px;
    transition: all 0.3s ease;
}

/* Style for search button */
.search-button {
    padding: 15px 20px;
    font-size: 19px;
    border: none;
    background-color: #3c2626;
    color: white;
    cursor: pointer;
    border-radius: 0 5px 5px 0;
    /* transition: background-color 0.3s ease, transform 0.2s ease;  */
}

/* Hover effects */
.search-bar:focus {
    border-color: #2980b9;
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    transform: scale(1.02); /* Slightly expand on focus */
}

.search-button:hover {
    background-color: #2980b9;
    transform: scale(1.05); /* Slightly grow on hover */
}

        

        .table-section
         {
        position: relative;
        background-size: cover;
    background-position: center;
    padding: 20px;
    border-radius: 10px;
    overflow-x: auto;
    margin-top: -577px;
}

.table-section table {
    width: 100%;
    max-width: 100%; /* Ensures table doesn't exceed the container's width */
    border-collapse: collapse;
    margin-top: 20px;
    margin-left: auto; /* Centers the table horizontally */
    margin-right: auto; /* Centers the table horizontally */
}

.table-section th, .table-section td {
    border: 1px solid #ddd;
    padding: 5px;
    text-align: left;
    white-space: nowrap; /* Prevents wrapping of table content */
}


.table-section tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table-section tbody tr:hover {
    background-color: #d1e8ff; /* Row highlight on hover */
    cursor: pointer;
}

.table-section button {
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.table-section .accept {
    background-color: #2ecc71;
    color: white;
}

.table-section .reject {
    background-color: #e74c3c;
    color: white;
}

.table-section .delete {
    background-color: #e67e22;
    color: white;
}

.table-section button:hover {
    opacity: 0.8;
}


        .container-fluid {
            padding-left: 0;
            padding-right: 0;
        }
       

        

        .hero_area {
            width: 100%;
        }
    </style>
</head>

<body class="overflow-x-hidden">
    
    <div class="hero_area">
        <!-- header section starts -->
        @include('admin.header')
        
        @include('admin.body1')
        @include('admin.sidebar')
        <!-- header section ends -->
         
        <div class="row">
            @include('admin.sidebar')
            

            <div class="col-md-12" style="width: 100%;">
                <div class="row">
                    
                    
                    <h2 class="fs-5 fw-bold mt-4">Realtron Details</h2>
                    <div class="table-section">
                    <input type="text" id="searchInput" placeholder="Search for agents..." class="search-bar">
                    <button id="searchButton" class="search-button">Search</button>
                    
                            <table class="table table-section w-100">
                            <thead>
                                <tr>
                                    <th>username</th>
                                    <th>Realtroncompany</th>
                                    
                                    <th>phone</th>
                                    <th>email</th>
                                    <th>password</th>
                                    <th>address</th>
                                    <th>city</th>
                                    <th>area</th>
                                    <th>role</th>
                                    <th>status</th>
                                    <th>Manage</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody id="realtrondetails">
                                <!-- Data will be populated here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
   $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function fetchCategories() {
            $.ajax({
                url: '{{ url('Realtrondetail') }}',
                method: 'GET',
                success: function(response) {
                    $('tbody').html("");
                    var tableBody = $('#realtrondetails');
                    tableBody.empty();

                    if (response.realtron) {
                        response.realtron.forEach(function(realtron) {
                            if (realtron.role === 'realtron') {
                                var row = '<tr>' +
                                    '<td>' + realtron.username + '</td>' +
                                    '<td>' + realtron.realtron_company + '</td>' +
                                    '<td>' + realtron.phone + '</td>' +
                                    '<td>' + realtron.email + '</td>' +
                                    '<td>' + realtron.password + '</td>' +
                                    '<td>' + realtron.address + '</td>' +
                                    '<td>' + realtron.city + '</td>' +
                                    '<td>' + realtron.area + '</td>' +
                                    '<td>' + realtron.role + '</td>' +
                                    '<td>' + realtron.status + '</td>' +
                                    '<td>' +
                                        '<button class="acceptBtn btn btn-primary" data-id="' + realtron.id + '">Accept</button> ' +
                                        '<button class="btn btn-danger rejectBtn" data-id="' + realtron.id + '">Reject</button>' +
                                    '</td>' +
                                    '</tr>';
                                tableBody.append(row);
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        // Accept button functionality
        $(document).on('click', '.acceptBtn', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '/Approve_detail/' + id,
                method: 'POST',
                success: function(response) {
                    console.log('Server response:', response);
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert('Failed to accept Realtron: ' + response.error);
                        console.error('Response Error:', response.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        });

        // Reject button functionality
        $(document).on('click', '.rejectBtn', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '/Reject_detail/' + id,
                method: 'POST',
                success: function(response) {
                    if (response.success) {
                        alert('Realtron rejected successfully.');
                        location.reload();
                    } else {
                        alert('Failed to reject Realtron.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });

        // Search functionality
        $('#searchButton').on('click', function() {
                var value = $('#searchInput').val().toLowerCase();
                $('#realtrondetails tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

        fetchCategories();

        $("#searchInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#realtrondetails tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
});

$("#searchButton").click(function() {
    var value = $("#searchInput").val().toLowerCase();
    $("#realtrondetails tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
});


    });
</script>

</body>
</html>

<style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
}


.hero_area {
    display: flex;
    flex-direction: column;
    width: 100%;
}

.container-fluid {
    padding-left: 0;
    padding-right: 0;
}

.row {
    margin-left: 0;
    margin-right: 0;
}

.col-md-12 {
    padding-left: 15px;
    padding-right: 15px;
    width: 100%;
    flex: 1;
}

.user-info {
    display: flex;
    align-items: center;
    padding: 20px;
    background-color: #2e2e42;
    margin-top: 20px;
}

.user-info img {
    border-radius: 50%;
    width: 40px;
    height: 40px;
    margin-right: 10px;
}

.user-info span {
    display: block;
    color: #fff;
}

.user-info span:first-child {
    font-weight: bold;
}

.dashboard {
    flex: 1;
    padding: 20px;
}

.cards {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.card {
    flex: 1 1 calc(33.333% - 20px);
    background-color: #ecf0f1;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.card-content h2 {
    margin: 0;
    font-size: 2em;
}

.card-content p {
    margin: 5px 0 0;
    font-size: 1.2em;
}

.table-section {
    position: relative;
    background-size: cover;
    background-position: center;
    padding: 8px;
    border-radius: 10px;
    overflow-x: auto;
    margin-top: -670px; /* Remove the negative margin */
    max-width: calc(100% - 250px); /* Adjust width to allow space for the sidebar */
    margin-left: auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* animation: fadeIn 0.5s ease-in-out;  */
   
}

.table-section table {
    width: 100%;
    max-width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    transition: transform 0.2s ease-in-out;
}

/* .table-section table:hover {
    transform: scale(1.01);
} */
.table-section th, .table-section td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    white-space: nowrap; /* Prevent text wrapping */
}

.table-section th {
    
    background-color: #3c2626;
    color: white;
    font-weight: bold;
    border-bottom: 2px solid #ddd;
    transition: background-color 0.3s ease;
}


.table-section tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table-section tbody tr:hover {
    background-color: #f1f1f1;
}
.table-section tbody tr {
    background-color: #f9f9f9;
    transition: background-color 0.3s ease;
}


.table-section button {
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.table-section .accept {
    background-color: #2ecc71;
    color: white;
}

.table-section .reject {
    background-color: #e74c3c;
    color: white;
}

.table-section .delete {
    background-color: #e67e22;
    color: white;
}

.table-section button:hover {
    opacity: 0.8;
}

.center {
    margin: auto;
    width: 50%;
    text-align: center;
    margin-top: 10px;
    border: 3px solid #fff;
    padding: 20px;
}

.input_color {
    color: black;
    padding: 10px;
    margin-bottom: 10px;
    width: 35%;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #3498db;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #2980b9;
}


#message {
    display: none;
    padding: 8px;
    border-radius: 18px;
    margin-bottom: 20px;
}

</style>