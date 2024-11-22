<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            margin: 0;
            padding-top: 60px;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 98vw;
            height: 100vh;
            overflow-x: hidden;
            position: relative;
            z-index: 1;
        }

        /* Fullscreen blurred background */
        body::before {
            content: "";
            position: fixed; /* Fixed to cover the entire viewport */
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-image: url('images/bguser.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed; /* Keeps the image fixed during scroll */
            filter: blur(8px);
            z-index: -1; /* Behind content */
        }

        .property-card {
            margin-bottom: 20px;
        }
        .property-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            cursor: pointer;
        }
        h1.text-center.font-weight-bold {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 24px;
            padding: 14px;
            color: white;
        }
        .alert {
            color: red;
            margin-top: 20px;
        }
        .carousel-inner img {
            height: 400px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    @include('user.userheader')
    <div class="container py-5">
        <h1 class="text-center font-weight-bold">Properties for Sale</h1>
        <div id="alertMessage" class="alert" style="display: none;"></div>
        
        <!-- Carousel Section -->
        <div id="propertyCarousel" class="carousel slide mb-5" data-ride="carousel" style="display: none;">
            <div class="carousel-inner" id="carouselImages">
                <!-- Carousel images will be populated by JavaScript -->
            </div>
            <a class="carousel-control-prev" href="#propertyCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#propertyCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div id="propertyCards" class="row">
            <!-- Property cards will be populated by JavaScript -->
        </div>
    </div>

    <script>
        function fetchProperties() {
            $.ajax({
                url: '{{ url("/fetch_agent_property") }}',
                method: 'GET',
                success: function(response) {
                    const propertyCards = $('#propertyCards');
                    const alertMessage = $('#alertMessage');
                    propertyCards.empty();
                    alertMessage.hide();

                    if (response.properties && response.properties.length > 0) {
                        response.properties.forEach(function(property) {
                            const card = `
                                <div class="col-md-4 property-card">
                                    <div class="card">
                                        <img src="${property.image1}" alt="Image 1" class="card-img-top" onclick="showInCarousel(${property.id}, '${property.image1}', '${property.image2}', '${property.image3}')">
                                        <div class="card-body">
                                             
                                            <p class="card-text">
                                                <strong>Selling Type:</strong> ${property.selling_type}<br>
                                                <strong>Company Name:</strong> ${property.company_name}<br>
                                                <strong>Address:</strong> ${property.address}<br>
                                                <strong>Price:</strong> ${property.price }
                                            </p>
                                            <a href="/show_allproperties/${property.id}" class="btn btn-primary mt-2">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            `;
                            propertyCards.append(card);
                        });
                    } else {
                        alertMessage.text('No properties found for this user.').show();
                    }
                },
                error: function(xhr, status, error) {
                    $('#alertMessage').text('Error fetching properties. Please try again later.').show();
                }
            });
        }

        function showInCarousel(id, image1, image2, image3) {
            const carouselImages = $('#carouselImages');
            const propertyCarousel = $('#propertyCarousel');

            // Clear previous images in the carousel
            carouselImages.empty();

            // Add new images to the carousel
            const carouselItem1 = `<div class="carousel-item active"><img src="${image1}" class="d-block w-100" alt="Property Image 1"></div>`;
            const carouselItem2 = `<div class="carousel-item"><img src="${image2}" class="d-block w-100" alt="Property Image 2"></div>`;
            const carouselItem3 = `<div class="carousel-item"><img src="${image3}" class="d-block w-100" alt="Property Image 3"></div>`;
            carouselImages.append(carouselItem1 + carouselItem2 + carouselItem3);

            // Show the carousel
            propertyCarousel.show();
        }

        $(document).ready(function() {
            fetchProperties();
        });
    </script>
</body>
</html>
