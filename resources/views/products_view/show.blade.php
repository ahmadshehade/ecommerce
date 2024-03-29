<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .card {
            border: none;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .card-img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
        .product-details {
            padding: 20px;
        }
        .product-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .product-description {
            margin-bottom: 20px;
        }
        .product-info {
            font-size: 16px;
        }
        body{
    background: linear-gradient(rgb(53, 133, 129), rgb(191, 255, 43), rgb(233, 10, 185));
  }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex">
                        <a href="{{route('allproduct')}}" class="btn btn-light">Back</a>
                        <h2 style="margin-left: 15px">Product Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset($product->image) }}" alt="Product Image" class="card-img">
                            </div>
                            <div class="col-md-6 product-details">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">{{ $product->description }}</p>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Price: {{ $product->price }}$</li>
                                            <li class="list-group-item">Amount: {{ $product->amount }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer bg-dark text-light" style="margin-top: 5px">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <h4>About Us</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sed nulla euismod, fermentum lorem vitae, malesuada orci.</p>
            </div>
            <div class="col-md-4">
              <h4>Quick Links</h4>
              <ul class="list-unstyled">
                <div style="display: flex ">
                <li><a href="#"><i class="fab fa-2x fa-facebook" ></i></a></li>
                <li><a href="#"><i class="fab fa-2x fa-twitter"style="margin-left:50px"></i></a></li>
                </div>
                <div style="display: flex ">
                <li><a href="#"><i class="fab fa-2x fa-instagram" ></i></a></li>
                <li><a href="#"><i class="fab fa-2x fa-youtube" style="margin-left:50px"></i></a></li>
                </div>
              </ul>
            </div>
            <div class="col-md-4">
              <h4>Contact Us</h4>
              <p>123 Street, City, Country</p>
              <p>Email: info@example.com</p>
              <p>Phone: +1 123 456789</p>
            </div>
          </div>
        </div>
        <div class="text-center py-3">
          <p>&copy; 2024 Your Company. All rights reserved.</p>
        </div>
      </footer>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
