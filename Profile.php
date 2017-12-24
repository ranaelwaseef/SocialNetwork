<?php include('server.php') ?>

<html>
    <head>
        <title>Profile page</title>
        <link rel="stylesheet" type="text/css" href="trial1.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
    <body>  
        <?php
        //  echo $_SERVER['QUERY_STRING'];
        $URL = $_SERVER['QUERY_STRING'];
        // echo parse_url('$URL',PHP_URL_QUERY);
        // echo  $_GET['id'];
        $ID = $_SESSION['ID'];
           $_SESSION['pending']=0;
        if (strpos($URL, "id") === false) {
            $PID = $_SESSION['ID'];
        } else {
            $PID = $_GET['id'];
            $_SESSION['FriendId'] = $PID;
        }
        if ($PID != $_SESSION['ID']) {
            $_SESSION['Mypage'] = 0;

            $queryfriends = "Select * FROM Requests Where Accepted=1 And( (From_ID=$ID AND To_ID=$PID) OR (From_ID=$PID AND To_ID=$ID))";
            $resultfriends = mysqli_query($db, $queryfriends);
            if (mysqli_num_rows($resultfriends) == 1) {

                $_SESSION['Friends'] = 1;
            } else {
                $_SESSION['Friends'] = 0;
            }
        } else {
            $_SESSION['Mypage'] = 1;
            $_SESSION['Friends'] = 1;
        }
        
        
        
        
        
        
           $querypending = "Select * FROM Requests Where Accepted=0 And( (From_ID=$ID AND To_ID=$PID) OR (From_ID=$PID AND To_ID=$ID))";
            $resultpending = mysqli_query($db, $querypending);
        
        if (mysqli_num_rows($resultpending) == 1) {
            $_SESSION['pending']=1;
        }
        else {
            $_SESSION['pending']=0;
            
        }
        
        

        $_SESSION['ProfileID'] = $PID;
        ?>   

        <?php include('errors.php');
        ?>
               <div class="header">
            <div class="hero-image">
  <div class="hero-text">
            
            <h3> <?php
        $sqlName = "SELECT * FROM users where User_ID='$PID'";

        $resultName = mysqli_query($db, $sqlName);


        if (mysqli_num_rows($resultName) == 1) {

            while ($rowname = mysqli_fetch_array($resultName, MYSQLI_ASSOC)) {
                echo '<h2> ' . $rowname['UserName'] . '</h2>';
            }
        }
       $im= $_SESSION['img']
        //echo $_SESSION['username']; 
        // echo  intval($PID); 
        ?></h3>

        </div>
       
  </div>
</div>
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
              
              <a style="padding-top: 9px"  href ="Profile.php">   <img src=" <?php echo $im ?>"  class="po">
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



       
 <div class="left">
      
<div class="cardleft">

                <?php
                $sqlimage = "SELECT * FROM users where User_ID='$PID'";
                $imageresult1 = mysqli_query($db, $sqlimage);



                if (mysqli_num_rows($imageresult1) == 1) {

                    while ($rowpic = mysqli_fetch_array($imageresult1, MYSQLI_ASSOC)) {
                        $image = $rowpic['img'];
?><div class="pp"><?php
                        echo "<img src='$image' width=250 height=220 > ";?></div><?php
                        echo "<br>";
                    }
                }
                
                ?>
            </div>
<?php
echo "<br>";
?>


            <div class="cardleft">
                <form method="post"  action="Server.php"  enctype="multipart/form-data">
                    
                 <?php   
                       $sqlName1 = "SELECT * FROM users where User_ID='$PID'";

        $resultName1 = mysqli_query($db, $sqlName1);


        if (mysqli_num_rows($resultName1) == 1) {

            while ($rowname1 = mysqli_fetch_array($resultName1, MYSQLI_ASSOC)) {
               
                
                ?>
                   <div class="contentinfo"> 
                   <?php echo "<br>"; ?>
                        <label class="fa fa-globe" style="font-weight: Bold ;font-size: 20px"> Intro </label>
                        <?php echo "<br>"; echo "<br>"?>
                        <div >    <label class="fa fa-home" style="font-weight: Bold ;font-size: 20px"> Lives in</label>
                         <label style="font-size: 20px"><?php echo $rowname1['HomeTown']; ?></label></div>
                          <div >    <label class="fa fa-address-book-o" style="font-weight: Bold ;font-size: 20px"> Nick Name</label>
                         <label style="font-size: 20px"><?php echo $rowname1['UserName']; ?></label></div>
                          <div >    <label class="fa fa-at" style="font-weight: Bold ;font-size: 20px"> Email</label>
                         <label style="font-size: 20px"><?php echo $rowname1['Email']; ?></label></div>
                           <div >    <label class="fa fa-transgender" style="font-weight: Bold ;font-size: 20px"> Gender</label>
                         <label style="font-size: 20px"><?php echo $rowname1['Gender']; ?></label></div>
                        </div> <?php
            }
        }?>
                    
                    
                    
                    
                    
                 
                    
                    
                    
                    
 
                    
                    <div>          
