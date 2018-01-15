<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env("APP_NAME") }}</title>
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
    <link rel="icon" href="/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/app.css">
    @yield("css")
</head>
<body>

    <div id="app">
        @include("layouts.header")

        <main>
            @yield("content")
        </main>

        @include("layouts.footer")
    </div>

    <script src="/js/app.js"></script>
    @yield("js")

</body>
</html>