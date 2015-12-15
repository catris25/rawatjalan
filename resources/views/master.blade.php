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
    <link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>


</head>
<style>
    a:hover {
      text-decoration: none;
      color:#FFFFFF;
    }

    p {
        font-family: 'Lato';
    }

    .boxx {
        font-family: 'Lato';
        width:40%;
        margin:auto;
        height:10%;
        border-bottom:2px solid;
    }

    .boxx h1 {
        font-size: 4vw;
    }

    .splitt {
        margin:auto;
        float:left;
        width:100%;
        display:inline-block;
    }

    .splitpt {
        float:left;
        width:45%;
        display:inline-block;
    }

    .datacek {
        width:70%;
        margin:auto;
    }

    .boxcek {
        font-family:'Lato';
        text-align:center;
        font-size:20px;
        margin:auto;
        width:15%;
        height:4%;
    }

    .boxcek h3 {
        font-size: 20px;
        font-family: 'Lato';
    }

    td a {
        transition: all 0.5s ease;
    }

    td a:hover {
        color:#000000;
    }

    h5 {
        font-family:'Lato';
    }

    table {
        font-family: 'Raleway';
    }

    thead {
        text-align: center;
        font-weight: bold;
    }

    form {
        font-family: 'Roboto Slab';
    }

    .dropdown-content {
        font-family: 'Droid Sans';
    }

    .brand-logo {
        font-family: 'Droid Sans';
    }

    .dropdown-button {
        font-family: 'Droid Sans';
    }

    .boxcaricontainer {
        margin:auto;
    }

    .boxcari {
        width:86%;
        margin:0 auto;
        display:inline-block;
    }

    .boxfindleft {
        width:80%;
        display: inline-block;
    }

    .boxfindmiddle {
        width:15%;
        display:inline-block;
    }

    .boxfindright {
        width:4%;
        display: inline-block;
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
      selectMonths: true, //months enabled
      //dateFormat: 'dd-mm-yy', 
      format: 'dd-mm-yyyy',
      selectYears: 15 // Creates a dropdown of 15 years to control year
    });
</script>
</body>

</html>
