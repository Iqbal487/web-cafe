<?php
require_once("../../../../vendor/autoload.php");
use App\ProfilePicture\ProfilePicture;
use App\BITM\SEIPXXXX\Message\Message;
if(!isset( $_SESSION)) session_start();
echo Message::message();

?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Profile Picture</title>


    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
    <link rel="stylesheet" href="../../../../assets2/css/style.css">
    <link rel="stylesheet" href="../../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../../../../../resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <style>
        body{background-image: url(../../../../assets/img/backgrounds/1.jpg) !important;}
    </style>
</head>

<body>

<h1 style="text-align: center;"><b>Profile Picture<b/></h1>

<table class="table" style="width:900px;margin:0 auto; ">
                <?php
                $obj = new ProfilePicture();
                $allData = $obj->index("OBJ");
                ?>
                <tbody>
                <tr class="danger">
                    <td>Serial</td>
                    <td>Name</td>
                    <td>Photo</td>
                    <td>Action</td>
                </tr>
                <?php
                $count = 1;
                foreach($allData as $data){?>
                    <script type="text/javascript">
                        function readURL_<?php echo $data->ProfilePictureId;?>(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#blah_<?php echo $data->ProfilePictureId;?>').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>

                    <?php
                    if($count%2==0) $class ="info" ;
                    else $class="success" ;
                    echo'
                   <form action="edit.php" method="post" class="form-group" enctype="multipart/form-data" id="form1" runat="server">
                   <tr class="'.$class.'">

                       <input name="ProfilePictureId" type="hidden" value="'.$data->ProfilePictureId.'">
                       <td>'.$count.'</td>
                       <td><input name="ProfilePictureName" class="form-control" type="text" value="'.$data->ProfilePictureName.'" placeholder="Book Title"></td>
                       <td>
                       <input type="file" onchange="readURL_'.$data->ProfilePictureId.'(this);" name="ProfilePicturePath">
                    <img id="blah_'.$data->ProfilePictureId.'" src="'.$data->ProfilePicturePath.'" alt="your image" class="img-thumbnail" alt="Cinque Terre" width="250" height="200">
                       <!--
                       <div class="col-sm-12">
                          <img src="'.$data->ProfilePicturePath.'" class="img-thumbnail" alt="Cinque Terre" width="250" height="200">
                        <input type="file" name= "ProfilePicturePath" class="form-control" >
                       </div>-->
                       </td>
                       <td>
                       <div class="btn-group">
                          <button type="submit" class="btn btn-primary">Edit</button>
                         <a href="edit.php?id='.$data->ProfilePictureId.'"><button type="button" class="btn btn-warning">Soft Delete</button></a>
                          <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                        </td>

                   </tr>
                   </form>';
                    $count++;
                }

                ?>

                </tbody>
            </table>
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

