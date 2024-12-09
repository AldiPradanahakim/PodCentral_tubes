<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PodCentral</title>
  @vite(['resources/css/halamanutama.css','resources/js/halamanutama.js']) 
</head>
<body>

    @include('halamanutama/sidebar') 

    <div class="main-content">
         
        @include('halamanutama/header') 
        @include('halamanutama/beranda-section') 
        @include('halamanutama/detail-section') 
        @include('halamanutama/history-section') 
        @include('halamanutama/koleksi-section') 
        @include('halamanutama/podcast-episodes') 
        @include('halamanutama/footer')
        
    </div>

</body>
</html>
