<?php
namespace App\ProfilePicture;

use App\BITM\SEIPXXXX\Model\Database as DB;
use App\BITM\SEIPXXXX\Message;
use App\BITM\SEIPXXXX\Utility;
use PDO;

class ProfilePicture extends DB{
    public $id="";
    public $user_id="";
    public $promo_des="empty";
    public $promo_pic ;




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
        if(array_key_exists('id',$data))
        {
            $this->id = $data['id'];
        }
        if(array_key_exists('user_id',$data))
        {
            $this->user_id = $data['user_id'];
        }

        if(array_key_exists('promo_des',$data))
        {
            $this->user_id = $data['promo_des'];
        }
        
        if($_FILES["promo_pic"]["name"])
        {
        $name = $_FILES["promo_pic"]["name"];
            $microtime = microtime(true);
            $ext = end(explode(".", $_FILES["promo_pic"]["name"]));
         $date =date("y_m_d_h_m_s");
         $target_name = $date.'_'.$microtime .'.'.$ext;
            $this->target_file = "../../../../assets/upload/".$target_name;
            var_dump($_FILES["promo_pic"]["tmp_name"]);
            if (move_uploaded_file($_FILES["promo_pic"]["tmp_name"], $this->target_file))
            {
                $move = 1;
               $this->promo_pic= $this->target_file;
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

        $query = $this->conn-> prepare("INSERT INTO profile_picture(user_id, promo_pic)
        VALUES('$this->user_id',' $this->promo_pic')");
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
        if($this->promo_pic !="empty") {
            $query = $this->conn->prepare("UPDATE profile_picture SET user_id='$this->user_id',promo_pic='$this->promo_pic' WHERE id='$this->id'");
            var_dump($query);
            $query->execute();
        }
        else{
            $query = $this->conn->prepare("UPDATE profile_picture SET user_id='$this->user_id' WHERE id='$this->id'");
            var_dump($query);
            $query->execute();
        }
        if($query) {
            Message::message("<div class='alert alert-success' id='msg'><h3 align='center'>[ user_id: $this->user_id ] , [ promo_pic: $this->promo_pic ] <br> Data Has Been Updated Successfully!</h3></div>");

        }
        else{
            Message::message("<div class='alert alert-danger' id='msg'><h3 align='center'>[ user_id: $this->user_id ] , [ promo_pic: $this->promo_pic ] <br> Data Has Not Been Updated Successfully!</h3></div>");

        }
        Utility::redirect("index.php");
    }
    public function softDelete($id)
    {

        $query = $this->conn-> prepare("UPDATE profile_picture SET soft='1' WHERE id='$id'");
        var_dump($query);
        $query->execute();
        if($query) {
            Message::message("<div class='alert alert-success' id='msg'><h3 align='center'>[ user_id: $this->user_id ] , [ AuthorName: $this->BookAuthor ] <br> Data Has Been Deleted Successfully!</h3></div>");

        }
        else{
            Message::message("<div class='alert alert-danger' id='msg'><h3 align='center'>[ user_id: $this->user_id ] , [ AuthorName: $this->BookAuthor ] <br> Data Has Not Been Deleted Successfully!</h3></div>");

        }
        Utility::redirect("index.php");
    }



}