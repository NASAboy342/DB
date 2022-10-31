<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="view_invoice_style.css">
    </head>
    <body class="body">
        <div class="home">
            <a href="../main_menu.php">
                <img src="../icons/home.png" alt="home" width = "50px">
            </a>
            <a href="#supage">
                <h3>Invoices</h3>
            </a>
        </div>
        <div class="invoiceFrame">
            <?php
            $invoiceNum[100] = (int)NULL;
            $invoiceIndexs = 0;
            $myfile = fopen("payment/invoice_number.txt","r");
            while(!(feof($myfile)))
            {
                $invoiceNum[$invoiceIndexs] = fgets($myfile);
                $invoiceIndexs++;
            }
            fclose($myfile);
            for($f = 0 ;$f<=$invoiceIndexs-2;$f++)
            {
                ?>
                <a href="view_invoice_supage.php?Proid=<?php echo $invoiceNum[$f]; ?>"><?php echo $invoiceNum[$f]; ?></a>
                <?php
            }
            ?>
        </div>
        
    </body>
</html>