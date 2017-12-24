<!DOCTYPE html>
<?php include('Server.php') ?>

<html>
<style>
body
{
	background-image: url("background.jpg");

}

input[type=email], input[type=password],input[type="text"] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	text-align:center;
	font-weight:bold;
	font-size:20px;
	font-family: Rockwell, "Courier Bold", Courier, Georgia, Times, "Times New Roman", serif;



}
button {
    background-color: purple;
    color: white;
	font-family: Copperplate, "Copperplate Gothic Light", fantasy;
	font-size: 24px;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
	opacity: 0.5;
}

.imgcontainer {
    text-align: center;
    margin: 0px 0 20px 0;
}

img.avatar {
    width: 30%;
    border-radius: 10%;
}

label{
	font-family: Copperplate, "Copperplate Gothic Light", fantasy;
	font-size: 20px;
	font-style: normal;
	font-variant: normal;
	font-weight: bold;
	
}
.header {

   position: relative;
	color: black; 
   text-align: center;
	border: 0px solid #B0C4DE;
	border-bottom: none;
	border-radius: 0px 0px 0px 0px;
	padding: 0px;
    background-color:#ffffff;
    margin:   auto;
    opacity: 0.6;
     filter: alpha(opacity=60); 
}
nav {
  position:absolute;
  z-index: 9999;
  top: 0;
  left: 0;
  width: 100%;
  height: 35px;
 

}

ul {
	font-family: Copperplate, "Copperplate Gothic Light", fantasy;
	font-size:24px;
	list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: right;
}
li a {
    display: block;
    color: white;
    text-align: center;
    padding: 20px 20px;
    text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
    background-color: purple;
}
.content {
	
    width: 40%;
	margin:   auto;
	padding: 50px;
	border: 1px solid #B0C4DE;
	background: #DCDCDC;
	border-radius: 0px 0px 50px 50px;
         background-color: #ffffff;
        opacity: 0.6;
         filter: alpha(opacity=60); 
    box-shadow: 10px 10px 5px #888888;
          box-sizing: border-box;

  
    
}
.error {
	width: 92%; 
	margin: 0px auto; 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
	text-align: left;
}


</style>


	<title>Sign up.</title>
     
</head>
<body>
     <div class ="header" >
         
         <h1> Fill The Form</h1>
         
    </div>
       
               <nav >
                   <div class="nav" >
  <ul>
        <li> <a href="login.php">Login</a></li>
      <li> <a href="Signup.php">SignUp</a></li>
    
    
  </ul>
                       </div>
</nav>


	
    
    <form method="post"  class="content">
	<div class="imgcontainer">
    <img src="signup.jpg" alt="Avatar" class="avatar"><br><br>
    

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
                    
                            <input type="radio" name="gender" value="Male" ><label>Male</label>  
                      
                            <input type="radio" name="gender" value="Female" ><label>Female</label><br> 
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
                        <label>About Me</label><br>
                        
                           <textarea   class = "textarea1"  name ="Aboutme">

                                </textarea> 
                    </div>
         <div class="input-group">
                        <label>Phone Number </label>
                        <input type="text" name ="PhoneNo1" >
                    </div>
        <div class="input-group">
                        <label>Phone Number 2 </label>
                        <input type="text" name ="PhoneNo2" >
                    </div>
        
       
                 
            <div class="input-group">
			<button type="submit" class="btn" name="reg_user">Sign Up</button>
                        
		</div>
                   
          
          </form>
    	 
      
                     
                        
   
    
              
</body>
</html>