<?php
if ($_SESSION['Friends'] == 0 && !$_SESSION['Mypage'] && $_SESSION['pending']==0) {
    ?>  <br> <button type="submit" class="pbtn" name="AddFriend">Add Friend</button> </div> 
  
            <?php
                }  if ($_SESSION['pending']==1)
                {
                
                    ?> <button type="button" disabled class="btn8 disabled" >Add Friend</button>  <?php
                
                }
                
                
                
                
                
                
                ?><div> <?php
                if ($_SESSION['Friends'] == 1 && !$_SESSION['Mypage']) {
                    ?> <button type="submit" class="pbtn" name="unfriend">un friend</button> </div>  <?php
                }
              
                ?>


                </form>
                </div>
                
   <form method="post" action ="msg.php" >                        <div>          
<?php

if ( !$_SESSION['Mypage']) {
    ?>          
 
       <button type="submit" class="pbtn" name="Send Message">Send Message</button> </div> 
             <?php } ?></form>
                
                <form method="post" action="Myfriends.php" >

                    <div> 
                         <button type="submit" class="pbtn" name="Friends">Friends</button> </div>  
                </form>
                <?php if ($_SESSION['Mypage'] == 1) {
                    ?>
                  <!--   <form method="post" action="Settings.php" >
                        <br>    <button  type="submit" class="btn2"  name="Settings">Settings</button> <br>
                    </form> --><?php }
                ?>
                <form method="post" action="Info.php" >

                       <button  type="submit" class="pbtn" name="Info" >Info</button>  
 </form>
            </div>
      



     
            <form method="post"  action="Server.php"  enctype="multipart/form-data">
                      <div class="postform1">
                
                    <textarea  class="textarea"  name ="Posts"  >
                       
                    </textarea>

                    <input   type='file'  name='file' id="fileToUpload" >
<button  style="float:right"
                         type="submit" class="btn6" name="Share">Post</button>

                     
                <?php if ($_SESSION['Mypage'] == 1) {
                    ?> 
                        <select  class ="sel"    name='private'> 
                            <option value="0">Public</option>
                            <option value ="1">private</option>
                        </select> 
                     
<?php



                }
                ?>   
                
                         </div>
            </form>
                <div class="profileposts">
                   
              

<?php
//$PID=$_SESSION['ID'];
// echo "NOOOOOOOO";
//echo $_SESSION['Friends'];  
if ($_SESSION['Mypage']==1)
{
    $queryposts = "Select * from posts where (User_ID =$PID OR To_ID=$PID)    ORDER BY Dateofpost DESC"; 
}
 else if ($_SESSION['Friends'] == 0) {// User page And Not Friends
    $queryposts = "Select * from posts where (User_ID =$PID OR To_ID=$PID) AND (private=0)   ORDER BY Dateofpost DESC";
} else {
    $queryposts = "Select * from posts where ((User_ID =$PID ) OR (To_ID=$PID)  ) ORDER BY Dateofpost DESC";
}

