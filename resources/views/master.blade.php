<html>
<head>
    <title> @yield('title') </title>

    <link href="https://cdn.jsdelivr.net/bootstrap.material-design/0.4.4/css/roboto.min.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/ripples.min.css" rel="stylesheet">
    <link href="../css/materialize.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>



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

    a {
        transition:all 0.5s ease;
    }

    a:hover {
        color:#000000;
    }

    h5 {
        font-family:'Lato';
    }

    table {
        font-family: 'Droid Sans';
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
        width:14%;
        display:inline-block;
    }

    .boxfindright {
        width:4%;
        display: inline-block;
    }

    .boxerror {
        width:60%;
        height:40%;
        margin:0 auto;
        position:absolute;
        left:50%;
        top:50%;
        margin-left:-30%;
        margin-top:-20%;
        display: inline-block;
    }

    .beup {
        height:60%;
        text-align: center;
        width:100%;
        font-family: 'Lato';
        font-size: 6.5vw;
        border-bottom:3px solid;
    }

    .bedown {
        height:19%;
        text-align: center;
        width:100%;
        font-family: 'Lato';
    }

    .bedown h1 {
        font-family: 'Lato';
        font-size: 2.2vw;
        text-align: center;
    }

    .bedown h2 {
        font-family: 'Lato';
        font-size: 1.4vw;
        text-align: center;
    }

    .validasi {
        font-family: 'Lato';
        width:70%;
        margin:auto;
        height:6%;
        border-bottom:2px solid;
    }

    .validasi p {
        font-size: 1.5vw;
        text-align: center;
    }

    .validtab {
        width:70%;
        margin:auto;
    }

    .validsub {
        width:70%;
        margin:auto;
    }

    .rminfo {
        width:100%;
        margin:auto;
        border-bottom:1px solid;
        height:5%;
    }

    .rminfo p {
        text-align: center;
        font-family: 'Lato';
        font-size: 12px;
    }

    .footer {
        font-family:'Lato';
        margin:auto;
        width:25%;
        height:5%;
        border-bottom: 1px solid;
        border-top: 1px solid;
        color:#d4d4d4;
        text-align:center;
        font-size: 12px;
        vertical-align: middle;
        display: block;
        transition: all 0.5s ease;
    }

    .footer:hover {
        border-bottom:1px #212121 solid;
        border-top:1px #212121 solid;
        color:#212121;
    }

    .center {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        
        -webkit-box-align: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
        
        -webkit-box-pack: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
    }

    .boxesrm {
        width:100%;
        margin:0 auto;
        display:inline-block;
        padding-left:5%;
    }

    .boxrm {
        width:23%;
        display: inline-block;
    }

    .boxcetak {
        width:100%;
        margin:0 auto;
        display:inline-block;
        padding-left: 5%;
    }

    .boxcetakdate {
        width:40%;
        display:inline-block;
    }

    .boxcetaksub {
        margin-left: 1%;
        width:15%;
        display: inline-block;
    }

</style>


<body>

@include('navbars')

@yield('content')

<div class="footer center"><span class="glyphicon glyphicon-copyright-mark"></span>Copyright - Group 2 Anapersis 2015
</div>

<script src="../js/ripples.min.js"></script>
<script src="../js/materialize.js"></script>
<script>
    $(document).ready(function() {

        $('select').material_select();
        $(".button-collapse").sideNav();
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
</head>


</body>

</html>
