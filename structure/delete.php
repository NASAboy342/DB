<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="delete_style.css">
    </head>
    <body class="body">
        <div class="home">
            <a href="../main_menu.php">
                <img src="../icons/home.png" alt="home" width = "50px">
            </a>
            <a href="#supage">
                <h3>Deleting</h3>
            </a>
        </div>
    <div class="asking">
        <?php
        $id = $_GET["Proid"];
        $viid = $id;
        ?>
        <p>Are you sure that you would like to delete the product that have the ID of: (<?php echo $id; ?>) ?</p>
        <a href="edit_delete.php?Proid=<?php echo $viid; ?>">YES</a>
        <a href="view_product.php">NO</a>
    </div>

    </body>
</html>