<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
        <div id="app">
            <navbarmenu></navbarmenu>
            <sidebarmenu></sidebarmenu>
            <credit-card-form></credit-card-form>
        </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
