<?php include ('Server.php');
?>

<html>
    <head>
        <title>User Information</title>
        <link rel="stylesheet" type="text/css" href="trial1.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <nav>
            <div class="topnav" >


             <!--   <a style="color:white  ;  text-decoration: none;" href="Signup.php">Logout</a>-->
                             <div class="dropdown">
    <button class="dropbtn">
        <i class="fa fa-bars"></i>
    </button>
    <div class="dropdown-content">
        <a href="Settings.php">Setting</a>
        <a href="Info.php">Information</a>
        <a href="login.php">logout</a>
    </div>
  </div> 
                
                  <a   class="fa fa-bell"  href ="Notf.php" style="font-size:20px;color:white;   text-decoration: none;" >  <span class="badge"><?php echo $_SESSION['Notf'] ?> </span></a>
                  <a class="	fa fa-user-plus "  style="font-size:20px;color:white ;   text-decoration: none;" href ="Request.php" >  <span class="badge"><?php echo$_SESSION['ReqNotf'] ?> </span></a>   
               
                 <a   class=" 	fa fa-commenting " style="font-size:20px;color:white ;   text-decoration: none;" href="mymsg.php"> <span class="badge"><?php echo  $_SESSION['Mess']  ?> </span></a>
              <!--  <a class="active" href ="Profile.php">My Profile </a>-->
              
              <a style="padding-top: 9px"  href ="Profile.php">   <img src=" <?php echo   $_SESSION['img']?>"  class="po">
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


        
        
        
        
        
        
        
           <div class="header"> </div>
		<div class="content">
		<div class="imgcontainer">
    <img src="info.png" alt="Avatar" class="avatar">
             
              
                                <?php
                                 
      $PostID1=$_SESSION['ProfileID'];                                
$ID= $_SESSION['ID'];
$queryfriends="Select * FROM Requests Where Accepted=1 And( (From_ID=$ID AND To_ID=$PostID1) OR (From_ID=$PostID1 AND To_ID=$ID))";
   $resultfriends = mysqli_query($db, $queryfriends);
   
                   if (mysqli_num_rows($resultfriends) ==1) {
                     
                         $Friends=1; 
                      
                     
                       
                       
                   }     
                   else {
                       $Friends=0;
                       
                   }           
                                
                                
                                
                                
                              
                                 
                                // echo 'IDDDDDD';
                                // echo  $PostID1;
                             
                                 
     $queryInfo = "SELECT * FROM users WHERE User_ID=$PostID1 ";
          $resultInfo= mysqli_query($db, $queryInfo);
          

        
              
                       if (mysqli_num_rows($resultInfo) ==1) {
               while ($row = mysqli_fetch_array($resultInfo,   MYSQLI_ASSOC))
        {    
                   ?> 
    <div style="font-size:25px ;font-style: italic">    
            <div >  <label style="font-weight: bold "> First Name: </label>
                <label><?php echo $row['FirstName']; ?> </label></div>
  <div >    <label style="font-weight: bold ">Last Name:   </label>

                        <label><?php echo $row['LastName']; ?></label></div>
               <div >    <label style="font-weight: bold ">Email </label>

                        <label><?php echo $row['Email']; ?></label></div>
               <div >    <label style="font-weight: bold ">Gender :   </label>

                        <label><?php echo $row['Gender']; ?></label></div>
                <div >    <label style="font-weight: bold "> Status     </label>

                        <label><?php echo $row['User_Status']; ?></label></div>
                  <div >    <label style="font-weight: bold ">HomeTown:    </label>

                        <label><?php echo $row['HomeTown']; ?></label></div>

<?php 
if ($Friends==1||$_SESSION['Mypage']==1)
{?>
    

      <div >    <label style="font-weight: bold "> About Me:   </label>

                        <label><?php echo $row['Aboutme']; ?></label></div>
          <div >    <label style="font-weight: bold ">BirthDay :  </label>

                        <label><?php echo $row['Birthdate']; ?></label></div>
            
            
           <?php } ?>
            
             <div >    <label style="font-weight: bold "> NickName   </label>
                  

                        <label><?php echo $row['Nickname']; ?></label></div>
            
            
            
       <?php          $queryInfophone = "SELECT * FROM userphone WHERE User_ID=$PostID1 ";
          $resultInfophone= mysqli_query($db, $queryInfophone);
                                  
                                    
        
              
                       if (mysqli_num_rows($resultInfophone)==1) {
               while ($rowp = mysqli_fetch_array($resultInfophone,   MYSQLI_ASSOC))
        {?>
                   <div >    <label style="font-weight: bold ">Phone1  </label>

                        <label><?php echo $rowp['PhoneNumber']; ?></label></div> 
            
            
            
             <?php if ( $rowp['PhoneNumber2']!=NULL)
                 
             {?>
                 
             
  <div >    <label style="font-weight: bold "> Phone2  </label>

                        <label><?php echo $rowp['phoneNumber2']; ?></label></div>  <?php     
        }
        }
                       }
?>
</div>
                <?php

                }
                }
                 ?>
        <form action="Profile.php">
             <div class="input-group">
			<button type="submit" class="btn5" name="Back">Back</button>
		</div>
        </form>
                </div>
                </div>
    </body>
</html>