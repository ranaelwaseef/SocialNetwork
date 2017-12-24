<?php include('server.php') ?>

<html>
<head>
	<title>Send Message</title>
        <link rel="stylesheet" type="text/css" href="trial1.css">
             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
      
</head>
<body>
    
    
    <div class="header"></div>
    <nav>
            <div class="topnav" >


             <!--   <a style="color:white  ;  text-decoration: none;" href="Signup.php">Logout</a>-->
                             <div class="dropdown">
    <button class="dropbtn">
        <i class="fa fa-bars"></i>
    </button>
    <div class="dropdown-content">
        <a href="Settings.php">Setting</a>
      <!--  <a href="Info.php">Information</a>-->
        <a href="login.php">logout</a>
    </div>
  </div> 
                
                  <a   class="fa fa-bell"  href ="Notf.php" style="font-size:20px;color:white;   text-decoration: none;" >  <span class="badge"><?php echo $_SESSION['Notf'] ?> </span></a>
                  <a class="	fa fa-user-plus "  style="font-size:20px;color:white ;   text-decoration: none;" href ="Request.php" >  <span class="badge"><?php echo$_SESSION['ReqNotf'] ?> </span></a>   
               
                 <a   class=" 	fa fa-commenting " style="font-size:20px;color:white ;   text-decoration: none;" href="mymsg.php"> <span class="badge"><?php echo  $_SESSION['Mess']  ?> </span></a>
              <!--  <a class="active" href ="Profile.php">My Profile </a>-->
              
              <a style="padding-top: 9px"  href ="Profile.php">   <img src=" <?php echo  $_SESSION['img'] ?>"  class="po">
</a>
              
                <a class="fa fa-Home" href ="HomePage.php" style="font-size:25px;color:white ;   text-decoration: none;"></a>
               
                <div class="search-container">
                    <form method="post"  action="Search.php" >
                        <input  type="text" name="searchlabel" required placeholder="Search.."  > 
                        <button class="fa fa-Search" type="submit" name="searchbutton"   ></button>

                    </form>  

                </div>


            </div>
        </nav>
    <div class=sendmsg  >
        <img src="msg1.png" width=150 height=150 >
    <form method="post"  action="Server.php" >
        
             <div class="textmsg"><textarea  class="textarea"  name ="messages1"> 
                       
                  </textarea></div>
            
        <button type="submit" class="msgbtn" name="send">send</button>
           
    </form>
         </div>
    </body>
</html>