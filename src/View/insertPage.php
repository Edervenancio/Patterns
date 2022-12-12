<?php 

require __DIR__ . "../../../vendor/autoload.php";
use Source\Core\Core;

$core = new Core();
$core->manageQuery($_GET);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserção - Patterns</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
   <h1>Página de inserção</h1>
   <div class="container bg-light my-5 p-2 form-control">
        <form method="POST" action="?pagina=inventory&method=insert" enctype="multipart/form-data">

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="productName" class="form-label fw-bold">Product Name</label>
                    <input type="text" class="form-control" name="productName" id="productName" placeholder="Name" autocomplete>
                </div>


                <div class="col-md-6">
                    <label for="price" class="form-label fw-bold">Price</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="price">
                </div>

        
                <div class="col-md-6 form-group">
                    <label for="descriptions" class="form-label fw-bold">Description</label>
                    <textarea style="resize: none;" class="form-control" id="descriptions" name="descriptions" placeholder="description" rows="3"></textarea>
                </div>

                <div class="col-md-6">
                    <label for="quantity" class="form-label fw-bold">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantity" placeholder="quantity">
                </div>

            


      
                <div class="col-6">
                    <a href="" class="btn btn-danger padding-top">CANCEL</a>
                    <button type="submit" class=" btn btn-primary padding-top">Submit</a>
                </div>

            </div>
        </form>
    </div>
</body>
</html>