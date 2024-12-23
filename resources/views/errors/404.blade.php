<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-red-600 to-red-900 text-white h-screen flex items-center justify-center">

    <div class="text-center max-w-lg mx-auto">
        <!-- 404 Illustration -->
        <div class="mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 mx-auto text-white animate-bounce" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 21h4m1-4H9a4 4 0 01-4-4V7a4 4 0 014-4h6a4 4 0 014 4v6a4 4 0 01-4 4z" />
            </svg>
        </div>

        <!-- Title and Description -->
        <h1 class="text-6xl font-extrabold mb-4">404</h1>
        <p class="text-xl font-medium mb-6">
            Oops! The page you are looking for doesn’t exist.
        </p>

        <!-- Action Buttons -->
        <div class="flex justify-center gap-4">
            <a href="/"
                class="bg-white hover:bg-red-400 hover:text-white text-black font-semibold px-6 py-3 rounded-lg transition duration-200">
                Go to Homepage
            </a>
            <a href="javascript:history.back()"
                class="bg-gray-800 hover:bg-gray-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-200">
                Go Back
            </a>
        </div>
    </div>

</body>

</html>
