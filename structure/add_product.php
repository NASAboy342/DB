<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="add_product_style.css">
    </head>
    <body class="body">
        <div class="home">
            <a href="../main_menu.php">
                <img src="../icons/home.png" alt="home" width = "50px">
            </a>
            <a href="#add product">
                <h3>Product adding</h3>
            </a>
        </div>

        <?php
        $ID[1000]= NULL;
        $indexs= 0;
        $myfile = fopen("stok/p_ID.txt","r");
        while(!feof($myfile)){
            $ID[$indexs]= fgets($myfile);
            $tem=$indexs+1;
            $indexs=$tem;
        }
        fclose($myfile);
        $newId=$ID[$indexs-2]+1;
        ?>
        <div class="addForm">
            <h4 class="lastid">last ID: <?php echo $ID[$indexs-2]; ?></h4>

            <form action="upload_product.php" method="post" class="form">
                <div><h4>ID: </h4> <input type="text" name="ID" value="<?php echo $newId; ?>" readonly><br></div>
                <div><h4>Name: </h4> <input type="text" name="Name" required><br></div>
                <div><h4>Price in: </h4> <input type="number" name="In" required><br></div>
                <div><h4>Price out: </h4> <input type="number" name="Out" required><br></div>
                <div><h4>Quantity: </h4> <input type="number" name="Quantity" required><br></div>
                <div class="adder"><input type="submit" value="Add"></div>
            </form>
        </div>
    </body>

</html>