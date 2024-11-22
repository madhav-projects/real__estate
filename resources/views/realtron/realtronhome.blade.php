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
      <!-- header section starts -->
      
        <!-- end header section -->
    <div class="container">

    @include('realtron.header')
        <!-- search section -->
        <div class="hero_area">
        <video autoplay muted loop id="bgVideo">
            <source src="images/hlo.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
         <div class="search_section">
               <h1>Find the Perfect Home</h1>
               <p>Stop looking. Start finding with RL Groups</p>
               <div class="search_form">
                  <form action="properties.html" method="get" class="form-inline justify-content-center">
                     <select class="form-control" name="type">
                           <option value="">Types</option>
                           <option value="houses">Houses</option>
                           <option value="plots">Plots</option>
                           <option value="houses_plots">Houses & Plots</option>
                     </select>
                     <select class="form-control" name="category">
                           <option value="">Categories</option>
                           <option value="rent">Buy</option>
                           <option value="sale">Sale</option>
                     </select>
                     <select class="form-control" name="city">
                           <option value="">Cities</option>
                           
                     </select>

                  
                    
                     <button type="submit" class="btn btn-success">Search Properties</button>
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
        /* .luxe-text {
         position: absolute;
         top: 23px;
         left: 138px;
         z-index: 1000;
         font-weight: bold;
         font-size: 30px;
         font-size: 1.5em;
         color: black;
         text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      } */
        #bgVideo {
    position: absolute;
    top: 0;
    left: 0;
    min-width: 100%;
    min-height: 100%;
    z-index: -1;
    object-fit: cover;
}
        
        /* .navbar-brand img {
            height: 40px;
        }
        .navbar-nav {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .nav-item {
            margin: 0 15px;
        }
        .nav-link {
            text-decoration: none;
            color: #333;
            font-size: 16px;
        }
        .nav-link:hover {
            color: #d4a253;
        } */
        .search_section {
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            margin: auto;
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
        .search_form .btn-success {
            background-color: #d4a253;
            border-color: #d4a253;
        }
        .search_form .btn-success:hover {
            background-color: #c49248;
            border-color: #c49248;
        }
    </style>

       <!-- end slider section -->
      
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>Properties</span>
               </h2>
            </div>
            <div class="row">
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p1.webp" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           4 BHK Luxury Apartments for sale in Alwarpet
                        </h5>
                        <h6>
                           9.00Cr
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/pl1.jpeg" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           The Emerging New Trend Of Best Villa Plots In Chennai
                        </h5>
                        <h6>
                           80L
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p2.webp" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           4 BHK Luxury Independent Villas for sale in ECR
                        </h5>
                        <h6>
                           5.8Cr
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/pl2.jpeg" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           Residentail Plot
                        </h5>
                        <h6>
                           70L
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p3.webp" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           4 BHK Villa in ECR Chennai
                        </h5>
                        <h6>
                           2.5Cr
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/pl3.jpeg" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           Residential Land for sale in Chennai
                        </h5>
                        <h6>
                           58L
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p4.webp" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           4 BHK Ultra Luxury House near Royapettah for sale
                        </h5>
                        <h6>
                           8.6Cr
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/pl4.jpeg" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           Best Plots with your Convenient Price
                        </h5>
                        <h6>
                           28L
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p5.webp" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           3 BHK Gated Villa for Rent in ECR (Seaside)
                        </h5>
                        <h6>
                           6.5Cr
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/pl5.jpeg" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           1200 Sqft Residential Plot for sale
                        </h5>
                        <h6>
                           28L
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p6.webp" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           4 BHK Luxury Apartments in Nungambakkam for sale
                        </h5>
                        <h6>
                           6.7Cr
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/pl6.jpeg" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           Residential 2000 Sqft Plot for sale at Chengalpattu, Chennai
                        </h5>
                        <h6>
                           32L
                        </h6>
                     </div>
                  </div>
               </div>
            </div>
            <div class="btn-box">
               <a href="">
               View All Properties
               </a>
            </div>
         </div>
      </section>
      <!-- end product section -->

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