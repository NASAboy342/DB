<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="edit_edit_style.css">
    </head>
    <body class="body">
        <div class="home">
            <a href="../main_menu.php">
                <img src="../icons/home.png" alt="home" width = "50px">
            </a>
            <a href="#supage">
                <h3>Editted</h3>
            </a>
        </div>
        <div class="proccess">
            <?php
                //variables
                $id[100] = NULL;
                $name[100] = NULL;
                $priceIn[100] = NULL;
                $priceOut[100] = NULL;
                $quantities[100] = NULL;
                $indexs=0;
                //opent files to input data into RAM
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
                    $quantities[$indexs]= fgets($myfile);
                    $indexs++;
                }
                fclose($myfile);
                //get data from form
                $selectedInedexs=$_POST["selectedInedexs"];//item's index
                $endl="\n";//to write the data onto a new line
                $n =$_POST["name"];
                $pi =$_POST["prin"];
                $po =$_POST["prout"];
                $q =$_POST["quantity"];
                $name[$selectedInedexs] = "$n$endl" ;
                $priceIn[$selectedInedexs] = "$pi$endl" ;
                $priceOut[$selectedInedexs] = "$po$endl" ;
                $quantities[$selectedInedexs] = "$q$endl" ;
                //open file to output data into files
                $myfile = fopen("stok/p_ID.txt", "w");
                for($i=0;$i<=$indexs-2;$i++)
                {
                    fwrite($myfile, $id[$i]);
                }
                fclose($myfile);

                $myfile = fopen("stok/p_Name.txt", "w");
                for($i=0;$i<=$indexs-2;$i++)
                {
                    fwrite($myfile, $name[$i]);
                }
                fclose($myfile);

                $myfile = fopen("stok/p_PriceIn.txt", "w");
                for($i=0;$i<=$indexs-2;$i++)
                {
                    fwrite($myfile, $priceIn[$i]);
                }
                fclose($myfile);

                $myfile = fopen("stok/p_PriceOut.txt", "w");
                for($i=0;$i<=$indexs-2;$i++)
                {
                    fwrite($myfile, $priceOut[$i]);
                }
                fclose($myfile);

                $myfile = fopen("stok/p_Quantity.txt", "w");
                for($i=0;$i<=$indexs-2;$i++)
                {
                    fwrite($myfile, $quantities[$i]);
                }
                fclose($myfile);
            ?>
        </div>
        <div class="asking">
            <p>The product has been updated.</p>
            <a href="view_product.php">OK</a>
        </div>
    </body>
</html>