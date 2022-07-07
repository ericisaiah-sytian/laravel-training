<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Laravel Training</title>

    </head>
    <body>
        <x-header/>
        <x-success />
        <x-alert />
        
        {{$slot}}
    </body>
</html>
