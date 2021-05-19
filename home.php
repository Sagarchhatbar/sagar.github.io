<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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
    <div>
   <h1 style="color:black;">Basic Banking System<h1>
    <img class="logo" src="logo.png"></img>
    </div>
</center>
    
<div class="cards">
<a href="create_user.php" class="user">
    <div class="in_card">
      <div>
        <div class="click">Click to Create User</div>
        <hr>
          <div class="click">
           <h2>Create a User</h2>
           <p >Create a user to be added to bank </p>
         </div>   
      </div>
    
    </div>
</a>
<a href="transact.php" class="user" >
    <div class="in_card">
      <div>
        <div class="click">Click to Transact</div>
        <hr>
          <div class="click">
            <h2>Transact Money</h2>
            <p>Transact Money from selected account</p>
          </div>
      </div>
    
    </div>
</a>
<a href="history.php" class="user">
    <div class="in_card">
      <div>
        <div class="click">View Transaction History</div>
        <hr>
        <div class="click">
          <h2>History of transactions</h2>
          <p>Display the history of transactions happen till date</p>
        </div>
      </div>
    </div>
</a>

</div>   
</center>       
    <div class="footer">
        <center style="padding: 20px;">	&#169;Made By Sagar Chhatbar</center>
    </div>

</body>
</html>