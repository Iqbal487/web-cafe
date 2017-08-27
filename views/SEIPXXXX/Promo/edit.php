<?php
include_once("../../../../vendor/autoload.php");
use App\ProfilePicture\ProfilePicture;

$obj = new ProfilePicture();
$obj->setData($_POST);

if(isset($_GET['id'])) $obj->softDelete($_GET['id']);
else $obj->edit();
