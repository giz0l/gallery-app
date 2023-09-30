<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
         <!-- Flickity CSS -->
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    </head>
    <body class="px-2">

        @yield('content')

        <!-- Flickity -->
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    </body>
</html>
