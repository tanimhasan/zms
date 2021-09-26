<?php
$filePath = realpath(dirname(__FILE__));
include_once ($filePath.'/../lib/Database.php');
include_once ($filePath.'/../lib/Session.php');
include_once ($filePath.'/../helpers/Format.php');
?>

<?php

class Customer
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function customerRegistration($data)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $pass = mysqli_real_escape_string($this->db->link, $data['pass']);

        if ($name == ""  || $email == "" || $phone == "" || $pass == ""){
            $msg = "<span style='color: red; font-size: 16px;'>Field must not be empty!</span>";
            return $msg;
        }
        $mailQuery = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $mailChk = $this->db->select($mailQuery);
        if ($mailChk != false){
            $msg = "<span style='color: red; font-size: 16px;'>Email already exist!</span>";
            return $msg;
        }else{
            $query = "INSERT INTO users(name, email, phone, pass) VALUES('$name', '$email', '$phone', '$pass')";

            $inserted_rows = $this->db->insert($query);
            if ($inserted_rows) {
                $msg = "<span style='color: green; font-size: 16px;'>Signup Succesfull !</span>";
                return $msg;
            }else {
                $msg = "<span style='color: red; font-size: 16px;'>Signup Not Succesfull !</span>";
                return $msg;
            }
        }
    }

	public function customerLogin($data){
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $pass = mysqli_real_escape_string($this->db->link, $data['pass']);

        if (empty($email) || empty($pass)){
            $msg = "<span style='color: red; font-size: 16px;'>Field must not be empty!</span>";
            return $msg;
        }
        $query = "SELECT * FROM users WHERE email='$email' AND pass='$pass'";
        $result = $this->db->select($query);
        if ($result != false){
                $value = $result->fetch_assoc();
                Session::set("cusLogin", true);
                Session::set("cmrId", $value['id']);
                Session::set("cmrName", $value['name']);
            echo '<script type="text/javascript"> window.location.assign("profile.php") </script>';

            }else{
            echo "<span style='color: red; font-size: 18px;'>Email & Password Not Matched!</span>";
        }

    }
	public function getCustomerData($id){
		$query = "SELECT * FROM users WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
	}
	public function customerUpdate($data, $cmrId){
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);

        if ($name == "" || $email == "" || $phone == ""){
            $msg = "<span style='color: red; font-size: 16px;'>Field must not be empty!</span>";
            return $msg;
        }else{

            $query = "UPDATE users
                        SET
                        name = '$name',
						email = '$email',
						phone = '$phone'
                        WHERE id = '$cmrId'
                        ";
        $updated_row = $this->db->update($query);
        if ($updated_row){
            $msg = "<span style='color: green; font-size: 16px; letter-spacing: normal;'>User Data Updated Succesfully!</span>";
            return $msg;
        }else{
            $msg = "<span style='color: red; font-size: 16px;'>User Data Not Updated!</span>";
            return $msg;
        }
        }
	}
}
?>