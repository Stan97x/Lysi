<?php
class Utilisateur
{
    private $db;

    function __construct($conn)
    { 
        $this->db=$conn;
    }
    public function getLTO()
    {
        try {
            $sql = "SELECT * FROM `lto`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
?>