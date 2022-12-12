<?php



namespace Source\Service;

use Source\Database\MySQL;
use Source\Repositories\InventoryRepositories;

class InventoryService {



    public function insertInventory() 
    {

        $db = new MySQL();
        $insert = new InventoryRepositories($db);
        $res = $insert->insertInventory($_POST);

      

        // $price = filter_var($price, FILTER_VALIDATE_FLOAT);
        // $quantity = filter_var($quantity, FILTER_VALIDATE_INT);
        if (!empty($res)) {
            return $res;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $db = new MySQL();
        $delete = new InventoryRepositories($db);
        $res = $delete->delete($id);

        if (!empty($res)) {
            return $res;
        } else {
            return false;
        }
    }

    public function storeUpdate()
    {
        $db = new MySQL();
        $update = new InventoryRepositories($db);

        $res = $update->storeUpdate($_POST);

        if(!empty($res) || $res == false ){
            return $res;
        } else {
            return false;
        }
    }

    public function showProduct()
    {

        $db = new MySQL();
        $show = new InventoryRepositories($db);

        $res = $show->showProduct($_GET['id']);

        if(!$res || empty($res)){
            return false; 
        } else {
            return $res;
        }


    }
    public function selectAll() {

        $db = new MySQL();
        $select = new InventoryRepositories($db);
        if ($select->selectAll() == false || empty($select->selectAll())) {
            return false;
        } else {
            return $select->selectAll();
        }
    }


}
