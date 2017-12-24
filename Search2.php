<?php include('server.php') ?>

<html>
    <head>
        <title>Search </title>
        <link rel="stylesheet" type="text/css" href="trial1.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
    <body>   <nav>
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
    $querysearch="select * from users WHERE FirstName like '%$searchbar%' or LastName like '%$searchbar%' or Email like '%$searchbar%' or HomeTown like '%$searchbar%'"; 
    $result6 = mysqli_query($db, $querysearch);
     $querysearch1="select * from posts WHERE body like '%$searchbar%'";
    $result7 = mysqli_query($db, $querysearch1);
    if((mysqli_num_rows($result7)==0))
        
    {
       echo'no posts found ';
    }
     else 
    {
          $count= mysqli_num_rows($result7);
    $str2="results were found</br>";
    echo $count. " ".$str2;
        while($row = mysqli_fetch_array($result7, MYSQLI_ASSOC))
        {
          $uid=$row['User_ID'];
           $querypostedby="select * from users WHERE User_ID=$uid ";
             $result8 = mysqli_query($db, $querypostedby);
            while($rows = mysqli_fetch_array($result8, MYSQLI_ASSOC))
        {
                echo "<a href='Profile.php?id=$rows[User_ID]'>".$rows['FirstName']. ' '.$rows['LastName']. " </a> </br>";
                
            }
          //  echo  '<h2> '.$row['FirstName'].'  '.$row['LastName'].'</h2>';
           // echo   ' <a href="profle.php?id=   ' .$row['FirstName'].">  '<h2> '.$row['FirstName'].' '.$row['LastName'].'</h2></a>;
           // echo "fih posts" ."</br/>";  
             {  
       // echo "<a href='Profile.php?id=$row[User_ID]'>".$row['FirstName']. ' '.$row['LastName']. " </a> </br>";
            $image2 = $row['postimg'];
       if ($image2!=NULL)
       {
             echo "<img src='$image2' width=250 height=200 > ";
    echo "<br>";
       }
  echo "posted at :";
          echo $row['Dateofpost']."</br/>";
          echo $row['body'] ."<hr/> </br/>";  
                 
          }
            
           
            }
     }
    
    if((mysqli_num_rows($result6)==0))
        
    {
       echo'no results found as a user';
    }
    else 
    {
          $count= mysqli_num_rows($result6);
    $str2="results were found</br>";
    echo $count. " ".$str2;
        while($row = mysqli_fetch_array($result6, MYSQLI_ASSOC))
        {
          
          //  echo  '<h2> '.$row['FirstName'].'  '.$row['LastName'].'</h2>';
           // echo   ' <a href="profle.php?id=   ' .$row['FirstName'].">  '<h2> '.$row['FirstName'].' '.$row['LastName'].'</h2></a>;
            echo "<a href='Profile.php?id=$row[User_ID]'>".$row['FirstName']. ' '.$row['LastName']. " </a> </br>";  
            
           
               
        }
    }
    
   
}
?>
 </body>
 </html>
        