<?php
$filePath = realpath(dirname(__FILE__));
include_once ($filePath.'/../lib/Database.php');
include_once ($filePath.'/../lib/Session.php');
include_once ($filePath.'/../helpers/Format.php');
?>

<?php

class Ticket
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function getAllTicket(){
        $query = "SELECT * FROM tickets ORDER BY id ASC";
        $result = $this->db->select($query);
        return $result;
    }

    /***************************Update Work************************/
    public function soldTicket(){
        $query = "SELECT booking_date, SUM(adult_num) AS total_adult, SUM(child_num) AS total_child
FROM tickets WHERE status = '1'
GROUP BY date(booking_date)";

        $result = $this->db->select($query);
        return $result;
    }
    /***************************Update Work************************/

    public function getTicket($user_id){
        $query = "SELECT * FROM tickets WHERE user_id = '$user_id' ORDER BY id ASC";
        $result = $this->db->select($query);
        return $result;
    }
    public function conTicket($id){
        $query = "UPDATE tickets
                        SET
                        status = '1'
                        WHERE id = '$id'
                        ";
        $updated_row = $this->db->update($query);
        if ($updated_row){
            $msg = "<span style='color: green; font-size: 16px;'>Ticket Confirm Successfully!</span>";
            return $msg;
        }else{
            $msg = "<span style='color: red; font-size: 16px;'>Ticket Not Confirm!</span>";
            return $msg;
        }
    }
    public function getTic($tic_id){
        $query = "SELECT * FROM tickets WHERE id = '$tic_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function delTicket($id){
        $query = "DELETE FROM tickets WHERE id = '$id'";
        $delData = $this->db->delete($query);
        if ($delData){
            $msg = "<span style='color: green; font-size: 16px;'>Ticket Deleted Successfully!</span>";
            return $msg;
        }else{
            $msg = "<span style='color: red; font-size: 16px;'>Ticket Not Deleted!</span>";
            return $msg;
        }
    }
}