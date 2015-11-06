<html>
<head>
    <title> @yield('title') </title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="/rawatjalan/public/css/roboto.min.css" rel="stylesheet">
    <link href="/rawatjalan/public/css/material.min.css" rel="stylesheet">
    <link href="/rawatjalan/public/css/ripples.min.css" rel="stylesheet">

</head>
<body>

@include('navbar')

@yield('content')

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script src="/rawatjalan/public/js/ripples.min.js"></script>
<script src="/rawatjalan/public/js/material.min.js"></script>
<script>
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>
</body>

</html>