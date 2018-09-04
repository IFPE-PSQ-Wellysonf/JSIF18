<!DOCTYPE html>
<html lang="pt-br">
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
        <h3>Olá {{ $user->name }}</h3>
        <br>
        <p>Considerando sua pré-inscrição no evento V Jogos dos Servidores do IFPE, solicitamos que efetive sua inscrição através do link abaixo</p>
        <p> <a href="{{ route('inscricao1') }}">Confirmação</a></p>
        <p>Informamos que a efetivação da inscrição é pré-requisito para participação no evento e só será possível até o dia 06/09/2018 às 12h</p>
    </div>
</body>
</html>