$resultp = mysqli_query($db, $queryposts);
// echo $PID;
if (mysqli_num_rows($resultp) > 0) { 
    while ($row = mysqli_fetch_array($resultp, MYSQLI_ASSOC)) {

        //echo $row['PosterName']."</br>";
      $_SESSION['PostID']=$row['Post_ID'];
      $_SESSION['Nooflikes']=$row['likesno'];
                    

        ?> 
    <div class="card"> 
                    <form method="post">
               <input type="hidden" id='post_id' name='post_id' value="<?php echo $_SESSION['PostID']?>">
             <button  style ="float :right" type='submit' class="
fa fa-close" name ="deletepost"></button>
</form> 
        <?php
     
            ?> <img src=" <?php echo $im ?>"  class="po"> <?php
           echo "<a href='Profile.php?id=$row[User_ID]'>" . $row['PosterName'] .  " </a> </br>";
        $image2 = $row['postimg'];
        ?><div style="font-weight: Bold;font-size: 25"> <div class="postbody">
 <?php echo $row['body'] ?>  </div> </div><?php
        $_SESSION['PostID'] = $row['Post_ID'];
        $val= $_SESSION['PostID'];
if ($image2 != NULL) {?><div class="postbody"><?php
echo "<img src='$image2' width=250 height=200 > ";?></div><?php
echo "<br>";}    
?> <div style="float:right"><?php echo $row['Dateofpost']; ?> 

        

    </div><?php
       echo "<br>";
 
        ?>
     
                                   <?php echo "<hr/>"
                                   
                                ?>
        
        <form method='post'>
      <input type="hidden" id='post_id' name='post_id' value="<?php echo $_SESSION['PostID']?>">
      <button  style="float: right "   type="submit" class="fa fa-comment" name="Comment"></button> 
    
    
<input type="hidden" id='varname' name='varname' value="<?php echo $_SESSION['PostID']?>">
 <button style="float: right " type="submit" class="fa fa-thumbs-up" name="like"></button>
<!--<i style="float: right "  class="fa fa-thumbs-up" onclick="myFunction(this)"  ></i>-->
                 

<!--<script>
function myFunction(x) {
    
    
    
    x.classList.toggle("fa-thumbs-down");
}
</script>-->
                   <button style="float: right " type="submit" class="fa fa-thumbs-down" name="unlike"></button><?php
    
 
      // echo "<a href='likes.php'>"."liked by". " </a> </br>";
                   

   
        
                  
                             echo "<br>";
                           echo "<br>";
                            //echo $_POST['post_id'];
                          
                          ?>
            
     
                           <textarea   class = "textarea1"  name ="comments">

                                </textarea> 
      
        </form>   
         <label style="font-weight: Bold;font-size: 20">Comments </label>  
        <form method="post" action="likes.php">
              <input type="hidden" id='like_id' name='like_id' value="<?php echo $_SESSION['PostID']?>">
              <button  style="float:left" type="submit" class="btn3" name="likedby">Liked By <span class="badge"><?php echo  $_SESSION['Nooflikes']  ?> </span></button> 
              <br>
              <br><br>

         </form>
    
                            <?php
 $val= $_SESSION['PostID'];
        $queryComm = "Select * from Comments where post_ID=$val order by Date DESC" ;
            $resultComm = mysqli_query($db, $queryComm);
if (mysqli_num_rows($resultComm) > 0) {  ?>  <ul><?php
    while ($rowComm = mysqli_fetch_array($resultComm, MYSQLI_ASSOC)) {
        $n=$rowComm['From_ID'];
        $queryId = "Select UserName from users where User_ID=$n";
            $resultID = mysqli_query($db, $queryId);
            $rowId = mysqli_fetch_array($resultID ,MYSQLI_ASSOC);
            if (mysqli_num_rows($resultID) ==1){
                ?>    
   
         <li>  <?php //echo $rowId['UserName'];
           ?> <img src=" <?php echo $im ?>"  class="po"> <?php
          echo "<a href='Profile.php?id=$n'>".$rowId['UserName']. " </a> </br>";
         
         echo "<br>";
         ?><div style="font-weight: Bold;font-size: 20;">  <?php    echo $rowComm['body'] ;?> </div> <?php 
              $_SESSION['commentID']=$rowComm['comment_ID'];
           ?>
              
             

    <div style="float:right">     <form method="post">
               <input type="hidden" id='Comm_id' name='Comm_id' value="<?php echo $_SESSION['commentID']?>">
             <button  style ="float :right" type='submit' class="
fa fa-close" name ="delete"></button>
</form> <?php   echo "<br>"; echo $rowComm['Date'];
                                ?>
                </div><?php echo "<br>"
                ;
  echo "<br>";
  echo "<br>";
  
              echo "<hr/>";
                      ?> 
         </li> 
</ul> 
     <?php  } }?>
  <?php
} ?>  
                           
                          </div>
                                
                       <?php   } 
  
                    } else {
                        echo "No Posts";
                    }
                    ?> 


               
                </div>
      
       
 </body>
</html>
