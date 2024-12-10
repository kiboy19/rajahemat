<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333333;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #555555;
        }

        input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }

        .login-button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="/register" method="POST">
    <div class="login-container">
        @error('name')
        <small class="">{{ $message }}</small>
        @enderror
        <h1>Register</h1>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
        @error('email')
        <small class="">{{ $message }}</small>
        @enderror
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" id="email" name="email" required>
            </div>
        @error('password')
            <small class="">{{ $message }}</small>
            
        @enderror
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            @error('confirm_password')
            <small class="">{{ $message }}</small>
            
        @enderror
            <div class="form-group">
                <label for="confirm_password">Password</label>
                <input type="password" id="confirm password" name="confirm password" required>
            </div>
            @csrf
            <button type="submit" class="login-button">Masuk</button>
        </form>
       </div>
       <script>
        $('.show-confirm-password').on('click', function(){
            if($('#confirm-password').atte('type') == 'password'){
                $('#confirm-password').atte('type', 'text');
            }else{
                $('#confirm-password').atte('type', 'password');
            }
        })
    </script>
</body>
</html>
