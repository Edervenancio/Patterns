<?php 

require __DIR__ . "../../../vendor/autoload.php";
use Source\Core\Core;
use Source\Controller\InventoryController;

$show = new InventoryController();
$core = new Core();
$core->manageQuery($_GET);


echo '<pre>';
var_dump($show->show($_GET['id']));
echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit - Patterns</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
   <h1>Editing page</h1>
   <div class="container bg-light my-5 p-2 form-control">
        <form method="POST" action="?pagina=inventory&method=storeUpdate" enctype="multipart/form-data">
        <?php foreach($show->show($_GET['id']) as $value){ ?>

        <input type="hidden" id="name" name="id" class="input-text" value="<?php echo $value['id']?>" /> 

      
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="productName" class="form-label fw-bold">Product Name</label>
                    <input type="text" class="form-control" name="productName" id="productName" value="<?php echo $value['productName'];?>" placeholder="Name" autocomplete>
                </div>

                <div class="col-md-6">
                    <label for="price" class="form-label fw-bold">Price</label>
                    <input type="text" class="form-control" name="price" id="price" value="<?php echo $value['price'];?>" placeholder="price">
                </div>

        

                <div class="col-md-6">
                    <label for="quantity" class="form-label fw-bold">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantity" value="<?php echo $value['quantity'];?>"placeholder="quantity">
                </div>

                <div class="col-md-6 form-group">
                    <label for="descriptions" class="form-label fw-bold">Description</label>
                    <textarea style="resize: none;" class="form-control" id="descriptions" name="descriptions" placeholder="description" rows="3"><?php echo $value['descriptions'];?></textarea>
                </div>

                <?php } ?>

      
                <div class="col-6">
                    <a href="" class="btn btn-danger padding-top">CANCEL</a>
                    <button type="submit" class=" btn btn-primary padding-top">Submit</a>
                </div>

            </div>
        </form>
    </div>
</body>
</html>