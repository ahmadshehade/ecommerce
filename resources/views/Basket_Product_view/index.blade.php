<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
      body{
    background: linear-gradient(rgb(53, 133, 129), rgb(191, 255, 43), rgb(233, 10, 185));
  }
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Basket Products</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('allproduct')}}">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('showprofile',['id'=>auth('web')->user()->id])}}">profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('showBasket',['id'=>auth('web')->user()->id])}}">Back</a>
                </li>
            </ul>
        </div>
    </nav>
    @if(session('error'))
    <div class="alert alert-danger" style="margin-left: 20px;">
        {{ session('error') }}
    </div>
@endif
    <div class="container mt-4">
        <h1>Basket Products</h1>

        <h3 style="background-color: silver">Welcome, {{ $user->name }}</h3>

        @if ($basket)
            <div class="card">
                <div class="card-header">
                    <h3>Your Basket:</h3>
                </div>
                <div class="card-body">

                    <p>Basket Name: {{ $basket->name }}</p>
                </div>
            </div>
        @else
            <p>No Basket available.</p>
        @endif

        <h3>All Products in Basket:</h3>
        @if ($items->count() > 0)
            <ul class="list-group">
                @foreach ($items as $item)

                    <li class="list-group-item">
                        <span class="fw-bold">Product Name:</span> {{ $item->product_name }}
                        <form action="{{route('returnproduct',['id'=>$user->id ,'id1'=>$item->product_id])}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class=" btn btn-outline-success">Return </button>
                        </form>
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">Product Price:</span> {{ $item->product_price }}$
                    </li>
                @endforeach
            </ul>
        @else
            <p>No products in the basket.</p>
        @endif
    </div>
    <footer class="footer bg-dark text-light">
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
