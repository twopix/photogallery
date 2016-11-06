{{--@section ('variables')--}}
{{--- var config = {defaultTitle : 'Заголовок по-умолчанию'}--}}

{{--include common/pug/_mixins--}}
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta content="" name="author">
        <meta content="" name="description">
        <meta content="" name="keywords">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="IE=edge" http-equiv="x-ua-compatible">
        <meta name="format-detection" content="telephone=no">
        <meta name="skype_toolbar" content="skype_toolbar_parser_compatible">
        <link rel="icon" href="./assets/img/favicon.png" type="image/png">
        <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/png">
        <link rel="stylesheet" href="./assets/css/foundation.css">
        <link rel="stylesheet" href="./assets/css/app.css">
        <script src="./assets/js/foundation.js" defer>
        <script src="./assets/js/app.js" defer></script>


        <!--[if lt IE 9]>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
        <![endif]-->

    </head>
    <body>
        @section('content')

            section content
        @show
    </body>
</html>