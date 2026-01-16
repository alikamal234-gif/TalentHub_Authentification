<?php
namespace App\Repositories;
use App\Database\Database;
use PDO;
class UserRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function findByEmail(string $email)
    {
        $sql = "SELECT * FROM users where email = :email";
        $stm = $this->conn->prepare($sql);
        $stm->bindParam(":email", $email);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findById(int $id)
    {

    }

    public function save($data)
    {
        $sql = "INSERT INTO user (name,email,password,role_id) VALUES (?,?,?)";
        $stm = $this->conn->prepare($sql);
        $stm->execute([$data->getEmail(),$data->getEmail(),$data->getPassword(),$data->getRole()->getID()]);
    }

}