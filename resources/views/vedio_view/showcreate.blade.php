<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <form method="POST" action="{{ route('store.video') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Video</label>
        <input type="file" class="form-control" id="name" name="video" required>
    </div>
    <button  type="submit" class="btn btn-primary">Save</button>
    </form>

</body>
</html>
