<?php
$filePath = realpath(dirname(__FILE__));
include_once ($filePath.'/../lib/Database.php');
include_once ($filePath.'/../lib/Session.php');
include_once ($filePath.'/../helpers/Format.php');
?>

<?php

class Manager
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insertManager($data)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['managerName']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $pass = mysqli_real_escape_string($this->db->link, $data['password']);

        if ($name == ""  || $email == "" || $phone == "" || $pass == ""){
            $msg = "<span style='color: red; font-size: 16px;'>Field must not be empty!</span>";
            return $msg;
        }
        $mailQuery = "SELECT * FROM managers WHERE email='$email' LIMIT 1";
        $mailChk = $this->db->select($mailQuery);
        if ($mailChk != false){
            $msg = "<span style='color: red; font-size: 16px;'>Email already exist!</span>";
            return $msg;
        }else{
            $query = "INSERT INTO managers(managerName, email, phone, password) VALUES('$name', '$email', '$phone', '$pass')";

            $inserted_rows = $this->db->insert($query);
            if ($inserted_rows) {
                $msg = "<span style='color: green; font-size: 16px;'>Manager Add Succesfull !</span>";
                return $msg;
            }else {
                $msg = "<span style='color: red; font-size: 16px;'>Error !</span>";
                return $msg;
            }
        }
    }
    public function managerUpdate($data, $id){
        $name = mysqli_real_escape_string($this->db->link, $data['managerName']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $pass = mysqli_real_escape_string($this->db->link, $data['password']);

        if ($name == "" || $email == "" || $phone == "" || $pass == ""){
            $msg = "<span style='color: red; font-size: 16px;'>Field must not be empty!</span>";
            return $msg;
        }else{

            $query = "UPDATE managers
                        SET
                        managerName = '$name',
						email = '$email',
						phone = '$phone',
						password = '$pass'
                        WHERE id = '$id'
                        ";
            $updated_row = $this->db->update($query);
            if ($updated_row){
                $msg = "<span style='color: green; font-size: 16px; letter-spacing: normal;'>Manager Data Updated Succesfully!</span>";
                return $msg;
            }else{
                $msg = "<span style='color: red; font-size: 16px;'>Manager Data Not Updated!</span>";
                return $msg;
            }
        }
    }
    public function delManager($id){
        $query = "DELETE FROM managers WHERE id = '$id'";
        $delData = $this->db->delete($query);
        if ($delData){
            $msg = "<span style='color: green; font-size: 16px;'>Manager Deleted Successfully!</span>";
            return $msg;
        }else{
            $msg = "<span style='color: red; font-size: 16px;'>Manager Not Deleted!</span>";
            return $msg;
        }
    }

    public function getAllManager(){
        $query = "SELECT * FROM managers ORDER BY id ASC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getManager($id){
        $query = "SELECT * FROM managers WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>