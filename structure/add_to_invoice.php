<?php
  //variables
  $searchItem = (int)$_POST["id"];//search id
  $SQN = (int)$_POST["quantity"];//bying quantity

  $id[100] = (int)NULL;
  $name[100] = NULL;
  $priceIn[100] = (int)NULL;
  $priceOut[100] = (int)NULL;
  $quantities[100] = (int)NULL;
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
      $quantities[$indexs]= (int)fgets($myfile);
      $indexs++;
  }
  fclose($myfile);

  //simple search loop
  $step = 0;//search's step
  //if search id is still not equal to the searching id and there are still more id, then keep searching
  while(!($step>=$indexs) && !($searchItem<=$id[$step]))
  {
    $step++;
  }
  //if while loop stop due to run out of id, then not found
  if($step>=$indexs){
    //fi not found than do nothing and go back to payment
    include 'payment.php';
  }
  //if stock level is not enough, than do nothing and go back to peyment
  else if($quantities[$step]<$SQN)
  {
    header("Location: payment.php");
  }
  else if($searchItem=$id[$step]){
    //if found than opent the temerrary files to add the product form stock
    $myfile = fopen("payment/tem_id.txt", "a");
    fwrite($myfile, $id[$step]);
    fclose($myfile);

    $myfile = fopen("payment/tem_name.txt", "a");
    fwrite($myfile, $name[$step]);
    fclose($myfile);

    $myfile = fopen("payment/tem_price.txt", "a");
    fwrite($myfile, $priceOut[$step]);
    fclose($myfile);

    $myfile = fopen("payment/tem_quantity.txt", "a");
    fwrite($myfile, "$SQN \n");
    fclose($myfile);
    //when file had been transfered, go back to peyment
    include 'payment.php';
  }
?>