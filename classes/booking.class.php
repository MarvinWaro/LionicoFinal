<?php

require_once 'database.php';

class Booking{
    //attributes

    public $firstname;
    public $lastname;
    public $email;
    public $contact_number;
    public $address;
    public $date;
    public $services;
    public $cbarber;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add(){
        $sql = "INSERT INTO booking (firstname, lastname, email, contact_number, address, date, services, cbarber) VALUES
        (:firstname, :lastname, :email, :contact_number, :address, :date, :services, :cbarber);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':contact_number', $this->contact_number);
        $query->bindParam(':address', $this->address);
        $query->bindParam(':date', $this->date);
        $query->bindParam(':services', $this->services);
        $query->bindParam(':cbarber', $this->cbarber);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function edit_book(){
        $sql = "UPDATE booking SET firstname=:firstname, lastname=:lastname, email=:email, contact_number=:contact_number, address=:address, date=:date, services=:services, cbarber=:cbarber WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':contact_number', $this->contact_number);
        $query->bindParam(':address', $this->address);
        $query->bindParam(':date', $this->date);
        $query->bindParam(':services', $this->services);
        $query->bindParam(':cbarber', $this->cbarber);
        $query->bindParam(':id', $this->id);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function fetch($record_id){
        $sql = "SELECT * FROM booking WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }


    function delete($record_id){
        $sql = "DELETE FROM booking WHERE id = :id;";
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
        $sql = "SELECT * FROM booking ORDER BY CONCAT('lastname',', ','firstname') ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

}

?>
