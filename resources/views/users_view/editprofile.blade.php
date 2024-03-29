<!DOCTYPE html>
<html>
<head>
    <title>Create Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
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
                    @php
                    $id=auth('web')->user()->id;
                    $x=$profile->gender;
                @endphp
                        <form method="POST" action="{{ route('storeUpdateProfile',['id'=>$id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="age">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{auth('web')->user()->name}}" >
                            </div>

                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="number" class="form-control" id="age" name="age" value="{{$profile->age}}" >
                            </div>
                            <div class="form-group">
                                <label for="age">Country</label>
                                <input type="text" class="form-control" id="country" name="country" value="{{$profile->country}}" >
                            </div>
                            <div class="form-group">
                                <label for="age">Number</label>
                                <input type="number" class="form-control" id="number" name="number" value="{{$profile->number}}">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>

                                    <option  value="{{( $profile->gender='Male')? $x='Male':'Female'}}" selected >{{$x}}</option>
                                    <option value="{{( $profile->gender='Male')? $x='Female':'Male'}}">{{$x}}</option>
                                </select>
                            </div>

                            <!-- Add more form fields for country, gender, photo, and number -->

                            <div class="form-group">
                                <label for="image">Photo</label>
                                <input type="file" class="form-control-file" id="image" name="photo" >
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
