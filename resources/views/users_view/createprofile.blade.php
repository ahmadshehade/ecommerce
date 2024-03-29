<!DOCTYPE html>
<html>
<head>
    <title>Create Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {

            background-color: transparent;
            border: none;
        }
        #cont{
            border: none;
              background-color: transparent;
            margin-right: 75px;

        }
        .card-header {
            text-align: center;
            font-weight: bold;
            font-size: 24px;
            background-color: transparent;
        }
        .card-body{
            background-color: transparent;
        }
        .alert {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 20px;
            background-color: transparent;
        }


         img{
            margin-right: 50px;
            height: 100vh;
         }
         .main{
          
          display: flex;
           width: 100%;
           background-color: gray;

         }
         .form-control{
            border-radius:15px;
         }
          label{
            font-family:'Courier New', Courier, monospace;
            font-weight: bold;
         }

    </style>
</head>
<body style="width:100%;background-color:gray" >
    <div style="display: flex" class="main" >
    <section class="col-md-7" id="sec1">
    <div class="container">
        <div class="row justify-content-center"  >
            <div class="col-md-7" id="b1">
                <div class="card" id="cont">
                    <div class="card-header">Create Profile</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('storeprofile') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ auth('web')->user()->name }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="age" >Age</label>
                                <input type="number" class="form-control" id="age" name="age" required>
                            </div>

                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" required>
                            </div>

                            <div class="form-group">
                                <label for="number">Number</label>
                                <input type="number" class="form-control" id="number" name="number" required>
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <!-- Add more form fields for country, gender, photo, and number -->

                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control-file" id="photo" name="photo" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{--  --}}

 <section class="col-md-6 " id="sec2">
        <div  >
            <div class="row justify-content-center">
                <div class="col-md-7" id="b2">
                  <img src="{{asset('profile.jpeg')}}" alt="" width="100%">
                </div>
            </div>
        </div>
    </section>
</div>
<footer class="footer bg-dark text-light" style="width:100%">
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
