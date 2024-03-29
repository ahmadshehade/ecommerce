<!-- ملف: showlogin.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <!-- ربط Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- تخصيص الأنماط الإضافية -->
    <style>
        body {
            background-color: #f8f9fa;
            padding: 50px;
        }

        .login-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 30px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .submit-btn {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-form">
                    <h2>تسجيل الدخول</h2>

                    <form method="POST" action="{{ route('successLogin') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">ِAdmin Email:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary submit-btn">تسجيل الدخول</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ربط Bootstrap مع الملفات اللازمة -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
