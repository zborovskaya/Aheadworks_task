<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>React App</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <link href="{{mix('css/app.css')}}" type="text/css" rel="stylesheet" />
</head>
<body class="antialiased">
<!-- React DOM Node -->
<div id="ticketApp"></div>
<script type="text/javascript" src="{{mix('js/app.js')}}"></script>
</body>
</html>
