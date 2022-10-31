<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="edit_by_selection_style.css">
    </head>
    <body class="body">
        <div class="home">
            <a href="../main_menu.php">
                <img src="../icons/home.png" alt="home" width = "50px">
            </a>
            <a href="#supage">
                <h3>Editting</h3>
            </a>
        </div>
        
        <div>
            <?php
                $selectedInedexs=$_GET["Proid"];
                $id[100] = NULL;
                $name[100] = NULL;
                $priceIn[100] = (int)NULL;
                $priceOut[100] = (int)NULL;
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
                    $priceIn[$indexs]= (int)fgets($myfile);
                    $indexs++;
                }
                fclose($myfile);
                $indexs=0;
        
                $myfile = fopen("stok/p_PriceOut.txt", "r");
                while(!(feof($myfile)))
                {
                    $priceOut[$indexs]= (int)fgets($myfile);
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

            <div class ="form">
                <form action="edit_edit.php" method="post" >
                <table>
                    <tr>
                        <th>Option</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price In</th>
                        <th>Price out</th>
                        <th>Quatities</th>
                    </tr>
                    <tr>
                        <td>Previous</td>
                        <td> <?php echo $id[$selectedInedexs]; ?> </td>
                        <td> <?php echo $name[$selectedInedexs]; ?> </td>
                        <td> <?php echo $priceIn[$selectedInedexs]; ?> </td>
                        <td> <?php echo $priceOut[$selectedInedexs]; ?> </td>
                        <td> <?php echo $quantities[$selectedInedexs]; ?> </td>
                    </tr>
                    <tr>
                        <td>Change to</td>
                        <td><input type="hidden" name="selectedInedexs" value="<?php echo $selectedInedexs; ?>" required></td>
                        <td><input type="text" name="name" value="<?php echo $name[$selectedInedexs]; ?>" required></td>
                        <td><input type="number" name="prin" value="<?php echo $priceIn[$selectedInedexs]; ?>" required></td>
                        <td><input type="number" name="prout" value="<?php echo $priceOut[$selectedInedexs]; ?>" required></td>
                        <td><input type="number" name="quantity" value="<?php echo $quantities[$selectedInedexs]; ?>" required></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Change" class="change"></td>
                    </tr>
                </table>
                </form>
                <a href="view_product.php"><p>Cancel</p></a>
            </div>

        </div>
    </body>
</html>