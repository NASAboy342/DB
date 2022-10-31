<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="view_invoice_supage_style.css">
    </head>
    <body class="body">
        <div class="home">
            <a href="../main_menu.php">
                <img src="../icons/home.png" alt="home" width = "50px">
            </a>
            <a href="#supage">
                <h3>Invoice</h3>
            </a>
        </div>
        <div class="frame">
            <?php
            $files = (string)$_GET["Proid"];
            $texts[100] = (string)NULL;
            $textLine = 0;
            $filename = rtrim($files).".txt";
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

        <a href="view_invoice.php" class="back">Back</a>
        
    </body>
</html>