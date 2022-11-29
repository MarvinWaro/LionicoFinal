<?php

require_once 'database.php';

class Booking{
    //attributes

    public $firstname;
    public $lastname;
    public $email;
    public $contact_number;
    public $address;
    public $barber = 'None';
    public $date;
    public $status = 'Inactive';

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add_booking(){
        $sql = "INSERT INTO booking (firstname, lastname, email, contact_number, address, barber, date, status) VALUES
        (:firstname, :lastname, :email, :contact_number, :address, :barber, :date, :status);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':contact_number', $this->contact_number);
        $query->bindParam(':address', $this->address);
        $query->bindParam(':barber', $this->barber);
        $query->bindParam(':date', $this->date);
        $query->bindParam(':status', $this->status);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function edit(){
        $sql = "UPDATE booking SET firstname=:firstname, lastname=:lastname, email=:email, contact_number=:contact_number, address=:address, barber=:barber,date=:date, status=:status WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':contact_number', $this->contact_number);
        $query->bindParam(':address', $this->address);
        $query->bindParam(':barber', $this->barber);
        $query->bindParam(':date', $this->date);
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