<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Property Details</title>
    <link rel="stylesheet" href="/path/to/your/styles.css"> <!-- Ensure correct path -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="property-details" id="propertyDetails">
    <h1>Property Details</h1>
    <p><strong>Company Name:</strong> <span id="companyName">{{ $property->company_name }}</span></p>
    <p><strong>Agent Name:</strong> <span id="agentName">{{ $property->agent_name }}</span></p>
    <p><strong>Price:</strong> ₹<span id="price">{{ number_format($property->price, 2) }}</span></p>

    <h2>Price Breakdown</h2>
    <p><strong>Admin Share (5%):</strong> ₹<span id="adminShare">{{ number_format($property->price * 0.05, 2) }}</span></p>
    <p><strong>Company Share (10%):</strong> ₹<span id="companyShare">{{ number_format($property->price * 0.10, 2) }}</span></p>
    <p><strong>Agent Share (15%):</strong> ₹<span id="agentShare">{{ number_format($property->price * 0.15, 2) }}</span></p>
    <p><strong>User Share (70%):</strong> ₹<span id="userShare">{{ number_format($property->price * 0.70, 2) }}</span></p>

    <div class="button-container">
        <button onclick="window.history.back();">Go Back</button>
        <button id="submitBtn">Submit</button>
    </div>
</div>

    </div>

    <style>
        /* Reset some defaults */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #b33e00, #f5a623); /* Using deep brown and yellow gradient */
            padding: 40px;
            color: #333;
        }

        /* Container for centering content */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Property details card */
        .property-details {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
            color: #333;
        }

        .property-details h1 {
            color: #b33e00; /* Deep brown for title */
            font-size: 32px;
            margin-bottom: 20px;
        }

        .property-details h2 {
            color: #b33e00; /* Deep brown for subtitle */
            font-size: 24px;
            margin-top: 20px;
        }

        .property-details p {
            font-size: 18px;
            margin: 15px 0;
        }

        .property-details p span {
            font-weight: bold;
            color: #f5a623; /* Yellow for highlighted text */
        }

        /* Button styles */
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        .button-container button {
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 45%;
            transition: background-color 0.3s ease;
        }

        .button-container button#submitBtn {
            background-color: #f5a623; /* Yellow for Submit button */
            color: white;
        }

        .button-container button#submitBtn:hover {
            background-color: #e6951f; /* Darker yellow on hover */
        }

        .button-container button {
            background-color: #b33e00; /* Deep brown for Go Back button */
            color: white;
        }

        .button-container button:hover {
            background-color: #933200; /* Darker brown on hover */
        }

        /* Additional styling for small screens */
        @media (max-width: 768px) {
            .button-container {
                flex-direction: column;
            }

            .button-container button {
                width: 100%;
                margin-top: 10px;
            }

            .property-details {
                padding: 20px;
            }

            .property-details h1 {
                font-size: 28px;
            }

            .property-details h2 {
                font-size: 20px;
            }
        }
    </style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Set CSRF token for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // AJAX call to fetch property details by ID (Optional: If needed)
            function fetchPropertyDetails(propertyId) {
                $.ajax({
                    url: '/property/' + propertyId,
                    type: 'GET',
                    success: function (response) {
                        // Update the HTML content with property data
                        $('#companyName').text(response.company_name);
                        $('#agentName').text(response.agent_name);
                        $('#price').text(parseFloat(response.price).toFixed(2));
                        $('#adminShare').text((response.price * 0.05).toFixed(2));
                        $('#companyShare').text((response.price * 0.10).toFixed(2));
                        $('#agentShare').text((response.price * 0.15).toFixed(2));
                        $('#userShare').text((response.price * 0.70).toFixed(2));
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching property details:', error);
                    }
                });
            }

            // Submit button click event
            // Submit button click event
            $('#submitBtn').click(function () {
            const data = {
                company_name: $('#companyName').text(),
                agent_name: $('#agentName').text(),
                price: parseFloat($('#price').text().replace(/,/g, '')),
                admin_share: parseFloat($('#adminShare').text().replace(/,/g, '')),
                company_share: parseFloat($('#companyShare').text().replace(/,/g, '')),
                agent_share: parseFloat($('#agentShare').text().replace(/,/g, '')),
                user_share: parseFloat($('#userShare').text().replace(/,/g, ''))
            };

            // AJAX request to send data to the server
            $.ajax({
                url: '/property/save', // URL of the route in your Laravel app
                type: 'POST',
                data: data,
                success: function (response) {
                    alert(response.message); // Show success message
                },
                error: function (xhr, status, error) {
                    console.error('Error submitting property details:', xhr.responseText); // Shows detailed error
                    alert('Error saving property details. Please try again.');
                }
            });
        });
        });
    </script>
</body>

</html>
