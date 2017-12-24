<?php include('server.php') ?>
<html>
    <head>
        <title> Notification </title>
        <link rel="stylesheet" type="text/css" href="trial1.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        
       
         <?php
        $MYID=$_SESSION['ID'];
          // $queryrequest = "SELECT * FROM notf WHERE To_ID= $MYID";
      
//           $queryrequest5 = "SELECT * FROM notf WHERE To_ID=$MYID And Status=0  ";
//            $counter1=  mysqli_query($db,$queryrequest5 );
//     $count1=  mysqli_num_rows($counter1);
     $_SESSION['Notf']=0 ;
          ?>
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
                        <input  type="text" name="searchlabel"  style="padding-bottom:10px" required placeholder="Search.."  > 
                        <button class="fa fa-Search"  style="font-size:20px;padding-bottom:10px" type="submit" name="searchbutton"   ></button>

                    </form>  

                </div>


            </div>
        </nav>
      
    
         <div class="header">
        <h5 style="color:black" > My Notifications </h5>     
    </div>
       
       <?php
        
           $queryrequest2 = "SELECT * FROM notf WHERE To_ID=$MYID  ";
     $counter=  mysqli_query($db,$queryrequest2 );

         
        $resultrequest = mysqli_query($db, $queryrequest2);
        
   if (mysqli_num_rows($resultrequest)>0) {
            while ($row = mysqli_fetch_array($resultrequest, MYSQLI_ASSOC)) {
               
                $y=$row['User_ID'];
                 $queryrequest23 = "SELECT * FROM users WHERE User_ID=$y";
                 
                   $resultrequest1 = mysqli_query($db, $queryrequest23);
                
                  if (mysqli_num_rows($resultrequest1)==1) {
                      
            while ($rowreq = mysqli_fetch_array($resultrequest1, MYSQLI_ASSOC)) {?>
                <div class="notf">
        <?php
              ?> <img src=" <?php echo $rowreq['img'] ?>"  class="posquare"> 
              <div class="reqlink">
                  <?php
                 echo "<a href='Profile.php?id=$rowreq[User_ID]'>".$rowreq['UserName']. " </a> ";?></div>
                   
                
                    <div class="notfbody"><?php
                
                echo $row['NotfBody'];?></div><?php
               
            } ?></div><?php
            }
            }
                
            }
            
            
             $query5="Update notf  Set Status =1 where To_ID=$MYID";
               $resultrequest = mysqli_query($db, $query5);
           
            
            
        ?>
        
       
        
        
        
        
        
    </body>
        
</html>