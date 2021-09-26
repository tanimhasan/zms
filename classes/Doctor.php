<?php
$filePath = realpath(dirname(__FILE__));
include_once ($filePath.'/../lib/Database.php');
include_once ($filePath.'/../lib/Session.php');
include_once ($filePath.'/../helpers/Format.php');
?>

<?php

class Doctor
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insertDoctor($data)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);

        if ($name == ""  || $email == "" || $phone == "" || $category == ""){
            $msg = "<span style='color: red; font-size: 16px;'>Field must not be empty!</span>";
            return $msg;
        }
        $mailQuery = "SELECT * FROM doctors WHERE email='$email' LIMIT 1";
        $mailChk = $this->db->select($mailQuery);
        if ($mailChk != false){
            $msg = "<span style='color: red; font-size: 16px;'>Email already exist!</span>";
            return $msg;
        }else{
            $query = "INSERT INTO doctors(name, email, phone, category) VALUES('$name', '$email', '$phone', '$category')";

            $inserted_rows = $this->db->insert($query);
            if ($inserted_rows) {
                $msg = "<span style='color: green; font-size: 16px;'>Doctor Add Succesfull !</span>";
                return $msg;
            }else {
                $msg = "<span style='color: red; font-size: 16px;'>Error !</span>";
                return $msg;
            }
        }
    }
    public function getAllDoctor(){
        $query = "SELECT * FROM doctors ORDER BY id ASC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getDoctor($id){
        $query = "SELECT * FROM doctors WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>