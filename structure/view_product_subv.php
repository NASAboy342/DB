<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="view-product_subv_style copy.css">
    </head>
    <body class="body">
        <div class="home">
            <a href="../main_menu.php">
                <img src="../icons/home.png" alt="home" width = "50px">
            </a>
            <a href="#supage">
                <h3>View Product</h3>
            </a>
        </div>
        <a href="view_product.php" class="vlsl">Back</a>
        <?php
        $id[100] = NULL;
        $name[100] = NULL;
        $priceIn[100] = NULL;
        $priceOut[100] = NULL;
        $quantities[100] = (int)NULL;
        $indexs=0;
        $myfile = fopen("stok/p_ID.txt", "r");
        while(!(feof($myfile)))
        {
            $id[$indexs]= fgets($myfile);
            $indexs++;
        }
        fclose($myfile);
        $indexs=0;

        $myfile = fopen("stok/p_Name.txt", "r");
        while(!(feof($myfile)))
        {
            $name[$indexs]= fgets($myfile);
            $indexs++;
        }
        fclose($myfile);
        $indexs=0;

        $myfile = fopen("stok/p_PriceIn.txt", "r");
        while(!(feof($myfile)))
        {
            $priceIn[$indexs]= fgets($myfile);
            $indexs++;
        }
        fclose($myfile);
        $indexs=0;

        $myfile = fopen("stok/p_PriceOut.txt", "r");
        while(!(feof($myfile)))
        {
            $priceOut[$indexs]= fgets($myfile);
            $indexs++;
        }
        fclose($myfile);
        $indexs=0;

        $myfile = fopen("stok/p_Quantity.txt", "r");
        while(!(feof($myfile)))
        {
            $quantities[$indexs]= (int)fgets($myfile);
            $indexs++;
        }
        fclose($myfile);

        ?>
        
        <div class ="stock">
            <table>
                <tr>
                    <th><h4>ID</h4></th>
                    <th><h4>Name</h4></th>
                    <th><h4>Price In</h4></th>
                    <th><h4>Price Out</h4></th>
                    <th><h4>Quantity</h4></th>
                </tr>
                <?php
                for($tr=0; $tr<$indexs-1; $tr++)
                {
                    if(($quantities[$tr]>5))
                    {

                    }
                    else
                    {
                ?>
                    <tr>
                        <td><p><?php echo $id[$tr] ?></p></td>
                        <td><p><?php echo $name[$tr] ?></p></td>
                        <td><p><?php echo $priceIn[$tr] ?></p></td>
                        <td><p><?php echo $priceOut[$tr] ?></p></td>
                        <td><p><?php echo $quantities[$tr] ?></p></td>
                        <td><a href="delete.php?Proid=<?php echo $id[$tr]; ?>" ><p class="deleteb">Delete</p></a></td>
                        <td><a href="edit_by_selection.php?Proid=<?php echo $tr; ?>"><p>Edit</p></a></td>
                    </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>
    </body>
</html>