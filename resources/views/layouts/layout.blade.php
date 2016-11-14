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
        <link rel="icon" href="favicon.png" type="image/png">
        <link rel="shortcut icon" href="favicon.png" type="image/png">
        <link rel="stylesheet" href="assets/css/app.css">


        <!--[if lt IE 9]>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
        <![endif]-->

		<script>
			var baseUrl = "{{ url('/') }}/";
			var csrfToken = "{{ csrf_token() }}";
		</script>

    </head>
    <body ng-app="authApp">
        @section('content')

        @show

        <!-- Application Dependencies -->
        <script src="assets/js/angular.min.js"></script>
        <script src="assets/js/angular-ui-router.js"></script>
        <script src="assets/js/satellizer.js"></script>
        <script src="assets/js/angular-animate.min.js"></script>
        <script src="assets/js/angular-messages.min.js"></script>
		<script src="assets/js/ng-file-upload-shim.min.js"></script><!-- shim is needed to support non-HTML5 FormData browsers (IE8-9)-->
		<script src="assets/js/ng-file-upload.min.js"></script>
        <script src="assets/js/foundation.js"></script>

        <!-- Application Scripts -->
        <script src="app/app.js"></script>
        <script src="app/controllers/authController.js"></script>
        <script src="app/controllers/userController.js"></script>
        <script src="app/controllers/albumController.js"></script>
        <script src="app/controllers/regController.js"></script>
		<script src="app/controllers/fileUploadController.js"></script>
    </body>
</html>