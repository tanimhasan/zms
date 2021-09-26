<?php
$filePath = realpath(dirname(__FILE__));
include_once ($filePath.'/../lib/Database.php');
include_once ($filePath.'/../lib/Session.php');
include_once ($filePath.'/../helpers/Format.php');
?>

<?php

class Appointment
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function getAppointment(){
        $query = "SELECT * FROM appointments ORDER BY app_id ASC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getApp($appid){
        $query = "SELECT * FROM appointments WHERE app_id = '$appid'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getAllAppointment($user_id){
        $query = "SELECT * FROM appointments WHERE user_id = '$user_id' ORDER BY app_id ASC";
        $result = $this->db->select($query);
        return $result;
    }
    public function conAppointment($id){
        $query = "UPDATE appointments
                        SET
                        status = '1'
                        WHERE app_id = '$id'
                        ";
        $updated_row = $this->db->update($query);
        if ($updated_row){
            $msg = "<span style='color: green; font-size: 16px;'>Appointment Confirm Successfully!</span>";
            return $msg;
        }else{
            $msg = "<span style='color: red; font-size: 16px;'>Appointment Not Confirm!</span>";
            return $msg;
        }
    }
    public function delAppointment($id){
        $query = "DELETE FROM appointments WHERE app_id = '$id'";
        $delData = $this->db->delete($query);
        if ($delData){
            $msg = "<span style='color: green; font-size: 16px;'>Appointment Deleted Successfully!</span>";
            return $msg;
        }else{
            $msg = "<span style='color: red; font-size: 16px;'>Appointment Not Deleted!</span>";
            return $msg;
        }
    }
}