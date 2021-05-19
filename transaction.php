<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transact</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <link rel="stylesheet" href="project.css"/>
</head>

<body>

<div class="navbar">
  <div>
    <h2><a href="#" class="heading">Basic Banking System</a></h2>
      <div class="nav_content">
      <div class="nav_btn">
       <a class="decoration" href="home.php" >Home</a>
      </div>
      <div class="nav_btn">      
        <a class="decoration" href="create_user.php">Create User</a>
      </div>
      <div class="nav_btn">
        <a class="decoration" href="transact.php">Transact Now</a>
      </div>
      <div class="nav_btn">
        <a class="decoration" href="history.php">View History</a>
      </div>
    </div>
  </div>
</div>


<div class="cst-tbl">
<center>
<h3 style="padding-top: 60px;">Transfer From</h3>
    <table class="table" style="display: block; top: 125px; position: absolute; padding-right: 140px;" >
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Customer Name</th>
              <th scope="col">Customer Email</th>
              <th scope="col">Balance</th>
            </tr>
        </thead> </center>

<?php

$c=mysqli_connect("localhost","root","","basicbank");
if($c)
{       
         session_start();
        $custid = $_SESSION['btnid'];

$qry="select * from customers where customerID = '$custid'";


        

$result=mysqli_query($c,$qry) or die("SQL query failed");

if(mysqli_num_rows($result) > 0)
{
   
    while($row = mysqli_fetch_assoc($result))
   {
    
       $output ='<tr>
          <td>'.$row['customerID'].'</td>
          <td>'.$row['customerName'].'</td>
          <td>'.$row['customerEmail'].'</td>
          <td>'.$row['customerBalance'].'</td>
          </tr> ';
          $custbalance = $row['customerBalance'];
     }
    echo $output;
}

else
{
  $output .='<tbody>
    <tr>
    <td colspan =3>No data available in table</td>          
    </tr>
    </tbody> </table>';
  echo $output;
}

    

?>
</div>

<br>
<center style="padding: 90px;">
<form method="post">
<div style="display: table-row-group;">
<h3>Transfer To</h3>
<?php

            $query = "SELECT customerID,customerName,customerBalance FROM customers";
            $result = mysqli_query($c,$query);
          
?>

    <select name="customerID" class="selecte"style="padding-inline: 69px;" id="customerID" required>
    <option selected disabled>Choose an option</option>
<?php 
//loop to fetch degree code from database
            while ($row = mysqli_fetch_array($result))
            {
              if($row['customerID'] != $custid){
              echo "<option value='".$row['customerID']."'>".$row['customerName']." ".$row['customerBalance']."</option>";
              }
            }

           
?>        
    </select>
         
    <br>
</div>

<div>
<div class="" style="display:table-row-group">
<h3>
    <label >Amount</label></h3>
    <input type="tel" id="amount" style="width:200px;"class="inputtype"name="amount" placeholder="Amount" required>
  </div>
</div>
<br>

<div>
<div style="display:table-row-group">
    <button class="btn" id="button" name="button" >Transact</button>
  </div>
</div>
<br>

</form>
</center>


<?php

if(isset($_POST['button']))
{

    $selected = $_POST['customerID'];
    $amount = $_POST['amount'];

    $sql="SELECT * FROM customers where customerID='$custid'";
    $qry = mysqli_query($c,$sql) or die("SQL query failed");
    $sql1=mysqli_fetch_array($qry) or die("SQL query failed");

    $sql2="SELECT * FROM customers where customerID='$selected'";
    $qry2 = mysqli_query($c,$sql2) or die("SQL query failed");
    $sql3=mysqli_fetch_array($qry2) or die("SQL query failed"); 


    if(($amount) < 0 )
    {
      echo "<script> alert('opps, negative value cannot be transfered'); </script>";
    }

    else if($amount > $sql1['customerBalance'])
    {
      echo "<script> alert('opps, insufficient Balance'); </script>";
    }

    else if($amount == 0)
    {
      echo "<script> alert('opps, zero amount cannot be transfered'); </script>";
    }
  
    else
    {
      //deducting amount from sender
      $newbalance = $sql1['customerBalance'] - $amount;
      $sql = "UPDATE customers set customerBalance = $newbalance where customerID = $custid";
      mysqli_query($c,$sql);

      //adding amount to reciever
      $newBalance = $sql3['customerBalance'] + $amount;
      $sql = "UPDATE customers set customerBalance = $newBalance where customerID = $selected";
      mysqli_query($c,$sql);

      $sender = $sql1['customerName'];
      $reciever = $sql3['customerName'];
      


      $sql = "INSERT INTO transact(sender,reciever,amount) VALUES ('$sender','$reciever','$amount')";
      $query = mysqli_query($c,$sql);
      
     

      if($query == !NULL){
        echo "<script> alert('Transaction Successful'); window.location='history.php';</script>";
      }
      $newBalance = 0;
      $amount = 0;

    }


}



?>



    <footer class="footer">
        <center style="padding: 20px;">	&#169;Made By Sagar Chhatbar</center>
    </footer>


    <?php
}
    ?>
</body>
</html>