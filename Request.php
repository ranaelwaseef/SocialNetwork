<?php include('server.php') ?>
<html>
    <head>
        <title>Requests </title>
        <link rel="stylesheet" type="text/css" href="trial1.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
          <?php
        $MYID=$_SESSION['ID'];
         $querydel = "Delete From reqnotf WHERE To_ID = $MYID ";
        $resultrequest = mysqli_query($db, $querydel);
           $queryrequest = "SELECT * FROM requests WHERE To_ID= $MYID";
        
         $_SESSION['ReqNotf']=0;
         
//           $queryrequest2 = "SELECT * FROM ReqNotf WHERE To_ID=$MYID  ";
//     $counter=  mysqli_query($db,$queryrequest2 );
//     $count=  mysqli_num_rows($counter);
//     $_SESSION['ReqNotf']=$count ;
           
        $resultrequest = mysqli_query($db, $queryrequest);
        
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
            
            <h4> Friend's Requests</h4>
          
            
            
        </div>
       
      
      
            <?php
        if (mysqli_num_rows($resultrequest)>0) {
            while ($row = mysqli_fetch_array($resultrequest, MYSQLI_ASSOC)) {


           if($row['Accepted']==0&&$row['To_ID']==$MYID)
           {   $_SESSION['RequestID']=$row['Request_ID'];
               $from=$row['From_ID'];
               $queryrequest2 = "SELECT * FROM users WHERE User_ID='$from'";
              // $_SESSION['RequestID']=$row['RequestID'];
                $resultrequest1 = mysqli_query($db, $queryrequest2);
                
                  if (mysqli_num_rows($resultrequest1)==1) {
            while ($rowreq = mysqli_fetch_array($resultrequest1, MYSQLI_ASSOC)) {
               ?> 
          <div class="friends"> 
       <?php
      $r=$_SESSION['ReqNotf'] ;
                ?> <img src=" <?php echo $rowreq['img'] ?>"  class="posquare"> 
              <div class="reqlink">
                  <?php   echo "<a href='Profile.php?id=$rowreq[User_ID]'>".$rowreq['FirstName']. ' '.$rowreq['LastName']. " </a> <br>";?></div>
           <?php
                
            }
                  }
               
               
               
               ?>
        
              
              <form method="post" class="reqbtn">
                   
                  <input type="hidden" id='Request_id' name='Request_id' value="<?php echo $_SESSION['RequestID']?>">;
                    <button style=" float:left" type="submit" class="btn3" name="Accepted">Accept Friend</button> 
         <button style=" float:left" type="submit" class="btn3" name="Ignore">Ignore </button>
                    
</form>
            
       </div>             
         <?php  
         echo "</br>";
           }
                
            }
        }
        else { ?>
        <div class="no" > <?php 
            echo "No Friends Request"; 
            ?> </div> <?php      
        }
        ?>
        
       
        
        
        
        
        
    </body>
        
</html>