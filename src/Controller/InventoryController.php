<?php 

namespace Source\Controller;

use Source\Database\MySQL;
use Source\Repositories\InventoryRepositories;
use Source\Service\InventoryService;

class InventoryController
{

    

    public function insert()
    {
         $insert = new InventoryService();
         $insert->insertInventory();
         return header('Location: ../../index.php');
    }
    
    public function edit($id)
    {
        $db = new MySQL();
        $createEdit = new InventoryRepositories($db);
        return $createEdit->editPage($id);
    }

    public function storeUpdate()
    {
        $update = new InventoryService();
        $update->storeUpdate();
        return header('Location: ../../index.php');
    }

    
    public function show()
    {
        $show = new InventoryService();
        return $show->showProduct();
    }
 
    public function selectAll()
    {
        $select = new InventoryService();
        return $select->selectAll();
    }


    public function core()
    {
        return true;
    }
}