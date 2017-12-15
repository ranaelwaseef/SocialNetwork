<?php include('server.php') ?>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="Style1.css">
</head>
<body>  
                 <nav>
                   <div class="nav" >
  <ul>
        <li> <a href="Signup.php">logout</a></li>
     
    
    
  </ul>
                       </div>
</nav>
    
    
       
    <div class="header">
		<h3> <?php echo $_SESSION['username']; ?></h3>
	</div>
	
   
        <div>
            <img src=""  width="250" height="200"   alt=" <?php echo  $_SESSION['username']?> 's Profile ">  </div>
        
        
        <form method="post"  action="Server.php" >
        <div>
                        <textarea  class="textarea"  name ="Posts" >
                       
                        </textarea>
       
			<button type="submit" class="btn" name="Share">Post</button>
		</div>
        

    </form>
    <form method="post" action="Info.php" >
        <div class="input-group">
			<button type="submit" class="btn" name="Info" style="float:left">Info</button>
		</div>
              
         </form>
      
                          
                        
    
</body>

    