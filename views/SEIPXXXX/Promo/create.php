<?php
include_once('../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();
use App\BITM\SEIPXXXX\Message\Message;


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Insert</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../../../resource/assets/css/style.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../../../../assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../../../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../../../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../../../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../../../assets/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</head>

<body>

<!-- Top menu -->
<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Bootstrap Registration Form Template</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->

    </div>
</nav>

<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">

            <div class="row">
                <div class="col-sm-4 book">

                </div>
                <div class="col-sm-5 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Upload Profile Pic</h3>
                            <p>Fill in the form below to get instant access:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-pencil"></i>
                        </div>
                    </div>
                    <div class="form-bottom">

                        <?php


                        echo'

                        <form role="form" action="store.php" method="post" class="registration-form" enctype="multipart/form-data">
                            <div class="form-group">
                            <div class="form-group">
                                <label class="sr-only" for="form-first-name"> Promo ID</label>
                                <input type="number" name="id" placeholder="Promo ID" class="form-first-name form-control" id="id">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-first-name"> User ID</label>
                                <input type="number" name="user_id" placeholder="User ID" class="form-first-name form-control" id="user_id">
                            </div>
                                <label class="sr-only" for="form-first-name"> Promo Description</label>
                                <input type="text" name="promo_des" placeholder="Promo Description" class="form-first-name form-control" id="promo_des">
                            </div>
                            <div class="form-group">
                            <input type="file" onchange="readURL(this);" name="promo_pic">
                    <img id="promo_pic" src="download.png" alt="your image" class="img-thumbnail" alt="Cinque Terre" width="250" height="200">
                    
                            <!--
                                <label class="sr-only" for="BookAuthor">Photo</label>
                              <input type="file" name= "ProfilePicturePath" class="form-first-name form-control" > -->
                              </div>

                            <button type="submit" class="btn">Submit</button>
                        </form>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function removeFadeOut( el, speed ) {
        var seconds = speed/1000;
        el.style.transition = "opacity "+seconds+"s ease";

        el.style.opacity = 0;
        setTimeout(function() {
            el.parentNode.removeChild(el);
        }, speed);
    }

    removeFadeOut(document.getElementById('msg'), 9000);
</script>
<!-- Javascript -->
<script src="../../../../assets/js/jquery-1.11.1.min.js"></script>
<script src="../../../../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../../assets/js/jquery.backstretch.min.js"></script>
<script src="../../../../assets/js/retina-1.1.0.min.js"></script>
<script src="../../../../assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../../../../assets/js/placeholder.js"></script>
<![endif]-->

</body>

</html>