<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            background-color: #f8f9fa;
        }

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
            filter: blur(12px);
            z-index: -1;
        }

        h1.text-center.font-weight-bold {
            font-size: 2.5rem;
            color: #343a40;
            text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.3);
            margin-bottom: 30px;
        }

        .card {
            background: #ffffffdd;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
            border-radius: 12px;
            overflow: hidden;
            max-width: 1000px;
            margin: 0 auto;
        }

        .card-body {
            padding: 20px;
            color: #343a40;
        }

        .card-title {
            font-size: 1.75rem;
            color: #495057;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .contact-btn {
            font-size: 0.9rem;
            padding: 8px 16px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .contact-btn:hover {
            background-color: #0056b3;
            color: #fff;
        }

        .icon {
            margin-right: 8px;
            color: #000;
        }

        .icon:hover {
            color: #333;
            transition: color 0.2s ease-in-out;
        }

        .property-details {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 20px;
        }

        .property-details p {
            margin-bottom: 8px;
            font-size: 1.1rem;
            min-height: 32px;
        }

        /* Selected image styling */
        .selected-image img {
            width: 100%;
            height: 524px;
            object-fit: cover;
            border-radius: 12px;
        }

        /* Carousel thumbnails */
        .carousel-thumbnails {
        display: flex;
        justify-content: center; /* Center-align images */
        overflow-x: auto;
        margin-top: 10px;
        gap: 10px;
        padding-bottom: 10px;
    }
        .carousel-thumbnails img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        .carousel-thumbnails img:hover {
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            h1.text-center.font-weight-bold {
                font-size: 2rem;
            }

            .selected-image img {
                height: 250px;
            }

            .property-details {
                grid-template-columns: 1fr 1fr 1fr;
            }
        }

        @media (max-width: 576px) {
            .property-details {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    @include('user.userheader')

    <div class="container py-5">
        <h1 class="text-center font-weight-bold">Property Details</h1>
        
        @if($property)
            <div class="selected-image mb-4">
                <img id="mainImage" src="{{ asset($property->image1) }}" alt="Selected Property Image">
            </div>

            <!-- Image Thumbnails Carousel -->
            <div class="carousel-thumbnails">
                <img src="{{ asset($property->image1) }}" alt="Property Image 1" onclick="displayImage('{{ asset($property->image1) }}')">
                @if($property->image2)
                    <img src="{{ asset($property->image2) }}" alt="Property Image 2" onclick="displayImage('{{ asset($property->image2) }}')">
                @endif
                @if($property->image3)
                    <img src="{{ asset($property->image3) }}" alt="Property Image 3" onclick="displayImage('{{ asset($property->image3) }}')">
                @endif
                @if($property->image4)
                    <img src="{{ asset($property->image4) }}" alt="Property Image 4" onclick="displayImage('{{ asset($property->image4) }}')">
                @endif
            </div>

            <!-- Property Details Card -->
            <div class="card mt-4">
                <div class="card-body">
                    <div class="card-title">
                        {{ $property->agent_name }} - {{ $property->property_type }}
                        <a href="{{ route('user_contact', ['id' => $property->agent_id]) }}" class="contact-btn">Contact Agent</a>
                    </div>
                    <div class="property-details">
                        <p><i class="fas fa-home icon"></i><strong>Property Type:</strong> {{ $property->property_type }}</p>
                        <p><i class="fas fa-tags icon"></i><strong>Selling Type:</strong> {{ $property->selling_type }}</p>
                        <p><i class="fas fa-bed icon"></i><strong>BHK:</strong> {{ $property->bhk }}</p>
                        <p><i class="fas fa-bed icon"></i><strong>Bedroom:</strong> {{ $property->bedroom }}</p>
                        <p><i class="fas fa-bath icon"></i><strong>Bathroom:</strong> {{ $property->bathroom }}</p>
                        <p><i class="fas fa-utensils icon"></i><strong>Kitchen:</strong> {{ $property->kitchen }}</p>
                        <p><i class="fas fa-wind icon"></i><strong>Balcony:</strong> {{ $property->balcony }}</p>
                        <p><i class="fas fa-couch icon"></i><strong>Hall:</strong> {{ $property->hall }}</p>
                        <p><i class="fas fa-layer-group icon"></i><strong>Floor:</strong> {{ $property->floor }}</p>
                        <p><i class="fas fa-building icon"></i><strong>Total Floor:</strong> {{ $property->total_floor }}</p>
                        <p><i class="fas fa-expand icon"></i><strong>Area Size:</strong> {{ $property->area_size }} sq ft</p>
                        <p><i class="fas fa-city icon"></i><strong>City:</strong> {{ $property->city }}</p>
                        <p><i class="fas fa-map-marker-alt icon"></i><strong>State:</strong> {{ $property->state }}</p>
                        <p><i class="fas fa-map-pin icon"></i><strong>Address:</strong> {{ $property->address }}</p>
                        <p><i class="fas fa-info-circle icon"></i><strong>Status:</strong> {{ $property->status }}</p>
                        <p><i class="fas fa-dollar-sign icon"></i><strong>Price:</strong> ${{ $property->price }}</p>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-danger text-center mt-5">{{ $message ?? 'No property details available.' }}</div>
        @endif
    </div>
    <div class="mt-4 text-center">
    <p style="font-size: 1.2rem; color: white;">
        LuxeDwell offers premium real estate solutions, helping you find your dream property with ease.
        Our platform features a curated selection of homes and a seamless experience for both buyers and sellers.
        Discover LuxeDwell for a luxurious and effortless property journey.
    </p>
</div>

    <script>
        function displayImage(imagePath) {
            document.getElementById('mainImage').src = imagePath;
        }
    </script>


</body>
</html>
