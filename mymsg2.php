<?php include('server.php') ?>

<html>
<head>
	<title>Home Page</title>
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
                <div class="header"> </div>
    <?php

    

        $MYID=$_SESSION['ID'];
           $querymsg = "SELECT * FROM messages WHERE To_ID= $MYID ";
            $resultrequest1 = mysqli_query($db, $querymsg);
 if((mysqli_num_rows($resultrequest1)>0))
 {
while($row = mysqli_fetch_array($resultrequest1, MYSQLI_ASSOC))
        {
   
     $querysenders = " SELECT * FROM users WHERE User_ID =$row[From_ID]";
    
            $resultrequest3 = mysqli_query($db, $querysenders);
        while($rows = mysqli_fetch_array($resultrequest3, MYSQLI_ASSOC))
        {
        
    
    echo "<a href='Profile.php?id=$rows[User_ID]'>".$rows['FirstName']. ' '.$rows['LastName']. " </a> </br>";
      
    
        }
       
    {
        echo $row['body'] ." </br/>";
        ?>
            <div style="float:right">    <?php   echo "<br>"; echo $row['Date1'];
                ?> </div> 
 <?php echo "<br>";
 echo "<br>";
              echo "<hr/>";
    } 
}
 }
   $queryms = "Update messages Set  status=1 Where To_ID=$MYID";
            $resultrequest2 = mysqli_query($db, $queryms);
            $_SESSION['Mess']=0;
?>
    </body>
    
            </html>