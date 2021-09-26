<?php
include_once '../lib/Database.php';
include_once '../helpers/Format.php';
?>

<?php

class Food
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function getAllFood(){
        $query = "SELECT * FROM food ORDER BY id ASC";
        $result = $this->db->select($query);
        return $result;
    }
    public function foodInsert($data){
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $quantity = mysqli_real_escape_string($this->db->link, $data['quantity']);
        $weight = mysqli_real_escape_string($this->db->link, $data['weight']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $cost = mysqli_real_escape_string($this->db->link, $data['cost']);

        if (empty($name)){
            $msg = "<span style='color: red; font-size: 16px;'>Food Name Field must not be empty!</span>";
            return $msg;
        }
        elseif (empty($quantity)){
            $msg = "<span style='color: red; font-size: 16px;'>Quantity Field must not be empty!</span>";
            return $msg;
        }
        elseif (empty($weight)){
            $msg = "<span style='color: red; font-size: 16px;'>Weight Field must not be empty!</span>";
            return $msg;
        }
        elseif (empty($category)){
            $msg = "<span style='color: red; font-size: 16px;'>Category Field must not be empty!</span>";
            return $msg;
        }
        elseif (empty($cost)){
            $msg = "<span style='color: red; font-size: 16px;'>Cost Field must not be empty!</span>";
            return $msg;
        }else{
            $query = "INSERT INTO food(name,quantity,weight,category,cost) VALUES('$name','$quantity','$weight','$category','$cost')";
            $foodInsert = $this->db->insert($query);
            if ($foodInsert){
                $msg = "<span style='color: green; font-size: 16px;'>Food Inserted Successfully!</span>";
                return $msg;
            }else{
                $msg = "<span style='color: red; font-size: 16px;'>Food Not Inserted!</span>";
                return $msg;
            }

        }
    }
}