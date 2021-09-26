<?php
    include '../lib/Session.php';
    Session::checkLogin();

include_once '../lib/Database.php';
include_once '../helpers/Format.php';

?>

<?php

class Managerlogin{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function managerLogin($managerName,$managerPass){
        $managerName = $this->fm->validation($managerName);
        $managerPass = $this->fm->validation($managerPass);

        $managerName = mysqli_real_escape_string($this->db->link,$managerName);
        $managerPass = mysqli_real_escape_string($this->db->link,$managerPass);

        if (empty($managerName) || empty($managerPass)){
            $errormsg = "Managername Or Password must not be empty!";
            return $errormsg;
        }else{
            $query = "SELECT * FROM managers WHERE managerName = '$managerName' AND password = '$managerPass'";
            $result = $this->db->select($query);
            if ($result != false){
                $value = $result->fetch_assoc();
                Session::set("managerlogin", true);
                Session::set("managerId", $value['managerId']);
                Session::set("managerName", $value['managerName']);
                header("Location:index.php");
            }else{
                $errormsg = "Managername Or Password not match!";
                return $errormsg;
            }
        }
    }
}
?>