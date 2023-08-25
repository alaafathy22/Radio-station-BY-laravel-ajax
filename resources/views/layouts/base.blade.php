<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- title Dynamics pages --}}
    <title>@yield('title')</title>
    {{-- Bootstrap link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    {{-- Fontawsome link --}}
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    {{-- my style sheet link --}}
    <link rel="stylesheet" href="css/styles.css">
    {{-- my style sheet link --}}
    <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="icon" href="{{ asset('photos/quran.png') }}">
    {{-- ---------------- ajax ------------------- --}}
    <script src="js/ajaxFile.js"></script>
    {{-- ---------------- end ajax ------------------- --}}

</head>
<div id="loading_body" class="loading_body">
    اللهم صلى على سيدنا محمد
    </br>
    ( صلى الله عليه وسلم )
</div>

<body class="antialiased">
    @yield('content')
    {{-- JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Bootstrap link --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    {{-- Fontawsome link --}}
    <script src="js/all.min.js"></script>
    {{-- JQUERY --}}
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.com/libraries/bodymovin" type="text/javascript"></script>
    {{-- my JS sheet link --}}
    <script src="js/customeJs.js" type="module"></script>
    <script src="js/plugins.js"></script>
</body>

</html>
