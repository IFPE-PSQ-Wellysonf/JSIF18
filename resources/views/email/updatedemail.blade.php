<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet"> 
    <style>
        body{
            font-family: 'PT Sans', sans-serif;
        }
    </style>
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
    <div style="margin:0 auto; width: 700px; text-align: center;">
        <h1>{{ env('APP_NAME') }}</h1>
        <img src="{{ asset('img/logo.PNG') }}" style="max-width: 15%; margin: 0 auto;">
        <h3>Prezado {{ $user->name }}</h3>
        <br>
        <p>Este é um email de confirmação de seu email na pré inscrição dos {{ env('APP_NAME') }}. Assim que as modalidades e o cronograma do evento forem confirmados você deverá selecionar àquelas que deseja participar</p>
    </div>
</body>
</html>