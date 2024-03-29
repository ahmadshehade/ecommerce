<!DOCTYPE html>
<html>
<head>
    <title>Show Basket</title>
    <!-- تضمين أنماط Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    .container{

      width: 75%;
      background-color: transparent;

    }
    .section2{

        width: 50%;
    }
    .section2 img{
        width: 100%;
    }
    .section1{

        display: flex;
        width: 50%;
        background-size: cover;
        background-repeat: no-repeat;
        background-color: silver;

    }

    .main{
        display: flex;
    }

    .form-control{
        background-color: transparent;
        border-radius: 25px;

    }
    .col input{
        background-color: transparent;
    }
    #in1  , #in2 , #in3{
        background-color: transparent;
    }
    @media (max-width: 750px){
     .row .col  {
        flex-direction: column; /* تغيير اتجاه العناصر إلى عمودي */
    align-items: flex-start; /* تحديد محاذاة العناصر إلى اليسار */
    margin-right: 0;
    width: 75px;
     }
     .row .col form button{
        width: 75px;
     }
     .col a{
        width: 75px;

     }
    }

</style>
<body >
    <header>
        <!-- إضافة هيدر الصفحة هنا -->
    </header>
<div class="main" >
  <section class="section1">
    <div class="container ">
        <h1> Basket</h1>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <div class="row">
            <div class="col">
                <p>Basket Name:</p>
                <input type="text" class="form-control" id="in1" value="{{ $basket->name }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Element Count:</p>
                <input type="text" class="form-control" id="in2"  value="{{ $basket->element_count }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Mony:</p>
                <input type="text" class="form-control" id="in3" value="{{ $basket->mony }}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col" style="margin-right: 300px;display:flex;width:75px;height:150px" >
               <a style="width:75px;height:40px;  border-radius: 12px"  href="{{route('showprofile',['id'=>$user->id])}}" class="btn btn-info">Back</a>
               <a style="width:75px;height:40px ;border-radius: 12px"  href= "{{route('editbasket',['id'=>auth('web')->user()->id])}}" class="btn btn-secondary">Update</a>
               <form action="{{route('deleteBsaket',['id'=>$user->id])}}" method="POSt">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger" style="border-radius: 12px">Delete</button>

              </form>
              <a style="width:75px;height:40px;border-radius: 12px"  href= "{{route('allItems',['id'=>auth('web')->user()->id])}}" class="btn btn-outline-warning">Items</a>

       </div>
    </div>
    <div class="row">
        <div class="col">

       </div>
    </div>

</section>
 {{--  --}}
 <section class="section2">
    <img src="{{asset('basket.jpg')}}" alt="">
 </section>
<div>
</div>
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



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
