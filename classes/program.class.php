<?php

require_once 'database.php';

Class Program{
    //attributes

    public $id;
    public $code;
    public $old_code;
    public $description;
    public $years;
    public $level;
    public $cet;
    public $status;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO programs (code, description, years, level, cet, status) VALUES 
        (:code, :description, :years, :level, :cet, :status);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':description', $this->description);
        $query->bindParam(':code', $this->code);
        $query->bindParam(':years', $this->years);
        $query->bindParam(':level', $this->level);
        $query->bindParam(':cet', $this->cet);
        $query->bindParam(':status', $this->status);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE programs SET code=:code, description=:description, years=:years, level=:level, cet=:cet, status=:status WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':description', $this->description);
        $query->bindParam(':code', $this->code);
        $query->bindParam(':years', $this->years);
        $query->bindParam(':level', $this->level);
        $query->bindParam(':cet', $this->cet);
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
        $sql = "SELECT * FROM programs WHERE id = :id ORDER BY code ASC;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM programs WHERE id = :id;";
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
        $sql = "SELECT * FROM programs ORDER BY code ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
}

?>