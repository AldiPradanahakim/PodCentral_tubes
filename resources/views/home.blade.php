<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PodCentral</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 
    @vite(['resources/css/home.css','resources/js/home.js']) 


</head>
<body>

    @include('landingpage.header')
    @include('landingpage.hero')
    @include('landingpage.podcast-section')
    @include('landingpage.slider-container')
    @include('landingpage.podcast-slider-container')
    @include('landingpage.podcast-slider-container2')
    @include('landingpage.podcast-slider-container3')
    @include('landingpage.host-section')
    @include('landingpage.footer')    


    @stack('scripts')
</body>
</html>
