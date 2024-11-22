<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container w-100">
        <img width="120" src="images/logo md.png" alt="#" />
        <div class="luxe-text">LuxeDwell</div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>

        <div class="collapse navbar-collapse justify-end" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{url('/home')}}">Home</a>
                </li>

                <li class="nav-item {{ Request::is('showagentregister') ? 'active' : '' }}">
                    <a class="nav-link" href="{{url('/showagentregister')}}">Agents</a>
                </li>
                <li class="nav-item {{ Request::is('viewuser_request') ? 'active' : '' }}">
                    <a class="nav-link" href="{{url('/viewuser_request')}}">User Request</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li> 
                <li class="nav-item">
                    <x-app-layout></x-app-layout>
                </li>
                <!-- User Profile Section -->
                @if(Auth::user()->id == 1)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{url('/profile')}}">Profile</a>
                        <a class="dropdown-item" href="{{url('/profile/edit')}}">Edit Profile</a>
                        <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</header>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .header_section {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 10;
        background-color: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
    }

    .navbar-nav {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .navbar-nav .nav-item {
        margin-left: 15px;
    }

    .nav-link {
        text-decoration: none;
        color: #333;
        font-size: 16px;
        padding: 10px 15px; /* Add padding for better click area */
        transition: background-color 0.3s, color 0.3s, transform 0.3s; /* Add transition for smooth effects */
        border: 2px solid transparent;
    }

    .nav-link:hover {
        background-color: #d4a253; /* Hover background color */
        color: white; /* Hover text color */
        border-radius: 5px; /* Rounded corners for hover effect */
        transform: translateY(-5px); /* Animate button upward on hover */
        border: 2px solid #b3933a; /* Border for hover */
    }

    /* Active state for the current page */
    .nav-item.active .nav-link {
        background-color: #b3933a; /* Background color for the active item */
        color: white; /* Text color for the active item */
        border-radius: 5px; /* Rounded corners for active item */
        transform: scale(1.05); /* Slightly enlarge the active item */
        border: 2px solid #b3933a; /* Add a border to the active item */
    }

    .navbar-toggler {
        display: none;
    }

    .luxe-text {
        position: absolute;
        top: 21px;
        left: 150px;
        z-index: 1000;
        font-weight: bold;
        font-size: 30px;
        color: black;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    /* Align menu items to the right */
    .navbar-collapse {
        justify-content: flex-end;
    }

    /* Dropdown menu for user profile */
    .dropdown-menu {
        position: absolute;
        top: 100%;
        right: 0;
        margin-top: 0.5rem;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.15);
        border-radius: 0.25rem;
        min-width: 200px;
    }

    .dropdown-item {
        display: block;
        width: 100%;
        padding: 0.5rem 1rem;
        color: #333;
        background-color: transparent;
        border: 0;
        transition: background-color 0.3s, color 0.3s;
    }

    .dropdown-item:hover {
        background-color: #f8f9fa;
        color: #d4a253;
    }
</style>
