<html>
    <head>
        <link rel="stylesheet" href="upload_product_style.css">
    </head>
    <body class="body">
        <div class="home">
            <a href="../main_menu.php">
                <img src="../icons/home.png" alt="home" width = "50px">
            </a>
            <a href="#uploading">
                <h3>Product adding</h3>
            </a>
        </div>

<?php
$items=$_POST["ID"];
$endl="\n";
$Data= "$items $endl";

$myfile = fopen("stok/p_ID.txt", "a");
fwrite($myfile, $Data);
fclose($myfile);

$items=$_POST["Name"];
$endl="\n";
$Data= "$items $endl";

$myfile = fopen("stok/p_Name.txt", "a");
fwrite($myfile, $Data);
fclose($myfile);

$items=$_POST["In"];
$endl="\n";
$Data= "$items $endl";

$myfile = fopen("stok/p_PriceIn.txt", "a");
fwrite($myfile, $Data);
fclose($myfile);

$items=$_POST["Out"];
$endl="\n";
$Data= "$items $endl";

$myfile = fopen("stok/p_PriceOut.txt", "a");
fwrite($myfile, $Data);
fclose($myfile);

$items=$_POST["Quantity"];
$endl="\n";
$Data= "$items $endl";

$myfile = fopen("stok/p_Quantity.txt", "a");
fwrite($myfile, $Data);
fclose($myfile);
?>
        <div class="addmore">
            <a href="add_product.php"><h4>add more product</h4></a>
        </div>
    </body>
</html>