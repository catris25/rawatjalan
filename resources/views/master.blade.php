<html>
<head>
    <title> @yield('title') </title>
    <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">-->
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="/rawatjalan/public/css/roboto.min.css" rel="stylesheet">
    <link href="/rawatjalan/public/css/bootstrap.css" rel="stylesheet">
    <!--<link href="/rawatjalan/public/css/material.min.css" rel="stylesheet">-->
    <link href="/rawatjalan/public/css/ripples.min.css" rel="stylesheet">
    <link href="/rawatjalan/public/css/materialize.min.css" rel="stylesheet">

</head>
<style>
    a:hover {
      text-decoration: none;
      color:#FFFFFF;
    }
</style>

<body>

@include('navbars')

@yield('content')


<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>-->

<script src="/rawatjalan/public/js/ripples.min.js"></script>
<!--<script src="/rawatjalan/public/js/material.min.js"></script>-->
<script src="/rawatjalan/public/js/materialize.js"></script>
<!-- <script>
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script> -->
<script>
    $(document).ready(function() {
    	$('select').material_select();
    	$(".button-collapse").sideNav();
    });
</script>
	
<script>
	$(document).ready(function() {
    	$(".dropdown-button").dropdown({
    		constrain-width: true;
    		hover: true;
    		belowOrigin: true;
    	});
    	
    });
</script>

<script>
    $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15 // Creates a dropdown of 15 years to control year
    });
</script>
</body>

</html>
