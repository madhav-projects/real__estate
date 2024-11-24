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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="font-sans antialiased">
    <div class="hero_area">
        @include('realtron.header')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 ms-3 mt-5">
                    <h1 class="centered-header">Agents</h1>
                    <div class="table-section">
                        <div class="table-responsive mt-3">
                            <table class="table table-section w-100">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Company Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Area</th>
                                        <th>Role</th>
                                        <th>Pincode</th>
                                        <th>Status</th>
                                        <th>Profile</th>
                                        <th>Manage</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="Agentdetails">
                                    <!-- Data will be populated here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
    $(document).ready(function() {
        // Set up CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Fetch agents and populate the table
        function fetchAgents() {
            $.ajax({
                url: '{{ url('showagentregister') }}',
                method: 'GET',
                success: function(response) {
                    var tableBody = $('#Agentdetails');
                    tableBody.empty();

                    if (response.agent) {
                        response.agent.forEach(function(agent) {
                            var row = '<tr>' +
                                '<td>' + agent.username + '</td>' +
                                '<td>' + agent.agent_company + '</td>' +
                                '<td>' + agent.phone + '</td>' +
                                '<td>' + agent.email + '</td>' +
                                '<td>' + agent.password + '</td>' +
                                '<td>' + agent.address + '</td>' +
                                '<td>' + agent.city + '</td>' +
                                '<td>' + agent.area + '</td>' +
                                '<td>' + agent.role + '</td>' +
                                '<td>' + agent.pincode + '</td>' +
                                '<td>' + agent.status + '</td>' +
                                '<td>' + (agent.profile ? '<a href="' + agent.profile + '" target="_blank">View</a>' : 'N/A') + '</td>' +
                                '<td>' +
                                    '<button class="acceptBtn btn btn-primary" data-id="' + agent.id + '">Accept</button> ' +
                                    '<button class="btn btn-danger rejectBtn" data-id="' + agent.id + '">Reject</button>' +
                                '</td>' +
                                '<td>' +
                                    
                                    '<button class="btn btn-danger deleteBtn" data-id="' + agent.id + '">Delete</button>' +
                                '</td>' +
                                '</tr>';
                            tableBody.append(row);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        // Handle Accept button click
        $(document).on('click', '.acceptBtn', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '/Approve_detailagent/' + id,
                method: 'POST',
                success: function(response) {
                    if (response.success) {
                        alert(response.message || 'Agent approved successfully.');
                        fetchAgents(); // Refresh table data
                    } else {
                        alert('Failed to accept agent.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('An error occurred: ' + (xhr.responseText || error));
                }
            });
        });

        // Handle Reject button click
        $(document).on('click', '.rejectBtn', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '/Reject_detailagent/' + id,
                method: 'POST',
                success: function(response) {
                    if (response.success) {
                        alert('Agent rejected successfully.');
                        fetchAgents(); // Refresh table data
                    } else {
                        alert('Failed to reject agent.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('An error occurred: ' + (xhr.responseText || error));
                }
            });
        });

        // Handle Delete button click
$(document).on('click', '.deleteBtn', function() {
    var id = $(this).data('id');
    if (confirm('Are you sure you want to delete this agent?')) {
        $.ajax({
            url: '/deleteAgent/' + id,
            method: 'DELETE',
            success: function(response) {
                if (response.success) {
                    alert(response.message || 'Agent deleted successfully.');
                    fetchAgents(); // Refresh table data
                } else {
                    alert('Failed to delete agent.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('An error occurred: ' + (xhr.responseText || error));
            }
        });
    }
});


        // Initial fetch to load agents when the page loads
        fetchAgents();
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
    align-items: center;
    background: none; /* Remove background from the main body */
    width: 100vw;
    height: 100vh;
    overflow-x: hidden;
    position: relative;
    z-index: 1; /* Set a higher z-index to keep the main content above the background */
}

/* Blurred background using ::before */
body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url('images/bgcompany.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    filter: blur(8px); /* Adjust the blur level as desired */
    z-index: -1; /* Ensure the blurred background stays behind the content */
}


.hero_area {
    width: 100%;
}

.container {
    max-width: 1258px;
    margin: 0 auto; /* Ensure centered horizontally */
    padding-top: 0; /* Remove padding from the top */
}

.centered-header {
    text-align: center;
    font-weight: bold;
    font-size: 34px;
    color: black;
    margin-bottom: -29px; /* Reduced margin below the header */
    padding: 45px; /* Reduced padding */
}


.table-section {
   
    margin-top: 0; /* Remove any top margin */
    
    overflow-x: auto;
    overflow-y: auto; /* Enable vertical scrolling if content overflows */
    max-height: 500px; /* Set a maximum height for the table section */
   /* Optional: Add a border for better visibility */
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Optional: Add a subtle shadow */
}


.table-section .table {
    width: 100%;
    border-collapse: collapse;
}

.table-section th, .table-section td {
    padding: 5px;
    text-align: left;
    color: #333;
    border: 1px solid #ddd;
}

.table-section th {
    background-color: #b3933a;
    color: black;
    font-weight: bold;
}

.table-section tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table-section tbody tr:hover {
    background-color: #e0f7fa;
}

.table-section button {
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 0.9em;
}

.table-section .acceptBtn {
    background-color: #4CAF50;
    color: white;
}

.table-section .rejectBtn {
    background-color: #f44336;
    color: white;
}

.table-section .editBtn {
    background-color: #008CBA;
    color: white;
}

.table-section .deleteBtn {
    background-color: #e53935;
    color: white;
}

.table-section button:hover {
    opacity: 0.8;
}
</style>
