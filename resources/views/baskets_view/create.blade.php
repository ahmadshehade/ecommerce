<!DOCTYPE html>
<html>
<head>
    <title>Create Basket</title>
    <!-- تضمين أنماط Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    .container{
        margin-left: auto;
        margin-top:150px;
        width: 300px;
    }
</style>
<body>


    <div class="container">
        <h1>Create Basket</h1>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{route('storeBasket',['id'=>auth('web')->user()->id])}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="mony">Mony</label>
                <input type="text" name="mony" class="form-control">
                @error('mony')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <footer>
        <!-- إضافة بودي الصفحة هنا -->
    </footer>

    <!-- تضمين ملفات JavaScript اللازمة -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
