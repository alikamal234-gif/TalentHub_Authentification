<?php
namespace App\Repositories;
use App\Database\Database;
use PDO;
class RoleRepository {
    private $conn;
    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }
    public function findByName(string $name){

    }

    public function findById(int $id){

    }
     public function getRoleBy($id){
        $sql = "SELECT * FROM roles WHERE id = :id";
        $stm = $this->conn->prepare($sql);
        $stm->bindParam(":id",$id);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
}