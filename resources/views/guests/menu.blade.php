<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Restaurnat-Menu</title>

        {{-- per mettere vue aggiungiamo il css --}}
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
                
    </head>
    <body>
        
        <div id="root"></div>
        <script src="{{asset('js/menu.js')}}"></script>
    </body>
</html>
