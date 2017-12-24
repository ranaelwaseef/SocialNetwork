<?php include('server.php') ?>

<html>
    <head>
        <title>Search </title>
        <link rel="stylesheet" type="text/css" href="trial1.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
if (isset($_POST['searchbutton']))
{
    $output='';
    $searchbar= mysqli_real_escape_string($db, $_POST['searchlabel']);
  //echo $searchbar;
    $querysearch="select * from users WHERE FirstName like '%$searchbar%' or LastName like '%$searchbar%' or Email like '%$searchbar%' or HomeTown like '%$searchbar%'or CONCAT(Firstname,' ',LastName) like '%$searchbar%'"; 
    $result6 = mysqli_query($db, $querysearch);
     $querysearch1="select * from posts WHERE body like '%$searchbar%' order by Dateofpost DESC";
    $result7 = mysqli_query($db, $querysearch1);
    ?>
          
        <div class="bk">
          <img class="img-circle" src="people1.jpg" width=100 height=100> <div class="people"><h2>People</h2></div>
            <?php echo "<hr/>"?>
            
            <?php
    if((mysqli_num_rows($result6)==0))
        
    {
       ?>
      <h3> <?php echo 'No Users are found';?></h3><?php
        echo "</br>";
    }
    else 
    {
          $count= mysqli_num_rows($result6);
    $str2="results were found</br>";?>
        
  <h3> <?php echo $count. " ".$str2;?></h3><?php
        while($row = mysqli_fetch_array($result6, MYSQLI_ASSOC))
        {
          ?>
          
            <img src=" <?php echo $row['img'] ?>"  class="posquare"> 
              <div class="reqlink">
                  <?php
    echo "<a href='Profile.php?id=$row[User_ID]'>".$row['FirstName']. ' '.$row['LastName']. " </a> </br></br>";?></div>
       
            
               <?php
        }?>
            
         <?php
    }
    ?></div>
        
    <div class="bk">
          <img class="img-circle" src="post2.jpg" width=100 height=100> <div class="People"><h2>Posts Found</h2></div>
            <?php echo "<hr/>"?>
            
            <?php
    if((mysqli_num_rows($result7)==0))
        
    {?>
      <h3> <?php echo 'No Posts are found';?></h3><?php
    }
     else 
    {
          $count= mysqli_num_rows($result7);
    $str2="results were found</br>";?>
    <h3> <?php echo $count. " ".$str2;?></h3><?php
        while($row = mysqli_fetch_array($result7, MYSQLI_ASSOC))
        {
          $uid=$row['User_ID'];
           $querypostedby="select * from users WHERE User_ID=$uid ";
             $result8 = mysqli_query($db, $querypostedby);
            while($rows = mysqli_fetch_array($result8, MYSQLI_ASSOC))
        {?>
                <img src=" <?php echo $rows['img'] ?>"  class="posquare"> 
              <div class="reqlink">
                  <?php
    echo "<a href='Profile.php?id=$rows[User_ID]'>".$rows['FirstName']. ' '.$rows['LastName']. " </a> </br></br>";?></div>
                <?php
            }
          //  echo  '<h2> '.$row['FirstName'].'  '.$row['LastName'].'</h2>';
           // echo   ' <a href="profle.php?id=   ' .$row['FirstName'].">  '<h2> '.$row['FirstName'].' '.$row['LastName'].'</h2></a>;
           // echo "fih posts" ."</br/>";  
             {  
       // echo "<a href='Profile.php?id=$row[User_ID]'>".$row['FirstName']. ' '.$row['LastName']. " </a> </br>";
            $image2 = $row['postimg'];
       if ($image2!=NULL)
       {?>
        <div class="postbody">
         <?php echo "<img src='$image2' width=250 height=200 > ";?></div>
        <?php
    echo "<br>";
       }?>
  

        <div class="postbody"> <?php echo $row['body'] ;?></div>
        <?php echo"</br>";?>
        <div class="datemsg"><?php echo $row['Dateofpost'];?></div>
        <?php echo"</br><hr/>";?>
                 <?php
          }
            
           
            }?>
         </div>
        <?php
     }
    
    
    
    
   
}
?>
 </body>
 </html>
        