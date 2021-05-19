<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
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
<center>
<div class="in_form">
    <form method="post">
      <div class="div_form">
          <label><h3>Name</h3></label>
          <input type="text" id="text" class="inputtype" name="name" required>
      </div>
      
      <div  class="div_form">
          <label><h3>Email address</h3></label>
          <input type="email" id="email" class="inputtype" name="email" aria-describedby="emailHelp"required>
      </div>
      <div  class="div_form">
          <label><h3>Amount</h3></label>
          <input type="tel"  id="amount" class="inputtype" name="amount" required>
      </div>
      <br>
      <br>
      <div  class="div_form">
          <button type="submit" class="btn"  name="create">Create</button>
          <input type="reset"   class="btn" ></input>
      </div>
    </form>
</div>
<center>

    <div class="footer">
        <center style="padding: 20px;">	&#169;Made By Sagar Chhatbar</center>
    </div>


    <?php
$c=mysqli_connect("localhost","root","","basicbank");
if($c)
{
if(isset($_POST["create"]))
{
$fm=$_POST['name'];
$em=$_POST['email'];
$amt=$_POST['amount'];
$ins= "insert into customers values('','$fm','$em','$amt')";


if(mysqli_query($c,$ins))
{
        echo "<script>alert('created'); window.location.assign('transact.php')</script>";
		
        
    }
else
{
	echo mysqli_error($c);
}
}
else
{
	echo mysqli_error($c);
}

}

mysqli_close($c);
?>
	
</body>
</html>