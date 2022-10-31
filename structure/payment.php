<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="payment_style.css">
    </head>
    <body class="body">
        <div class="home">
            <a href="../main_menu.php">
                <img src="../icons/home.png" alt="home" width = "50px">
            </a>
            <a href="#supage">
                <h3>Payment</h3>
            </a>
        </div>
        <div class="proccess1">
            <?php
                //alocate memory for temporary data
                $temId[100] = NULL;
                $temName[100] = NULL;
                $temPrice[100] = NULL;
                $temQuantity[100] = NULL;
                $total = (int)0;
                $temIndexs = 0;
                //open temporary files to get the data into the alocated memory
                $myfile = fopen("payment/tem_id.txt", "r");
                while(!(feof($myfile)))
                {
                    $temId[$temIndexs]= fgets($myfile);
                    $temIndexs++;
                }
                fclose($myfile);
                $temIndexs = 0;

                $myfile = fopen("payment/tem_name.txt", "r");
                while(!(feof($myfile)))
                {
                    $temName[$temIndexs]= fgets($myfile);
                    $temIndexs++;
                }
                fclose($myfile);
                $temIndexs = 0;

                $myfile = fopen("payment/tem_price.txt", "r");
                while(!(feof($myfile)))
                {
                    $temPrice[$temIndexs]= (int)fgets($myfile);
                    $temIndexs++;
                }
                fclose($myfile);
                $temIndexs = 0;

                $myfile = fopen("payment/tem_quantity.txt", "r");
                while(!(feof($myfile)))
                {
                    $temQuantity[$temIndexs]= (int)fgets($myfile);
                    $temIndexs++;
                }
                fclose($myfile);
                //finish read from files

            ?>
        </div>

        <div class="invoiceNum">
            <?php
                //to get invoice number for file
                $invoiceNum[100] = (int)NULL;
                $invoiceIndexs = 0;
                $myfile = fopen("payment/invoice_number.txt", "r");
                while(!(feof($myfile)))
                {
                    $invoiceNum[$invoiceIndexs]= fgets($myfile);
                    $invoiceIndexs++;
                }
                fclose($myfile);
                $newInvoiceNum = (int)$invoiceNum[$invoiceIndexs-2] + 1;
            ?>
            <p>Invoice number:</p><p><?php echo $newInvoiceNum; ?></p>
            <p> <?php echo date("d/m/Y"); ?></p>
        </div>
        
        <div class="invoiceTable">
            <table>
                <tr>
                    <th>NUM</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Unit-Price</th>
                    <th>Amount</th>
                    <th>Option</th>
                </tr>
                <?php
                    for($num = 0 ; $num < $temIndexs-1 ; $num++)
                    {
                        ?>
                        <tr>
                            <td><?php echo $num; ?></td>
                            <td><?php echo $temId[$num]; ?></td>
                            <td><?php echo $temName[$num]; ?></td>
                            <td><?php echo $temQuantity[$num]; ?></td>
                            <td><?php echo $temPrice[$num]; ?></td>
                            <?php $amounts = $temQuantity[$num] * $temPrice[$num]; ?>
                            <td><?php echo $amounts; ?></td>
                            <td class="delete"><a href="peyment_delete.php?Proid=<?php echo $num; ?>">Delete</a></td>
                            <?php $total=$total+$amounts; ?>
                        </tr>
                        <?php
                    }
                ?>
                <tr>
                            <form action="add_to_invoice.php" method="POST">
                                <td></td>
                                <td><input type="number" name="id" required></td>
                                <td></td>
                                <td><input type="number" name="quantity" required></td>
                                <td><input type="submit" value="Add"></td>
                            </form>
                </tr>
                <tr class="total">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>TOTAL</td>
                    <td><?php echo "$total ៛"; ?></td>
                </tr>
            </table>
        </div>

        <div class="payment">
            <div><a href="payment_proccess.php?Proid=<?php echo $total; ?>"><h4>PAY</h4></a></div>
        </div>
            
        
    </body>
</html>