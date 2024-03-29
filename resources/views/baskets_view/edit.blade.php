<!DOCTYPE html>
<html>
<head>
    <title>Edit Basket</title>
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
    .row{

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
    .mainform{
        width: 50%;
        margin: auto;
    }
 </style>
</head>
<body>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <h2 style="margin-left: 350px;margin-top:25px">Update Basket</h2>
<form action="{{route('updateBasket',['id'=>$user->id])}}" method="POST" class="mainform">
    @csrf

        <div class="col">
            <p>Mony:</p>
            <input type="number"  name="mony" class="form-control" id="in3" value="{{ $basket->mony }}" required  >
        </div>
    </div>




           <button class="btn btn-outline-info" type="submit">Update</button>



</form>
</body>
</html>
