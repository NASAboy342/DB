<?php
        //variables
        $searchItem = $_GET["Proid"];//search id
        $id[100] = NULL;
        $name[100] = NULL;
        $priceIn[100] = NULL;
        $priceOut[100] = NULL;
        $quantities[100] = NULL;
        $indexs=0;
        //open file to input data into RAM
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

        //simple search loop
        $step = 0;//search's step
        //if search id is still not equal to the searching id and there are still more id, then keep searching
        while(!($searchItem<=$id[$step]) && !($step>$indexs))
        {
            $step++;
        }
        //if search id is found, then do this
        if($searchItem<=$id[$step])
        {
            //if the found id is the last just one, then just delete it and write it into file
            if($step==$indexs-2)
            {
                $id[$indexs-2] = NULL;
                $id[$indexs-1] = NULL;
                $id[$indexs] = NULL;

                $name[$indexs-2] = NULL;
                $name[$indexs-1] = NULL;
                $name[$indexs] = NULL;

                $priceIn[$indexs-2] = NULL;
                $priceIn[$indexs-1] = NULL;
                $priceIn[$indexs] = NULL;

                $priceOut[$indexs-2] = NULL;
                $priceOut[$indexs-1] = NULL;
                $priceOut[$indexs] = NULL;

                $quantities[$indexs-2] = NULL;
                $quantities[$indexs-1] = NULL;
                $quantities[$indexs] = NULL;
                //delete the exiting data and write the new one in
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
            }
            else //put if the found id is not the last one, then delete the data by rearagn the items
            {
                //rearagn the items onto the deleted item to leave no gap that could lead to !error!
                for($i=$step;$i<=$indexs-3;$i++)
                {
                  $id[$i]=$id[$i+1];
                  $name[$i]=$name[$i+1];
                  $priceIn[$i]=$priceIn[$i+1];
                  $priceOut[$i]=$priceOut[$i+1];
                  $quantities[$i]=$quantities[$i+1];
                }
                //then set the last emty row to null to ensure that there will be no !error!
                $id[$indexs-2] = NULL;
                $id[$indexs-1] = NULL;
                $id[$indexs] = NULL;

                $name[$indexs-2] = NULL;
                $name[$indexs-1] = NULL;
                $name[$indexs] = NULL;

                $priceIn[$indexs-2] = NULL;
                $priceIn[$indexs-1] = NULL;
                $priceIn[$indexs] = NULL;

                $priceOut[$indexs-2] = NULL;
                $priceOut[$indexs-1] = NULL;
                $priceOut[$indexs] = NULL;

                $quantities[$indexs-2] = NULL;
                $quantities[$indexs-1] = NULL;
                $quantities[$indexs] = NULL;
                //finally open file to delete the exiting data and write the new one in

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
            }
        }
        else
        {
            echo "Item is not found";
        }
?>
<html>
    <head>
        <link rel="stylesheet" href="edit_delete_style.css">
    </head>
    <body class ="body">
        <div class="home">
            <a href="../main_menu.php">
                <img src="../icons/home.png" alt="home" width = "50px">
            </a>
            <a href="#supage">
                <h3>Deleted</h3>
            </a>
        </div>
        <div class="asking">
            <p>The product has been deleted.</p>
            <a href="view_product.php">OK</a>
        </div>
    </body>
</html>