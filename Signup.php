<!DOCTYPE html>
<?php include('Server.php') ?>


<html>
<head>
	<title>2</title>
	<link rel="stylesheet" type="text/css" href="Style1.css">
     
</head>
<body>
     <div class ="header" >
         
         <h> Fill The Form</h>
         
    </div>
       
               <nav >
                   <div class="nav" >
  <ul>
        <li> <a href="login.php">Login</a></li>
      <li> <a href="Signup.php">SignUp</a></li>
    
    
  </ul>
                       </div>
</nav>


	
    
    <form method="post" action="Server.php" class="content">
    

	
        <?php include('errors.php'); ?>
                  
                    <div class="input-group">
                        <label>First Name</label>

                        <input type="text" name="FirstName" required >
                    </div>

                    <div class="input-group">
                        <label>Last Name</label>

                        <input type="text" name="LastName" required >
                    </div>
                    

                    <div class="input-group">
			<label>Email</label>
                        <input type="email" name="email" required>
		</div>
                          <div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" required>
		</div>
                    	<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" required>
		</div>
                    
                    <div class="labelish" >
                         
                <div class="floatBlock">
                    
                            <input type="radio" name="gender" value="Male" >Male  
                      
                            <input type="radio" name="gender" value="Female" >Female 
                            </div>
                        
                                                                  
                    </div>
       
                    <div  
                        class="input-group">
                        <label> Birthday</label>
                        
                        <input type="date" name="bday" required> 
                        <!--<input type="submit" value="Save"> -->
                    </div> 
                 
                     <div class="input-group">
                         <label>Nick Name</label>
                        <input type="text" name ="NickName" >
                    </div>
                    
                
                 <div class="input-group">
                        <label>Status </label>
                        <input type="text" name ="Status" >
                    </div>
                   <div class="input-group">
                       <label>Home Town</label>
                        <input type="text" name ="HomeTown">
                    </div>
                    <div class="input-group">
                        <label>About Me</label>
                        <textarea  rows="4" cols="45"   name ="Aboutme ">
                       
                        </textarea>
                    </div>
        
                                <div class="input-group">
                             
                        
                                    <label>Select image to upload </label>
    <input type="file" name="file" id="fileToUpload">
    <input type="submit" value="Upload Image" name="Upload me">

                        </div>
                 
            <div class="input-group">
			<button type="submit" class="btn" name="reg_user">Sign Up</button>
                        
		</div>
                   
          
          </form>
    	 
      
                     
                        
   
    
              
</body>
</html>
