<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    .container {
  margin-top: 20px;
  width:100%;


}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 500px;
  margin: 0 auto;
  background-color: #f7f7f7;
}

.card-header {
  background-color: #333;
  color: #fff;
  padding: 10px;
}

.card-body {
  padding: 20px;
}

.form-group {
  margin-bottom: 20px;
}

label {
  font-weight: bold;
}

.btn-primary {
  background-color: #007bff;
  color: #fff;
  border: none;
}

.btn-primary:hover {
  background-color: #0069d9;
}

.main .card{
    border: none;
    width: 100%;

  box-shadow: 12px 12px 6px #495058;

}
</style>
<body >
    {{-- <header>
        <!-- عناصر الـ header هنا -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Your Website</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header> --}}
    <div style="display: flex">
        <div style="width: 75%;">
            <div class="container">
                <div class="row">
                    <div style="width: 100%;" class="main">
                        <div class="card" style="width: 100%;">
                            <div class="card-header">
                                Update Product
                            </div>
                            <div class="card-body">
                                <form action="{{ route('updateproduct', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price:</label>
                                        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="amount">Amount:</label>
                                        <input type="number" class="form-control" id="amount" name="amount" value="{{ $product->amount }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image:</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="width: 25%;">
            <div class="container">
                <img src="{{ asset($product->image) }}" alt="" style="max-width: 100%;">
            </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

