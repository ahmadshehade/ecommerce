<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  crossorigin="anonymous" />
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <style>
        .product-card {
            margin-bottom: 20px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
        }
        .card:hover{
         background-color:gray;

         transition: 0.5s;


        }
        .card-body a:hover{
         background-color: gold;
         transform: scale(1.2);
         transition-delay: 1.5s;
         border-radius: 12px;
        }

    </style>

</head>
<body>
@php
    $seq=1;
@endphp
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark" >
        <div class="container-fluid" >
          <a class="navbar-brand" href="#">Product</a>
          <button  class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 75%">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item">
                 @if ( auth('web')->check())
                @if ( auth('web')->user()->profile)
                <a class="nav-link" href="{{ route('showprofile', ['id' => auth('web')->user()->id]) }}">Profile</a>
            @else
                <a class="nav-link" href="{{ route('createprofile') }}">Create Profile</a>
            @endif
            @endif
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if (auth('web')->check() )
                {{auth('web')->user()->name}}
                @else
                {{auth('admin_web')->user()->name}}
                @endif

                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li>
                    @if (auth('web')->check())


                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                       <button type="submit" style="background-color: transparent ;border:none;margin-left:12px">Logout</button>
                    </form>
                    @else
                    <form action="{{route('logoutAdmin')}}" method="POST">
                        @csrf
                       <button type="submit" style="background-color: transparent ;border:none;margin-left:12px">Logout</button>
                    </form>
                    @endif

                  </li>

                </ul>
              </li>
              @if ( auth('admin_web')->check() && auth('admin_web')->user())

              <li class="nav-item">
                 <a class="nav-link" href="{{ route('createProduct') }}">Create product</a>
              </li>
              



           @endif
            </ul>

        </div>
      </nav>
      @if(session('error'))
      <div class="alert alert-danger" style="margin-left: 20px;">
          {{ session('error') }}
      </div>
  @endif

        {{--  --}}
        <div class="container" style="display: flex; flex-wrap: wrap;">
            @foreach ($products as $product)

            <div class="card" style="width: 20rem; margin: 8px;" id="seq">
                <img src="{{ asset($product->image) }}" class="card-img-top" alt="..." style="height:200px">
                <div class="card-body">
                    <h5 class="card-title" >{{ $product->name }}</h5>
                    <p class="card-text" style="width: 250px">{{ $product->description }}</p>
                    <hr>
                    <strong>Price: {{ $product->price }}$</strong>
                    <hr>

                    <div style="display: flex">
                        <a href="{{route('showProduct',['id'=>$product->id])}}" class="btn btn-success">show</a>
                        @if(auth('admin_web')->user())
                        <a href="{{route('editproduct',['id'=>$product->id])}}" class="btn btn-primary">Update</a>
                        <form action="{{route('deleteproduct',['id'=>$product->id])}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class=" btn btn-danger">Delete</button>
                        </form>
                        @endif
                        @if (auth('web')->user())
                        <form action="{{ route('buyproduct', ['id1' => $product->id, 'id' => auth('web')->user()->id]) }}" method="POST">
                            @csrf

                            <button class=" btn btn-outline-light">Buy</button>
                        </form>
                        @endif


                    </div>


                </div>
            </div>

            @endforeach
            <div class="d-flex justify-content-center" style="margin-left: 45%">
                <ul class="pagination">
                    @if ($products->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                    @else
                        <li class="page-item"><a href="{{ $products->previousPageUrl() }}" class="page-link">&laquo;</a></li>
                    @endif

                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        @if ($page == $products->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                        @endif
                    @endforeach

                    @if ($products->hasMorePages())
                        <li class="page-item"><a href="{{ $products->nextPageUrl() }}" class="page-link">&raquo;</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                    @endif
                </ul>
            </div>
        </div>



        {{-- footer --}}
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
</body>
</html>
