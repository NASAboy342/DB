<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="peyment_peyed_style.css">
    </head>
    <body class="body">
        <div class="home">
            <a href="../main_menu.php">
                <img src="../icons/home.png" alt="home" width = "50px">
            </a>
            <a href="#supage">
                <h3>Peyed</h3>
            </a>
        </div>
        <div class="inPriv">
            <?php
            $texts[100] = (string)NULL;
            $textLine = 0;
            $invoiceNum[100] = (int)NULL;
            $invoiceIndexs = 0;
            $myfile = fopen("payment/invoice_number.txt","r");
            while(!(feof($myfile)))
            {
                $invoiceNum[$invoiceIndexs] = fgets($myfile);
                $invoiceIndexs++;
            }
            fclose($myfile);
            $filename = rtrim($invoiceNum[$invoiceIndexs-2]).".txt";
            $myfile = fopen("payment/invoices/$filename","r");
            if(!$myfile)
            {
                echo "File connot be opened :(";
            }
            else
            {
                while(!(feof($myfile)))
                {
                    $texts[$textLine] = fgets($myfile);
                    $textLine++;
                }
            }
            fclose($myfile);
            for($l = 0; $l <= $textLine-1 ;$l++)
            {
                ?>
                <p><?php echo $texts[$l]; ?></p>
                <?php
            }
            ?>
        </div>
        <div class="peyed">
            <a href="payment.php">Peyed</a>
        </div>
    </body>
</html>