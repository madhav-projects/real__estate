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
            /* margin-top: -153px; */
            padding: 8px;
            border-radius: 18px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="overflow-x-hidden">
    <div class="hero_area">
        <!-- header section starts -->
        @include('agents.header')
        <!-- header section ends -->
        <div class="row">
           

            <div class="center col-md-9">
                <div class="row">
                <div id="message"></div>
                    <h1 class="fs-5 fw-bold mb-2">Add Category</h1>
                    <form method="POST" action="{{url('/addcategory')}}" id="addCategoryForm">
                        @csrf
                        <input class="input_color" type="text" id="categoryInput" name="category" placeholder="write category name" required>
                        <input type="submit" name="submit" value="Add Category">
                    </form>
                    
                    <!-- Element to display success or error message -->
                </div>
                <div class="row">
                    <h2  class="fs-5 fw-bold mt-4">Category List</h2>
                    <div class="table-container">
                        <table class="table-section w-100">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="categoryList">
                               
                            </tbody>
                        </table>
                    </div>
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

            // Submit form to add category
            $('#addCategoryForm').submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                // AJAX Request for adding category:
                var category = $('#categoryInput').val();

                $.ajax({
                    url: '{{ url('addcategory') }}',
                    method: 'POST',
                    data: { category: category },
                    success: function(response) {
                        console.log('Success:', response); // Log success response for debugging
                        $('#message').text('Category added successfully')
                            .css({'color': 'green', 'display': 'block', 'background-color': '#d4edda', 'border': '1px solid #c3e6cb'}); // Show the success message
                        $('#categoryInput').val(''); // Clear input field
                        fetchCategories(); // Update the table with the new category
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error); // Log error for debugging
                        $('#message').text('Error: Something went wrong')
                            .css({'color': 'red', 'display': 'block', 'background-color': '#f8d7da', 'border': '1px solid #f5c6cb'}); // Show the error message
                    }
                });
            });
            //end  add category

            // Function to fetch categories via AJAX
            function fetchCategories() {
                $.ajax({
                    url: '{{ url('show_category') }}', // Replace with your endpoint to fetch categories
                    method: 'GET',
                    success: function(response) {
                        var tableBody = $('#categoryList');
                        tableBody.empty(); // Clear existing rows before appending

                        // Iterate through the categories and append to the table
                        if (response.categories) {
                            response.categories.forEach(function(category) {
                                var row = '<tr>' +
                                    '<td>' + category.category_name + '</td>' +
                                    '<td><button class="btn btn-danger deleteBtn " data-id="' + category.id + '">Delete</button></td>' + // Delete button
                                    '</tr>';
                                tableBody.append(row);
                            });
                        }

                        // Bind delete action to newly created delete buttons
                        $('.deleteBtn').click(function() {
                            var categoryId = $(this).data('id');
                            deleteCategory(categoryId);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
            //end  fetch category

            // Function to delete category via AJAX
            function deleteCategory(categoryId) {
                // Ask for confirmation before deleting
                var confirmation = confirm("Do you really want to delete this category?");

                if(confirmation){
                    $.ajax({
                        url:'delete_category/' + categoryId,
                        method:'DELETE',
                        success:function(response){
                            console.log(response);
                            $('button[data-id="' + categoryId +'"]').closest('tr').remove();

                        },
                        error:function(xhr, status, error){
                            console.error(xhr.responseText);
                        }
                    });
                }
               
            }

            // Call fetchCategories after document is ready (optional)
            fetchCategories();
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

.header_section {
    background-color: #5e3806;
    /* padding: 10px 0; */
    border-bottom: 1px solid #ddd;
    font-family: 'Poppins', sans-serif;
}


.header_section .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header_section .navbar {
    display: flex;
    align-items: center;
    width: 100%;
    justify-content: space-between;
}

.header_section .navbar-brand img {
    max-width: 120px;
}

.header_section .navbar-nav {
    list-style: none;
    display: flex;
    align-items: center;
    margin: 0;
    padding: 0;
    flex-grow: 1;
    justify-content: center;
    flex-direction: row;
}

.header_section .navbar-nav .nav-item {
    margin: 0 15px;
}

.header_section .navbar-nav .nav-item a {
    color: white;
    text-decoration: none;
    padding: 10px 12px;
    font-weight: bold;
}

.header_section .navbar-nav .nav-item a:hover,
.header_section .navbar-nav .nav-item.active a {
    
    color: #ff7e5f;
    background-color: #463305;
    border-radius: 5px;
}

.header_section .navbar-nav .dropdown-menu {
    display: none;
    position: absolute;
    background-color: white;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    margin-top: 10px;
    padding: 0;
    list-style: none;
}

.header_section .navbar-nav .dropdown-menu li {
    padding: 10px;
}

.header_section .navbar-nav .dropdown-menu li a {
    color: black;
    text-decoration: none;
    display: block;
}

.header_section .navbar-nav .dropdown:hover .dropdown-menu {
    display: block;
}


.container {
    display: flex;
    width: 100%;
}

.sidebar {
    width: 200px;
    background-color: #5e3806;
    color: white;
    min-height: 100vh;
    font-family: Arial, sans-serif;
}

.sidebar nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar nav ul li {
    padding: 15px;
    position: relative;
    transition: background-color 0.3s ease;
}

.sidebar nav ul li a {
    color: white;
    text-decoration: none;
    display: block;
    transition: color 0.3s ease;
}

.sidebar nav ul li a:hover,
.sidebar nav ul li a.active {
    background-color: #463305;
    color: #ffd700; /* Gold color for active link */
}

.sidebar nav ul ul {
    display: none;
    position: absolute;
    left: 200px;
    top: 0;
    background-color: #4a3306;
    padding: 0;
    margin: 0;
    min-width: 200px;
    z-index: 1000;
}

.sidebar nav ul li:hover ul {
    display: block;
}

.sidebar nav ul ul li {
    padding: 10px;
}

.sidebar nav ul ul li a:hover {
    background-color: #362504;
}

.sidebar nav ul li a::after {
    content: ' ▼';
    float: right;
    transition: transform 0.3s ease;
}

.sidebar nav ul li:hover > a::after {
    transform: rotate(180deg);
}

.sidebar nav ul ul li a::after {
    content: '';
}

.sidebar nav ul li a.active::after {
    transform: rotate(180deg);
}

.sidebar nav ul ul li a {
    padding-left: 30px;
}


.dashboard {
    flex: 1;
    padding: 20px;
}

.dashboard header {
    margin-bottom: 20px;
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
    color: #7f8c8d;
}

.table-section {
    margin-top: 20px;
}

.table-section form {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

.table-section form input {
    padding: 10px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.table-container {
    margin: 0 auto; /* Center the container horizontally */
    max-width: 800px; /* Adjust max-width as needed */
}


.table-section form button {
    padding: 10px 20px;
    font-size: 1em;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.table-section form button:hover {
    background-color: #2980b9;
}

.table-section table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table-section th, .table-section td {
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
    padding: 20px; /* Add padding for better spacing */
}

.input_color {
    color: black;
    padding: 10px; /* Add padding for better spacing */
    margin-bottom: 10px; /* Add margin to separate elements */
    width: 35%; /* Adjust width for better alignment */
    border: 1px solid #ccc; /* Add border */
    border-radius: 5px; /* Add border radius for rounded corners */
}

input[type="submit"] {
    background-color: #3498db; /* Button color */
    color: white; /* Button text color */
    padding: 10px 20px; /* Add padding for better spacing */
    border: none; /* Remove border */
    border-radius: 5px; /* Add border radius for rounded corners */
    cursor: pointer; /* Add pointer cursor on hover */
}

input[type="submit"]:hover {
    background-color: #2980b9; /* Button hover color */
}
</style>