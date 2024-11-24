<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxeDwell Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .sidebar {
            width: 270px;
            background-color: #333;
            color: #fff;
            height: 100vh;
            position: fixed;
            padding-top: 132px;
            flex-direction: column; 
            align-items: center;   
        }
        .sidebar h2 {
    text-align: center;
    margin-bottom: 3px;
    padding: 15px;
    background-color: #3c2626; /* Steel Blue */
    color: white;
    border-radius: 25px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    font-size: 1.8em;
    font-weight: bold;
    width: 99%;
    border: 3px solid #ffd000; /* Golden border */
}

     .sidebar a {
    display: flex;              /* Use flexbox for links */
    justify-content: center;    /* Center text horizontally */
    align-items: center;        /* Center text vertically */
    padding: 15px;
    text-decoration: none;
    color: #fff;
    width: 100%;                 /* Make links uniform */
    text-align: center;
    margin-bottom: 10px;        /* Add spacing between links */
    border: 4px solid transparent; /* Transparent border for alignment */
    border-radius: 10px;        /* Rounded edges */
    transition: background 0.3s, border 0.3s;
    border-bottom: 2px solid #ffd000; 
}

        .sidebar a:hover {
            background-color: #575757;
        }
        .sidebar i {
            margin-right: 10px;
        }
        
        .content {
    margin-left: 250px;
    padding: 20px;
    flex-grow: 1;
    text-align: center;   /* Center-align text */
    font-weight: bold;    /* Make text bold */
}

       
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>LuxeDwell Admin</h2>
        <a href="/home"><i>🏠</i> Home</a>
        <a href="/Realtrondetail"><i>📊</i> Company Details</a>
        <a href="/Agentdetails"><i>👤</i> Agent Details</a>
        <a href="/propertydetails"><i>🏢</i> Property Details</a>
        <a href="/profile"><i>👤</i> Profile</a> <!-- Added Profile link -->

    </div>

    

</body>
</html>
