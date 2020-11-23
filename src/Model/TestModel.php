<?php
declare(strict_types=1);

namespace App\Model;

use App\Entity\Test;
use PDOException;
use PDO;

class TestModel
{
    private $db;
    protected $className = 'App\Entity\Test';

    /**
     * @param $db
     */
    function __construct(PDO $db){
        $this->db = $db;
    }

    public function getById(int $id):Test{
        try{
            $stmt = $this->db->prepare('SELECT * FROM Test WHERE id=:id');
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
            $stmt->execute();
            return $stmt->fetch();
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }

    public function getByName(string $name):Test{
        try{
            $stmt = $this->db->prepare('SELECT * FROM Test WHERE Test.name= :name_test');
            $stmt->bindParam(':name_test',$name,PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->className);
            $stmt->execute();
            return $stmt->fetch();
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }
}