<?php

require __DIR__ . "./vendor/autoload.php";
use Source\Core\Core;
use Source\Service\InventoryService;


$show = new InventoryService();
$paginate = new InventoryService();
$core = new Core();
$core->manageQuery($_GET);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory - Patterns</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-dark">
    
    <div class="bg-dark w-100">
    <a href="./src/View/insertPage.php" class="btn btn-success my-2 mx-2">Inserir</a>
    </div>
 <?php
    if ($show->selectAll() == false) {
     echo "<p style='color:white'>Não há registros</p>";
    } else {
        echo "<table class='table table-striped table-dark table-bordered table-hover'>";
        echo "<thead class='bg-dark text-white'>
        <td>Id</td>
        <td>Name</td>
        <td>Price</td>
        <td>Descriptions</td>
        <td>Quantity</td>
       <td>User Actions</td>
           </thead>";
        foreach ($show->selectAll() as $value) {
          
          echo "<tr>
                   <td> [ <b>" . $value['id'] . "</b> ] </td>
                   <td> [" . $value['productName']. "]</td>
                   <td> [" . $value['price']. "]</td>
                   <td> [" . $value['descriptions']. "]</td>
                   <td> [" . $value['quantity']. "]</td>
                   <td> <a href='?pagina=inventory&method=edit&id=" . $value['id'] . "' class='btn btn-warning btn-sm'>Editar</a> | 
                        <a href='?pagina=inventory&method=delete&id=" . $value['id'] . "' class='btn btn-danger btn-sm'>Deletar</a> </td>
              </tr>";
        }
        echo "</table>";
    }
    ?>

    
</body>
</html>