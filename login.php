<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login </title>
        <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
     <div class ="header1" >
         
         
    </div>
       
	
    <div >
                  <nav class="nav">
                 
  <ul>
       <li> <a href="login.php">Login</a></li>
      <li> <a href="Signup.php">SignUp</a></li>
     
    
  </ul>
</nav>
</div>
    <form method="post"  action="login.php" class="content">
                     <div class="imgcontainer">
    <img src="loginn.png" alt="Avatar" class="avatar">
	<br><br><br>
					 <?php include('errors.php'); ?>
       <div class="input-group">
			<label>Email</label>
                        <input type="Email" placeholder="'email@example.com'" name="Email" >

                    <div class="input-group">
			<label>Password</label>
			<input type="password" placeholder="Your password goes here" name="password">
                        
		
		<div class="input-group">
			<button style="float:right"   type="submit" class="btn" name="Login_user">Sign in</button>
		</div>
             
        
           </form>
            
</body>
</html>


