<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Agent</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            overflow: hidden;
        }

        /* Background image */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-image: url('{{ asset("images/bguser.png") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(10px);
            z-index: -1;
        }

        .contact-form-container {
            background: #ffffff;
            padding: 39px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 612px;
            width: 100%;
            margin: 80px auto;
        }

        h2 {
            text-align: center;
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 2rem; /* Increase size as needed */
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            font-size: 0.9rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
            display: inline-block;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #6f42c1;
            outline: none;
        }

        .form-row {
            display: flex;
            gap: 10px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #333;
            color: #fff;
            font-size: 1rem;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
            text-align: center;
        }

        .btn-submit:hover {
            background-color: #555;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .text-center {
    font-weight: bold;
    font-size: 2.5em;
}

    </style>
</head>
<body>

@include('user.userheader')

<div class="contact-form-container">
<h1 class="text-center" style="font-weight: bold; font-size: 2.5em;">Contact Agent</h1>
    <form id="contactForm">
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="userName">Your Name *</label>
                <input type="text" class="form-control" id="userName" name="user_name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="userPhone">Your Phone Number *</label>
                <input type="tel" class="form-control" id="userPhone" name="user_phone" placeholder="Enter your phone number" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="userAddress">Your Address *</label>
                <input type="text" class="form-control" id="userAddress" name="user_address" placeholder="Enter your address" required>
            </div>
            <div class="form-group">
                <label for="agentName">Agent Name *</label>
                <input type="text" class="form-control" id="agentName" name="agent_name" placeholder="Enter agent's name" required>
            </div>
        </div>
        <div class="form-group">
            <label for="agentPhone">Agent Phone Number *</label>
            <input type="tel" class="form-control" id="agentPhone" name="agent_phone" placeholder="Enter agent's phone number" required>
        </div>
        <div class="form-group">
            <label for="message">Message *</label>
            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter your message to the agent" required></textarea>
        </div>
        <button type="submit" class="btn-submit">Send Message</button>
    </form>
</div>

<!-- jQuery and AJAX script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#contactForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            // Collect form data
            let formData = $(this).serialize();

            // Send AJAX request
            $.ajax({
                url: "{{ url('agent_Message') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message); // Display the success message
                        $('#contactForm')[0].reset(); // Clear the form if needed
                    }
                },
                error: function(xhr) {
                    alert("An error occurred. Please try again.");
                }
            });
        });
    });
</script>
</body>
</html>
