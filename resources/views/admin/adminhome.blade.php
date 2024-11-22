<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealEstate-Admin</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="images/logo md.png" type="">
</head>
<body>
    <div class="hero_area">
        <!-- header section starts -->
       @include('admin.header')
        <!-- header section ends -->
        <div class="statistic-boxes">
        <a href="/Realtrondetail" class="stat-box">🏠 Company Details</a>
    <a href="/Agentdetails" class="stat-box">👤 Agent Details</a>
    <a href="/propertydetails" class="stat-box">🏢 Property Details</a>
            
        </div>
        <div class="container">
           @include('admin.sidebar')
           @include('admin.body')
        </div>
    </div>

    <div class="scrolling-text">
        LuxeDwell: Unlocking doors to dreams, one Home and Plot at a time.
    </div>

    
    <script src="script.js"></script>
</body>
</html>

<style>
    body {
        margin: 0;
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4; /* Light gray background */
    }
    /* Statistic Boxes */
.statistic-boxes {
    position: absolute;
    top: 170px; /* Adjust as needed */
    left: 60%;
    transform: translateX(-50%);
    display: flex;
    gap: 15px;
    z-index: 10;
}

.stat-box {
    background-color: rgba(255, 255, 255, 0.9);
    padding: 21px 25px;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    font-size: 19px;
    font-weight: bold;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s ease;
    cursor: pointer;
}

.stat-box:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

    .home-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .content {
    margin-left: 250px;
    padding: 20px;
    flex-grow: 1;
    text-align: center;   /* Center-align text */
    font-weight: bold;    /* Make text bold */
}

    .hero_area {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .dashboard {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        padding: 20px;
        box-sizing: border-box;
    }

    .dashboard header {
        width: 100%;
        max-width: 1200px; /* Optional: control max width */
        background-color: #25abeba6; /* Steel Blue */
        color: white;
        padding: 20px;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .dashboard header h1 {
        margin: 0;
        font-size: 2.5em;
        font-weight: bold;
        color: black;
    }

    .dashboard header p {
        margin: 5px 0 0;
        font-size: 1.2em;
        color: black;
    }

    .cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        padding: 20px;
    }

    .card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        margin: 10px;
        flex: 1 1 calc(25% - 40px);
        max-width: calc(25% - 40px);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-content {
        padding: 20px;
        text-align: center;
    }

    .card-content h2 {
        margin: 0;
        font-size: 2em;
        color: #2c3e50; /* Darker shade */
    }

    .card-content p {
        margin: 10px 0 0;
        font-size: 1.2em;
        color: #7f8c8d; /* Slate gray */
    }

    .table-section {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        margin: 20px;
        padding: 20px;
    }

    .table-section h2 {
        margin: 0 0 20px;
        font-size: 1.8em;
        color: #4682b4; /* Steel Blue */
    }

    #agent-form {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
    }

    #agent-form input,
    #agent-form button {
        padding: 10px;
        border: 2px solid #ddd;
        border-radius: 5px;
        transition: border-color 0.2s;
    }

    #agent-form input {
        flex: 1;
    }

    #agent-form input:focus {
        border-color: #4682b4; /* Steel Blue */
    }

    #agent-form button {
        background-color: #84210f; /* Tomato */
        color: #ffd000;
        border: none;
        cursor: pointer;
        transition: background-color 0.2s, transform 0.2s;
    }

    #agent-form button:hover {
        background-color: #ff4500; /* Orange Red */
        transform: translateY(-2px);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #4682b4; /* Steel Blue */
        color: white;
    }

    table tbody tr:nth-child(even) {
        background-color: #f0f8ff; /* Alice Blue */
    }

    table tbody tr:hover {
        background-color: #f5f5dc; /* Beige */
    }

    .table-section button {
        padding: 5px 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        transition: opacity 0.2s;
    }

    .table-section .accept {
        background-color: #2ecc71; /* Emerald */
        color: white;
    }

    .table-section .reject {
        background-color: #e74c3c; /* Cinnabar */
        color: white;
    }

    .table-section .delete {
        background-color: #e67e22; /* Carrot */
        color: white;
    }

    .table-section button:hover {
        opacity: 0.8;
    }

    .scrolling-text {
        position: fixed;
        bottom: 20px;
        width: 100%;
         
        color: black;
        font-size: 1.2em;
        text-align: center;
        padding: 10px 0;
        font-weight: bold;
        overflow: hidden;
        white-space: nowrap;
    }

    .scrolling-text {
        animation: scroll-left 13s linear infinite;
    }
    @keyframes scroll-left {
        from {
            transform: translateX(100%);
        }
        to {
            transform: translateX(-100%);
        }
    }

    @media (max-width: 768px) {
        .cards {
            flex-direction: column;
            gap: 20px;
        }
        .card {
            flex: 1 1 100%; /* Full width on small screens */
            max-width: 100%;
        }
    }
</style>
