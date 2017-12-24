<?php include('server.php') ;


//$index = 0; // array index

/*loop start, foreach, while, etc.*/


?>
<html>
<head>
	<title>Liked by</title>
        <link rel="stylesheet" type="text/css" href="trial1.css">
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

    
        <div class="header">
        </div>

    <div class="content">
    <?php
   
    $_SESSION['pp']= mysqli_real_escape_string($db,$_POST['like_id']);
   
    
    $Post1=$_SESSION['pp'];
    $querylikes1="SELECT * FROM likedby WHERE Post_ID=$Post1";
    
    $res = mysqli_query($db, $querylikes1);
        
     if (mysqli_num_rows($res) >0) {
         
            while ($row0 = mysqli_fetch_array($res, MYSQLI_ASSOC))
            {
            $uid1=$row0['User_ID'];
           $querypostedby="select * from users WHERE User_ID=$uid1 ";
             $result8 = mysqli_query($db, $querypostedby);
            while($rows = mysqli_fetch_array($result8, MYSQLI_ASSOC))
        {
                echo"</br></br></br>";
                  ?> <img src=" <?php echo $rows['img'] ?>"  class="posquare"> <?php
        echo "<a href='Profile.php?id=$rows[User_ID]'>".$rows['FirstName']. ' '.$rows['LastName']. " </a> </br>";
                
            }
            }
                
                
                
                
                                                             
            
            
            }
    
     
    ?>
    </div>
    </body>
</html>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    