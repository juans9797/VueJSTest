<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="{{asset('css/CreditCardForm.css')}}">
    </head>
    <body>
        <div id="app">
            <navbarmenu></navbarmenu>
            <sidebarmenu></sidebarmenu>
            <creditcardformbootstrap></creditcardformbootstrap>
        </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
