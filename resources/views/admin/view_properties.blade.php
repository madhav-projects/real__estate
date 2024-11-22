<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agents List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Additional CSS for layout */
        .header_section {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .main-content {
            display: flex;
            margin-top: 80px; /* Space for fixed header */
            min-height: 100vh; /* Full height */
        }

        .sidebar {
            width: 250px; /* Fixed width for sidebar */
            background-color: #f8f9fa;
            padding: 20px;
            min-height: 100vh; /* Full height */
            position: fixed; /* Keep it fixed to the left */
            top: 80px; /* Space for fixed header */
            left: 0;
        }

        .content {
            margin-left: 250px; /* Push content to the right to make space for the sidebar */
            padding: 20px;
            width: 100%; /* Ensure content takes the remaining width */
        }

        .table-container {
            margin-top: 20px;
        }

        #agentsTable {
            width: 100%; /* Make the table take up the full width of its container */
        }

        /* Search bar styling */
        .search-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }

        .search-input {
            width: 300px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header_section">
        @include('admin.header') <!-- Include the header -->
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Sidebar -->
        <div class="sidebar">
            @include('admin.sidebar') <!-- Include the sidebar -->
        </div>

        <!-- Main Content Area -->
        <div class="content">
            <div class="table-container">
                <h3 class="text-center">Agents Details</h3>
                <div id="loading" class="text-center" style="display: none;">Loading...</div>

                <!-- Search Bar -->
                <div class="search-container">
                    <input type="text" id="searchInput" class="search-input" placeholder="Search agents...">
                </div>

                <table class="table table-bordered" id="agentsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Role</th>
                            <th>Username</th>
                            <th>Agent Company</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Area</th>
                            <th>Pincode</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Agents data will be inserted here by AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            function fetchAgents() {
                $('#loading').show(); // Show loading indicator
                $.ajax({
                    url: '/api/view_properties', // Change this to your actual API endpoint
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        const agentsTableBody = $('#agentsTable tbody');
                        agentsTableBody.empty(); // Clear existing data
                        $('#loading').hide(); // Hide loading indicator

                        if (response.success && response.data.length === 0) {
                            agentsTableBody.append('<tr><td colspan="10" class="text-center">No agents found</td></tr>');
                        } else {
                            $.each(response.data, function(index, agent) {
                                agentsTableBody.append(`
                                    <tr>
                                        <td>${agent.id || 'N/A'}</td>
                                        <td>${agent.role || 'N/A'}</td>
                                        <td>${agent.username || 'N/A'}</td>
                                        <td>${agent.agent_company || 'N/A'}</td>
                                        <td>${agent.phone || 'N/A'}</td>
                                        <td>${agent.address || 'N/A'}</td>
                                        <td>${agent.city || 'N/A'}</td>
                                        <td>${agent.area || 'N/A'}</td>
                                        <td>${agent.pincode || 'N/A'}</td>
                                        <td>${agent.status || 'N/A'}</td>
                                    </tr>
                                `);
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching agents:', error);
                        console.error('Status:', status);
                        console.error('Response Text:', xhr.responseText); // Log the response text
                        const agentsTableBody = $('#agentsTable tbody');
                        agentsTableBody.empty();
                        $('#loading').hide(); // Hide loading indicator
                        agentsTableBody.append('<tr><td colspan="10" class="text-center">Error fetching data</td></tr>');
                    }
                });
            }

            // Call the function to fetch agents when the page loads
            fetchAgents();

            // Implement the search functionality
            $('#searchInput').on('keyup', function() {
                const searchTerm = $(this).val().toLowerCase();
                $('#agentsTable tbody tr').each(function() {
                    const rowText = $(this).text().toLowerCase();
                    $(this).toggle(rowText.indexOf(searchTerm) > -1);
                });
            });
        });
    </script>
</body> 
</html>
