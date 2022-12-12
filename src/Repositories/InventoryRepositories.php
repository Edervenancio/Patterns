<?php 

namespace Source\Repositories;

use Source\Database\DatabaseInterface;

class InventoryRepositories
{

    private $dbConnection;
    
    public function __construct(DatabaseInterface $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function insertInventory($dataPost)
    {

        if (empty($dataPost)) {
            return false;
        } 
        
        $pdo = $this->dbConnection->connect();
        $sql = $pdo->prepare('INSERT INTO inventory (productName, descriptions, price, quantity)
                                 VALUES (:product, :descriptions, :price, :quantity)');
        $sql->bindValue(':product', $dataPost['productName']);
        $sql->bindValue(':descriptions', $dataPost['descriptions']);
        $sql->bindValue(':price', $dataPost['price']);
        $sql->bindValue(':quantity', $dataPost['quantity']);

        $res = $sql->execute();

        if($res == false)
        {
            return false;
        } 

        return $res;
    }

    public function editPage($id)
    {
       header('Location: src/View/editPage.php?id=' . $id);
    }

    public function storeUpdate($dataPost)
    {

      
        $pdo = $this->dbConnection->connect();

        $sql = "UPDATE inventory SET productName = :product, descriptions = :descriptions, 
                       price = :price, quantity = :quantity WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':product', $dataPost['productName']);
        $sql->bindValue(':descriptions', $dataPost['descriptions']);
        $sql->bindValue(':quantity', $dataPost['quantity']);
        $sql->bindValue(':price', $dataPost['price']);
        $sql->bindValue(':id', $dataPost['id']);
        $resultado = $sql->execute();

        if ($resultado == 0) {
            return false;
        }

        return true;
    }

    
    public function selectAll()
    {
        $pdo = $this->dbConnection->connect();
        $sql = "SELECT * FROM inventory";
        $sql = $pdo->prepare($sql);
        $sql->execute();
        $result = $sql->fetchAll();
        return $result;   
    }
    
    public function showProduct($id)
    {
        $pdo = $this->dbConnection->connect();
        $sql = "SELECT * FROM inventory where id = :id LIMIT 1";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("id", $id);
        $sql->execute();
        $result = $sql->fetchAll();
        return $result;
    }

    

}