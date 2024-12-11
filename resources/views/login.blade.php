<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to PodCentral</title>
    @vite('resources/css/login.css')
</head>


<body>
    
    <div class="login-container">
        <h1>Login to podcentral</h1>
        @include('login.login-options')
        <div class="separator">
            <span>OR</span>
        </div>
        @include('login.login-form')
        @include('login.signup-link')
    </div>
</body>
</html>
