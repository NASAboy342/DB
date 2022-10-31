<?php
    //proid variable
    $total = $_GET["Proid"];
    //tem variables
    $temid[100]= (int)NULL;
    $temName[100]= NULL;
    $temPrice[100]= (int)NULL;
    $temQuantity[100]= (int)NULL;
    $temIndexs = 0;
                //open temporary files to get the data into the alocated memory
                $myfile = fopen("payment/tem_id.txt", "r");
                while(!(feof($myfile)))
                {
                    $temid[$temIndexs]= (int)fgets($myfile);
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
                $newInName = $newInvoiceNum.".txt";
                
                //create new invoice file that have a name according to new invoice number
                $myfile = fopen("payment/invoices/$newInName","w");
                fwrite($myfile, "Date: ".date("d/m/Y")."\nInvoice's number: ".$newInvoiceNum."\n-----------------------------------------------\n");
                for($i=0 ; $i<=$temIndexs-2 ; $i++)
                {
                    fwrite($myfile, $i+1 ."| ".substr($temName[$i], 0,-1)."| ".$temQuantity[$i]."Pcs| ".$temPrice[$i]*$temQuantity[$i]." KHR\n");
                }
                fwrite($myfile, "-----------------------------------------------\nTotal: ".$total." KHR");

                //open stock file
                 //variables
                 $id[100] = (int)NULL;
                 $quantities[100] = (int)NULL;
                 $indexs=0;
                 //opent files to input data into RAM
                 $myfile = fopen("stok/p_ID.txt", "r");
                 while(!(feof($myfile)))
                 {
                     $id[$indexs]= (int)fgets($myfile);
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

                 //for loop to proccess each product. end at temindexs
                 for($i=0;$i<=$temIndexs-2;$i++)
                 {
                     //simple search loop
                    $step = 0;//search's step
                    //if search id is still not equal to the searching id and there are still more id, then keep searching
                    while(!($step>=$indexs) && !($temid[$i]<=$id[$step]))
                    {
                        $step++;
                    } 
                    //if while loop stop due to run out of id, then not found
                    if($step>=$indexs){
                      //fi not found than do nothing
                    }
                    else if($temid[$i]=$id[$step]){
                        //chenge the value to the variable according to its index
                        $quantities[$step]= $quantities[$step] - $temQuantity[$i];
                      //than opent the stock files to update stock's level
                      $myfile = fopen("stok/p_Quantity.txt", "w");
                      for($r = 0; $r<=$indexs-2; $r++)
                      {
                        $update = (string)$quantities[$r];
                        fwrite($myfile, $update."\n");
                      }
                      fclose($myfile);
                    }
                 }
                 //open invoice number file to write in new number
                 $myfile = fopen("payment/invoice_number.txt","a");
                 fwrite($myfile, $newInvoiceNum."\n");
                 fclose($myfile);
                 //open all temporary file to emty it out
                 $myfile = fopen("payment/tem_id.txt","w");
                 fwrite($myfile, "");
                 fclose($myfile);
                 $myfile = fopen("payment/tem_name.txt","w");
                 fwrite($myfile, "");
                 fclose($myfile);
                 $myfile = fopen("payment/tem_price.txt","w");
                 fwrite($myfile, "");
                 fclose($myfile);
                 $myfile = fopen("payment/tem_quantity.txt","w");
                 fwrite($myfile, "");
                 fclose($myfile);
                 header("Location: peyment_peyed.php");
?>