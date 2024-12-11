<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    @vite(['resources/css/signup.css', 'resources/js/signup.js']) 
</head>
<body>

    <div class="signup-container">
        @include('signup/signup-container')
        @include('signup/signup-form')
        @include('signup/footer')
    </div>
</body>
</html>
