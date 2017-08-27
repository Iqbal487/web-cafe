<?php
include_once("../../../../vendor/autoload.php");
use App\ProfilePicture\ProfilePicture;

$obj = new ProfilePicture();
$obj->setData($_POST);
$obj->store();
