<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container w-100">
        <img width="120" src="../images/logo md.png" alt="Logo" />
        <div class="luxe-text">LuxeDwell</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>
        <div class="collapse navbar-collapse justify-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
               
                <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                    <a class="nav-link animated-button" href="{{url('/home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link animated-button" href="">Properties</a>
                </li> -->
                <li class="nav-item {{ Request::is('fetch_agent_property') ? 'active' : '' }}">
                    <a class="nav-link animated-button" href="{{url('/fetch_agent_property')}}">Buy</a>
                </li>
                <li class="nav-item {{ Request::is('view_seller') ? 'active' : '' }}">
                    <a class="nav-link animated-button" href="{{url('view_seller')}}">Sale</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link animated-button" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link animated-button" href="{{url('/seller')}}">Contact</a>
                </li> -->
                <x-app-layout></x-app-layout>
            </ul>
        </div>
    </nav>
</header>

<style>
    .header_section {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 10;
        background-color: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar-nav {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .nav-item {
        margin: 0 15px;
        position: relative;
    }

    .nav-link {
        text-decoration: none;
        color: #333;
        font-size: 16px;
        font-weight: bold;
        padding: 10px 15px;
        border-radius: 25px;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .nav-link:hover {
        color: white;
        background-color: #d4a253;
        box-shadow: 0px 4px 10px rgba(212, 162, 83, 0.5);
        transform: translateY(-3px);
        transition: 0.3s ease-out;
    }

    .animated-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: #d4a253;
        transition: all 0.4s ease;
        z-index: -1;
    }

    .animated-button:hover::before {
        left: 0;
    }

    .animated-button:active {
        transform: scale(0.95);
    }

    .active .nav-link {
        background-color: #d4a253;
        color: white;
        box-shadow: 0px 4px 10px rgba(212, 162, 83, 0.7);
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

    .navbar-toggler {
        border: none;
        outline: none;
    }

    .navbar-toggler span {
        display: inline-block;
        width: 30px;
        height: 3px;
        background-color: #333;
        margin-top: 5px;
        transition: 0.3s;
    }

    .navbar-toggler:hover span {
        background-color: #d4a253;
        
    }
    .search_section {
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            margin: auto;
    }
            
</style>
