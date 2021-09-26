<?php
$filePath = realpath(dirname(__FILE__));
include_once ($filePath.'/../lib/Database.php');
include_once ($filePath.'/../lib/Session.php');
include_once ($filePath.'/../helpers/Format.php');
?>

<?php

class Animal
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insertAnimal($data, $file)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $cageNumber = mysqli_real_escape_string($this->db->link, $data['cageNumber']);
        $description = mysqli_real_escape_string($this->db->link, $data['description']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if ($name == ""  || $cageNumber == "" || $description == "" || $file_name == ""){
            $msg = "<span style='color: red; font-size: 16px;'>Field must not be empty!</span>";
            return $msg;
        }$cageQuery = "SELECT * FROM animals WHERE cageNumber='$cageNumber' LIMIT 1";
        $cageChk = $this->db->select($cageQuery);
        if ($cageChk != false){
            $msg = "<span style='color: red; font-size: 16px;'>Cage Number already exist!</span>";
            return $msg;
        } elseif ($file_size > 1048567) {
            echo "<span class='error'>Image Size should be less then 1MB!
             </span>";
        } elseif (in_array($file_ext, $permited) === false) {
            echo "<span class='error'>You can upload only:-"
                . implode(', ', $permited) . "</span>";
        }else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO animals(name, cageNumber, description, image) VALUES('$name', '$cageNumber', '$description', '$uploaded_image')";

            $inserted_rows = $this->db->insert($query);
            if ($inserted_rows) {
                $msg = "<span style='color: green; font-size: 16px;'>Animal Add Succesfull !</span>";
                return $msg;
            }else {
                $msg = "<span style='color: red; font-size: 16px;'>Error !</span>";
                return $msg;
            }
        }
    }
    public function getAllAnimal(){
        $query = "SELECT * FROM animals ORDER BY id ASC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getAnimal($id){
        $query = "SELECT * FROM animals WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>