<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required value="{{ old('email') }}">

        <label for="password">Password Baru:</label>
        <input type="password" name="password" id="password" required>

        <label for="password_confirmation">Konfirmasi Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>

        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
