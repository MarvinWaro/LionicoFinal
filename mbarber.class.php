<?php

require_once 'database.php';

class Mbarber{
    //attributes

    public $firstname;
    public $lastname;
    public $email;
    public $contact_number;
    public $address;
    public $chair_assigned;
    public $status = 'Inactive';

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add(){
        $sql = "INSERT INTO mbarber (firstname, lastname, email, contact_number, address, chair_assigned, status) VALUES
        (:firstname, :lastname, :email, :contact_number, :address, :chair_assigned, :status);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':contact_number', $this->contact_number);
        $query->bindParam(':address', $this->address);
        $query->bindParam(':chair_assigned', $this->chair_assigned);
        $query->bindParam(':status', $this->status);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE mbarber SET firstname=:firstname, lastname=:lastname, email=:email, contact_number=:contact_number, address=:address, chair_assigned=:chair_assigned, status=:status WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':contact_number', $this->contact_number);
        $query->bindParam(':address', $this->address);
        $query->bindParam(':chair_assigned', $this->chair_assigned);
        $query->bindParam(':status', $this->status);
        $query->bindParam(':id', $this->id);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function fetch($record_id){
        $sql = "SELECT * FROM mbarber WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM mbarber WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function show(){
        $sql = "SELECT * FROM mbarber ORDER BY CONCAT('lastname',', ','firstname') ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

}

?>