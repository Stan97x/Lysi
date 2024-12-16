<?php

class User
{

    private $db;

    function __construct($conn)
    { 
        $this->db=$conn;
    }

    public function Password($user,$password)
    {
        try
        {
            $sql= "SELECT * FROM compte where Email = :email" ;
            $stmt =$this->db->prepare($sql);
            $stmt->bindParam(':email', $user);
            $stmt->execute();
            $resultat = $stmt->fetch();
            if(!$resultat)
            {
                echo"'l'utilisateur n'existe pas";
            }
            if($resultat && password_verify($password,$resultat['Pass']))
            {
                return $resultat;
            }
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    Public function GetUserbyEmail($email)
    {
        $sql = "SELECT COUNT(*) AS count FROM compte WHERE email = :email";
        $stmt =$this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            echo"'<div class=alert alert-success'>L'email est déjà utilisé.</div>'";
        }  else {
            return $result;
    }
}

public function InsertUser($nom,$email,$password,$compte)
{
        try
        {
            $res=$this->GetUserbyEmail($email);
            if($res['count']>0)
            {
                return false;
            }
            else{
                $sql="SELECT INTO `compte`(`Nom`,`Email`,`Compte`,`Password`)VALUES(:nom,:email:compte,:`password`)";
                $stmt =$this->db->prepare($sql);
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':compte', $compte);
    
                $stmt->execute();
                return true;
            }

           
        
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;

        }
}
}
?>