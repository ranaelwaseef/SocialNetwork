<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login </title>
	<link rel="stylesheet" type="text/css" href="Style1.css">
</head>
<body>
     <div class ="header" >
         
         <h> Enter The Email </h>
         
    </div>
       
	
    <div >
                  <nav class="nav">
                 
  <ul>
       <li> <a href="login.php">Login</a></li>
      <li> <a href="Signup.php">SignUp</a></li>
     
    
  </ul>
</nav>
</div>
		<form method="post"  action="Server.php" class="content">
                     <?php include('errors.php'); ?>
       <div class="input-group">
			<label>Email</label>
                        <input type="Email" name="Email" >

                    <div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
                        
		
		<div class="input-group">
			<button type="submit" class="btn" name="Login_user">Sign in</button>
		</div>
             
        
           </form>
            
</body>
</html>


