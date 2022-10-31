<?php
$deleteIndex = $_GET["Proid"];

//variables
$temid[100]= (int)NULL;
$temName[100]= NULL;
$temPrice[100]= NULL;
$temQuantity[100]= NULL;
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
                    $temPrice[$temIndexs]= fgets($myfile);
                    $temIndexs++;
                }
                fclose($myfile);
                $temIndexs = 0;

                $myfile = fopen("payment/tem_quantity.txt", "r");
                while(!(feof($myfile)))
                {
                    $temQuantity[$temIndexs]= fgets($myfile);
                    $temIndexs++;
                }
                fclose($myfile);
                //finish read from files

                //if it is not at the end
                if($deleteIndex<$temIndexs-1)
                {
                    //loop to replpace data from index n+1 to n by start from delete index
                    //start at delete index end at last index-2. index-1=null
                    for($i=$deleteIndex;$i<=$temIndexs-2;$i++){
                        $temId[$i]=$temId[$i+1];
                        $temName[$i]=$temName[$i+1];
                        $temPrice[$i]=$temPrice[$i+1];
                        $temQuantity[$i]=$temQuantity[$i+1];
                    }
                    $temid[$i+1]=NULL;
                    $temName[$i+1]=NULL;
                    $temPrice[$i+1]=NULL;
                    $temQuantity[$i+1]=NULL;
                }
                //if it is at the end
                else if($deleteIndex=$temIndexs-1){
                    $temid[$temIndexs-1]=NULL;
                    $temName[$temIndexs-1]=NULL;
                    $temPrice[$temIndexs-1]=NULL;
                    $temQuantity[$temIndexs-1]=NULL;
                }

                //test
                for($y=0;$y<=$temIndexs-2;$y++)
                {
                    echo $temId[$y];
                }
                //test

                //rewrite the data back in to temporary files
                $myfile = fopen("payment/tem_id.txt", "w");
                for($y=0;$y<=$temIndexs-2;$y++)
                {
                    fwrite($myfile, $temId[$y]);
                }
                fclose($myfile);

                $myfile = fopen("payment/tem_name.txt", "w");
                for($y=0;$y<=$temIndexs-2;$y++)
                {
                    fwrite($myfile, $temName[$y]);
                }
                fclose($myfile);

                $myfile = fopen("payment/tem_price.txt", "w");
                for($y=0;$y<=$temIndexs-2;$y++)
                {
                    fwrite($myfile, $temPrice[$y]);
                }
                fclose($myfile);

                $myfile = fopen("payment/tem_quantity.txt", "w");
                for($y=0;$y<=$temIndexs-2;$y++)
                {
                    fwrite($myfile, $temQuantity[$y]);
                }
                fclose($myfile);
                //when done go back to payment
                header("Location: payment.php");

?>