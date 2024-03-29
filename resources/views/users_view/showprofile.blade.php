<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
  body{
    background: linear-gradient(rgb(53, 133, 129), rgb(191, 255, 43), rgb(233, 10, 185));
  }
</style>
<body>

    <div class="row" style="margin-top: 25px">
    <div class="col-md-6">
        <div class="row justify-content-center" >
            <div style="width:100%">
                <div class="card" style="background-color: transparent;border:none">
                    @php
                        $id=auth('web')->user()->id;
                    @endphp
                    <div class="card-header" style="display: flex">
                        <h4 style="float: left">User Profile</h4>
                        <div style="display: inline-flex;margin-left:20%">
                      
                        <a style="width: ;height:37px;" href="{{route('allproduct')}}" class="btn btn-outline-light"  >Back</a>
                      <a style="width: ;height:37px;margin-left: 10px" href="{{route('editprofile',['id'=>$id])}}" class="btn btn-primary" >Update</a>
                      @if (!$profile->basket)
                      <a style="width: ;height:37px;margin-left:10px" href="{{route('createBasket',['id'=>$id])}}" class="btn btn-primary">BasketCreate</a>

                      @endif
                      @if ($profile->basket)

                      <a style="width: ;height:37px;margin-left:10px" href="{{route('showBasket',['id'=>$user->id])}}" class="btn btn-primary">Basket</a>

                      @endif

                      <form method="POST" action="{{route('deleteProfile',['id'=>$id])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"  style="margin-left: 10px">Delete</button>
                    </form>

                   </div>
                    </div>

                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @else
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $profile->name }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="number" class="form-control" id="age" name="age" value="{{ $profile->age }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" value="{{ $profile->country }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <input type="text" class="form-control" id="gender" name="gender" value="{{ $profile->gender }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="number">Number</label>
                                <input type="number" class="form-control" id="number" name="number" value="{{ $profile->number }}" readonly>
                            </div>


                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
   <div class="col-md-6" style="border-radius: 25px; height:550px" >
    <img src="{{ asset( $profile->photo) }}" alt="Profile Photo" class="img-thumbnail" style="border-radius: 25px;width:95%;height:100%">
   </div>
   {{-- <a href="{{ route('downloadimage',['id'=>auth('web')->user()->id]) }}">تنزيل الصورة</a> --}}
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
