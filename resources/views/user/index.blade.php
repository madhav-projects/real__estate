<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/logo md.png" type="">
    <title>RealEstate</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- Font Awesome Style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- Responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>
<body>
    <div class="hero_area">
    <div class="container">

        <!-- header section starts -->
       @include('user.userheader')
        <!-- end header section -->
        <!-- search section -->
        <div class="hero_area">
        <video autoplay muted loop id="bgVideo">
            <source src="images/user1.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        <div class="search_section">
    <h1>Find the Perfect Home</h1>
    <p>Stop looking. Start finding with LuxeDwell</p>
    
    <div class="button_group">
    <a href="{{ url('/fetch_agent_property') }}" class="btn btn-success">Buy</a>
    <a href="{{ url('/view_seller') }}" class="btn btn-success">Sale</a>
</div>


        
    </div>
                  
                    
                  </form>
               </div>
         </div>
      </div>
      </div>

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .hero_area {
            position: relative;
            height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            overflow: hidden;
        }
        #bgVideo {
    position: absolute;
    top: 0;
    left: 0;
    min-width: 100%;
    min-height: 100%;
    z-index: -1;
    object-fit: cover;
}
.search_section {
    opacity: 0; /* Start hidden for animation */
    animation: fadeIn 1.5s ease forwards;
}
        
        .search_section h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }
        .search_section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        .search_form .form-control {
            /* margin-bottom: 10px; */
            min-width: 150px;
            margin-right: 10px;
        }
        .search_form {
    display: flex;
    justify-content: center;
    gap: 30px; /* Increased space between buttons */
}
.button_group {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
}
.button_group .btn-success {
    background-color: #d4a253;
    border-color: #d4a253;
    padding: 10px 20px;
    font-size: 1.1rem;
    min-width: 100px;
    transition: background-color 0.3s ease, transform 0.3s ease;
    cursor: pointer;
}
.button_group .btn-success:hover {
    background-color: #c49248;
    border-color: #c49248;
    transform: scale(1.1);
}
@keyframes fadeIn {
    0% {
        opacity: 0;
        transform: translateY(20px); /* Slide up slightly as it fades in */
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
    </style>

       <!-- end slider section -->
      
      @include('user.body')

      <!-- footer start -->
      <footer>
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                   <div class="full">
                      <div class="logo_footer">
                        <a href="#"><img width="210" src="images/logo md.png" alt="#" /></a>
                      </div>
                      <div class="information_f">
                        <p><strong>ADDRESS:</strong> Saveetha Nagar,Chennai</p>
                        <p><strong>TELEPHONE:</strong> +91 987 654 3210</p>
                        <p><strong>EMAIL:</strong> yourmail@gmail.com</p>
                      </div>
                   </div>
               </div>
               <div class="col-md-8">
                  <div class="row">
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Menu</h3>
                        <ul>
                           <li><a href="#">Home</a></li>
                           <li><a href="#">About</a></li>
                           <li><a href="#">Services</a></li>
                           <li><a href="#">Testimonial</a></li>
                           <li><a href="#">Blog</a></li>
                           <li><a href="#">Profile</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Account</h3>
                        <ul>
                           <li><a href="#">Account</a></li>
                           <li><a href="#">Checkout</a></li>
                           <li><a href="#">Login</a></li>
                           <li><a href="#">Register</a></li>
                           <li><a href="#">Shopping</a></li>
                           <li><a href="#">Widget</a></li>
                        </ul>
                     </div>
                  </div>
                     </div>
                  </div>     
                  <div class="col-md-5">
                     <div class="widget_menu">
                        <h3>Newsletter</h3>
                        <div class="information_f">
                          <p>Stay Updated on Real Estate Opportunities</p>
                        </div>
                        <div class="form_sub">
                           <form>
                              <fieldset>
                                 <div class="field">
                                    <input type="email" placeholder="Enter Your Mail" name="email" />
                                    <input type="submit" value="Subscribe" />
                                 </div>
                              </fieldset>
                           </form>
                        </div>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer end -->
      <div class="cpy_">
         <p> © 2024 All Rights Reserved By Your Real Estate Company
         Empowering Your Real Estate Journey
         </p>
      </div>
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>