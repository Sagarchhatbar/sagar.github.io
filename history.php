<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transact</title>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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

<div>
  <div>
   <center><h1 style="padding-top: 50px;">Transaction History</h1></center>
  </div>
   
  <div>
    <center>
       <table class="table" >
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Sender Name</th>
              <th scope="col">Reciever Name</th>
              <th scope="col">Amount</th>
            </tr>
        </thead>
<?php

$c=mysqli_connect("localhost","root","","basicbank");
if($c)
{
$qry="select * from transact";

$output="";

$result=mysqli_query($c,$qry) or die("SQL query failed");

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
   {
       $output .='<tr>
          <td scope="row">'.$row['transactionID'].'</td>
          <td>'.$row['sender'].'</td>
          <td>'.$row['reciever'].'</td>
          <td>'.$row['amount'].'</td>
          </tr>';
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

}
?>
    </center>
  </div>
</div>




    <div class="footer">
        <center style="padding: 20px;">	&#169;Made By Sagar Chhatbar</center>
    </div>

    


</body>
</html>