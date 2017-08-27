<?php
namespace App\ProfilePicture;

use App\Model\Database as DB;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

class ProfilePicture extends DB{
    public $ProfilePictureId="";
    public $ProfilePictureName="";
    public $ProfilePicturePath="empty";
    public $target_file ;




    public function __construct(){
        parent::__construct();
    }
    public function index($Mode="ASSOC")
    {
        $sql = "SELECT * from profile_picture WHERE soft='0'";
        $query = $this->conn->query($sql);
        if($Mode=="OBJ") $query->setFetchMode(PDO::FETCH_OBJ);
        else            $query->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $query->fetchAll();
        return $allData;
    }
    public function setData($data = NULL)
    {
        if(array_key_exists('ProfilePictureId',$data))
        {
            $this->ProfilePictureId = $data['ProfilePictureId'];
        }
        if(array_key_exists('ProfilePictureName',$data))
        {
            $this->ProfilePictureName = $data['ProfilePictureName'];
        }
        if($_FILES["ProfilePicturePath"]["name"])
        {
        $name = $_FILES["ProfilePicturePath"]["name"];
            $microtime = microtime(true);
            $ext = end(explode(".", $_FILES["ProfilePicturePath"]["name"]));
         $date =date("y_m_d_h_m_s");
         $target_name = $date.'_'.$microtime .'.'.$ext;
            $this->target_file = "../../../../assets/upload/".$target_name;
            var_dump($_FILES["ProfilePicturePath"]["tmp_name"]);
            if (move_uploaded_file($_FILES["ProfilePicturePath"]["tmp_name"], $this->target_file))
            {
                $move = 1;
               $this->ProfilePicturePath= $this->target_file;
            }
            if($move = 0 )
            {
                $msg = "Profile Photo couldnt be uploaded!!";
                $msg_type = "warning";
            }

        }

    }
    public function  store()
    {

        $query = $this->conn-> prepare("INSERT INTO profile_picture(ProfilePictureName, ProfilePicturePath)
        VALUES('$this->ProfilePictureName',' $this->ProfilePicturePath')");
        $query->execute();

        if($query) {
            Message::message("<div class='alert alert-success' id='msg'><h3 align='center'>Photo Has Been Inserted Successfully!</h3></div>");

        }
        else{
            Message::message("<div class='alert alert-danger' id='msg'><h3 align='center'> Photo Has Not Been Inserted Successfully!</h3></div>");

        }
        Utility::redirect("create.php");
    }

    public function edit()
    {
        if($this->ProfilePicturePath !="empty") {
            $query = $this->conn->prepare("UPDATE profile_picture SET ProfilePictureName='$this->ProfilePictureName',ProfilePicturePath='$this->ProfilePicturePath' WHERE ProfilePictureId='$this->ProfilePictureId'");
            var_dump($query);
            $query->execute();
        }
        else{
            $query = $this->conn->prepare("UPDATE profile_picture SET ProfilePictureName='$this->ProfilePictureName' WHERE ProfilePictureId='$this->ProfilePictureId'");
            var_dump($query);
            $query->execute();
        }
        if($query) {
            Message::message("<div class='alert alert-success' id='msg'><h3 align='center'>[ ProfilePictureName: $this->ProfilePictureName ] , [ ProfilePicturePath: $this->ProfilePicturePath ] <br> Data Has Been Updated Successfully!</h3></div>");

        }
        else{
            Message::message("<div class='alert alert-danger' id='msg'><h3 align='center'>[ ProfilePictureName: $this->ProfilePictureName ] , [ ProfilePicturePath: $this->ProfilePicturePath ] <br> Data Has Not Been Updated Successfully!</h3></div>");

        }
        Utility::redirect("index.php");
    }
    public function softDelete($id)
    {

        $query = $this->conn-> prepare("UPDATE profile_picture SET soft='1' WHERE ProfilePictureId='$id'");
        var_dump($query);
        $query->execute();
        if($query) {
            Message::message("<div class='alert alert-success' id='msg'><h3 align='center'>[ ProfilePictureName: $this->ProfilePictureName ] , [ AuthorName: $this->BookAuthor ] <br> Data Has Been Deleted Successfully!</h3></div>");

        }
        else{
            Message::message("<div class='alert alert-danger' id='msg'><h3 align='center'>[ ProfilePictureName: $this->ProfilePictureName ] , [ AuthorName: $this->BookAuthor ] <br> Data Has Not Been Deleted Successfully!</h3></div>");

        }
        Utility::redirect("index.php");
    }



}