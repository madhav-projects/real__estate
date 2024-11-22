<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealEstate-Admin</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <link rel="shortcut icon" href="images/logo md.png" type="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="overflow-x-hidden">
    <div class="hero_area">
    @include('realtron.header')
    <div class="container">
        
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="row">
                    <h1 class="centered-header">User Request Details</h1>
                    <div class="table-responsive">
                        <table class="table table-section mt-3">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Company Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Property Address</th>
                                    <th>Property Image</th>
                                    <th>Property Type</th>
                                    <th>Assign Agent</th>
                                </tr>
                            </thead>
                            <tbody id="userrequest_details">
                                <!-- Data will be populated dynamically via JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form section - Moved below the table -->
        <div class="row form-section" id="newUserRequestFormSection">
            <div class="col-md-8 offset-md-2">
                <div class="selected-agent-display" id="selectedAgentDisplay">
                    <!-- Selected agent name will be displayed here -->
                </div>
                <form id="newUserRequestForm">
                    <div class="mb-3">
                        <label for="agent_name" class="form-label">Agent Name</label>
                        <input type="text" class="form-control" id="agent_name" name="agent_name" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="task" class="form-label">Task</label>
                        <input type="text" class="form-control" id="task" name="task" required>
                    </div>
                    <div class="mb-3">
                        <label for="dueDate" class="form-label">Due Date</label>
                        <input type="date" class="form-control" id="dueDate" name="due_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control" id="notes" name="notes" required></textarea>
                    </div>
                    <div class="btn-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Additional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybDo/Vv9Q9KZI6ERrTVEU2p2UZB+0FE1uNXpEs89F5auLk3Ng" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-qP29cPJJyw5nXHqP4AoLR8S6Y08H1aKuxRaPsoxC5Qw5T24B4rF/fT2zVl95W2dG" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function fetchUserDetails() {
            $.ajax({
                url: '{{ route('viewuser_request') }}',
                method: 'GET',
                success: function(response) {
                    var tableBody = $('#userrequest_details');
                    tableBody.empty();

                    if (response && response.selleruser && response.agent) {
                        var agentOptions = response.agent.map(function(agent) {
                            return '<option value="' + agent.id + '">' + agent.username + ', ' + agent.city + '</option>';
                        }).join('');

                        response.selleruser.forEach(function(selleruser) {
                            var agentDropdown = '<select class="form-select agent-select" data-agent-id="' + selleruser.id + '">' +
                                '<option value="">Select Agent</option>' + agentOptions +
                                '</select>';

                            var row = '<tr>' +
                                '<td>' + selleruser.username + '</td>' +
                                '<td>' + selleruser.company_name + '</td>' +
                                '<td>' + selleruser.phone + '</td>' +
                                '<td>' + selleruser.email + '</td>' +
                                '<td>' + selleruser.address + '</td>' +
                                '<td>' + selleruser.property_address + '</td>' +
                                '<td>' + '<img src="' + selleruser.property_image + '" alt="Property Image" width="100" height="100">' + '</td>' +
                                '<td>' + selleruser.property_type + '</td>' +
                                '<td>' + agentDropdown + '</td>' +
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

        fetchUserDetails();

        $(document).on('change', '.agent-select', function() {
            var agentId = $(this).val();
            var agentName = $(this).find('option:selected').text();
            var sellerUserId = $(this).data('agent-id');

            $('#selectedAgentDisplay').text('Selected Agent: ' + agentName);
            $('#agent_name').val(agentName);

            if (agentId) {
                $('#newUserRequestFormSection').show();
            } else {
                $('#newUserRequestFormSection').hide();
            }
        });

        $('#newUserRequestForm').on('submit', function(e) {
            e.preventDefault();

            var formData = {
                agent_name: $('#agent_name').val(),
                task: $('#task').val(),
                due_date: $('#dueDate').val(),
                notes: $('#notes').val(),
                seller_user_id: $('.agent-select').data('agent-id')
            };

            $.ajax({
                url: '{{ route('assign_agent') }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert('Request submitted successfully!');
                    fetchUserDetails();
                    $('#newUserRequestFormSection').hide();
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
    </script>
    <style>
       /* Main container and layout adjustments */
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
    width: 100%;
    padding: 0;
}

/* Table styles */
.table-responsive {
    overflow-x: auto;
}

.table-section {
    border-collapse: collapse;
    width: 98%;
    margin: 0 auto;
    background-color: #f8f9fa;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.table-section th {
    background-color: #3c2626;
    color: white;
    padding: 12px;
    text-align: left;
    white-space: nowrap;
}

.table-section td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table-section tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table-section tr:hover {
    background-color: #ddd;
}

/* Header style */
.centered-header {
    text-align: center;
    font-weight: bold;
    font-size: 23px;
    color: white;
    margin-bottom: 11px;
    padding-top: 57px;
}

/* Form section styling */
.form-section {
    display: none;
    margin-top: 20px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.form-label {
    font-weight: bold;
    color: #333;
}

#selectedAgentDisplay {
    text-align: center;
    font-weight: bold;
    color: #4CAF50;
    margin-bottom: 20px;
}

/* Centered button */
.btn-center {
    display: flex;
    justify-content: center;
}

.btn-primary {
    background-color: #4CAF50;
    border-color: #4CAF50;
}

.btn-primary:hover {
    background-color: #45a049;
    border-color: #45a049;
}

/* Media queries for responsive layout */
@media (max-width: 768px) {
    .table-section {
        width: 100%;
    }
    
    .centered-header {
        font-size: 20px;
    }
    
    .form-section {
        padding: 15px;
    }
}

    </style>
</body> 
</html>
