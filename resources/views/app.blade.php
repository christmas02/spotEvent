<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="description" content="Nous sommes une plateforme de mise en relation entre les acteurs de l'univers du mariage et les personnes désireuses de réaliser un mariage.">
    <meta name="keywords" content="mariage - prestataires - annuaire nuptial digita">
    <meta name="author" content="spotevent - impactafric.com">
    <title>Spoteventapp</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{asset('/public/image/favicon.png')}}" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-211953716-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-211953716-1');
    </script>

</head>


<body>
    <div id="app"></div>
    <script src="{{ asset('/js/main.js') }}"></script>
</body>

</html>
