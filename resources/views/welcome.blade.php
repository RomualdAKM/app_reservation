<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
        <!-- Favicon icon-->
        <link rel="icon" href="{{ asset('/assets/images/favicon.png') }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.png') }}" type="image/x-icon">
        <!-- Google font-->
       <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
        <!-- Custom Select css--> 
        <link rel="stylesheet" href="{{ asset('/assets/css/vendors/custom-select.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/output.css') }}">
       
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        
    </head>
    <body>
        <div id="app">

        </div>
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ mix('js/script.js') }}"></script>
        <script src="{{ mix('js/sidebar.js') }}"></script>

        
         <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
        <!-- Feather Icon Js -->
        <script src="{{ asset('/assets/js/feather.min.js') }}"></script>
        <script src="{{ asset('/assets/js/feather-custom.js') }}"></script>
        <!-- Select Js -->
        <script src="{{ asset('/assets/js/custom-select.js') }}"></script>
        <!-- Apex Chart Js -->
        <script src="{{ asset('/assets/js/apexchart/apexcharts.js') }}"></script>
        <script src="{{ asset('/assets/js/apexchart/apex-common.js') }}"></script>
        <script src="{{ asset('/assets/js/apexchart/unique-custom.js') }}"></script>
        <!-- Sidebar Js -->
        {{-- <script src="{{ asset('/assets/js/sidebar.js') }}"></script> --}}
        <!-- customizer js-->
        <script src="{{ asset('/assets/js/customizer.js') }}"> </script>
        <!-- Custom script   -->
        {{-- <script src="{{ asset('/assets/js/script.js') }}"> </script> --}}
    </body>
</html>
