<?php include('server.php') ?>

<html>
<head>
	<title>My Friends</title>
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


        <div class="header" ></div>
      
    <?php
    
    $FID=$_SESSION['ProfileID'];
    
   
    $queryfriends="Select * FROM Requests Where Accepted=1 And( (From_ID=$FID) OR ( To_ID=$FID))";
   $resultfriends = mysqli_query($db, $queryfriends);
                      if (mysqli_num_rows($resultfriends) >0)
                      {    while ($row = mysqli_fetch_array($resultfriends, MYSQLI_ASSOC)) 
                              {
                         // echo $row['From_ID'];
if ($row['From_ID']==$FID)
{ $f=$row['To_ID'];
    $queryf="Select * FROM users Where User_ID ='$f'";
    
} 
else
{$f=$row['From_ID'];
    $queryf="Select * FROM users Where User_ID='$f'";  
}
$resultf = mysqli_query($db, $queryf);
                      if (mysqli_num_rows($resultf) ==1) 
                          {
                          while ($rowf = mysqli_fetch_array($resultf, MYSQLI_ASSOC)) 
                        
                          
        
                                  {  ?> <div class="content3" > <img src=" <?php echo $rowf['img'] ?>"  class="posquare"><?php
                                       echo "<a href='Profile.php?id=$rowf[User_ID]'>".$rowf['FirstName']. ' '.$rowf['LastName']. " </a> </br> <br>";  
                              
                                      ?>   </div> <?php
                              
                              
                              
                                  }
       
                         
                          
                          
                      }
                   
                          
                            //echo "<a href='Profile.php?id=$row[$FID]'>".$row['FirstName']. ' '.$row['LastName']. " </a> </br>";  
                          
                      }
                          
                      }
 else {   echo "No Friends";
     
 }
                      
    
    ?> 
        
   
  
     
        
</body>
        </html>