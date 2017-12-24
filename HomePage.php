
<?php include('server.php') ;


//$index = 0; // array index
$the_array = array();

/*loop start, foreach, while, etc.*/


?>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="trial1.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="header">
        <h5 style="color:black" > NEWS FEED </h5>     
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
        <a href="Info.php">Information</a>
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

    
    
    
    <?php 
      $FID=$_SESSION['ID'];
    
    
    
    $queryfriends="Select * FROM Requests Where Accepted=1 And( (From_ID=$FID) OR ( To_ID=$FID))";
   $resultfriends = mysqli_query($db, $queryfriends);
                      if (mysqli_num_rows($resultfriends) >0)
                      {    while ($row = mysqli_fetch_array($resultfriends, MYSQLI_ASSOC)) 
                              {
                         // echo $row['From_ID'];
if ($row['From_ID']==$FID)
{ $f=$row['To_ID'];
$the_array[]=$row['To_ID'];
   // $queryf="Select * FROM users Where User_ID ='$f'";

} 
else
{$f=$row['From_ID'];
$the_array[]=$row['From_ID'];
    //$queryf="Select * FROM users Where User_ID='$f'";  
} }
                          
                          }
                       
                          $querypost="Select * FROM posts order By Dateofpost Desc";
                             $resultpost = mysqli_query($db, $querypost);
                      if (mysqli_num_rows($resultpost) >0)
                      { while ($rowpost = mysqli_fetch_array($resultpost, MYSQLI_ASSOC)) 
                              { 
                          if (($rowpost['User_ID']==$rowpost['To_ID'] )|| ($rowpost['To_ID']==NULL))
                          {
                         foreach($the_array as $value){
                             
                           
                             if ($value==$rowpost['User_ID'])
                                 
                                 {
                                 $i=$rowpost['User_ID'];
                                 $_SESSION['PostID']=$rowpost['Post_ID'];
                                         $querypim="Select * FROM users Where User_ID='$i'";
                             $resultpim = mysqli_query($db, $querypim);
                                 if (mysqli_num_rows($resultpim) ==1)
                      { while ($rowpim = mysqli_fetch_array($resultpim, MYSQLI_ASSOC)) 
                              { 
                          $im1=$rowpim['img'];
                          
                      
                                 
                                 
                               
                                 
                                 
                                 
                                 
                                 
                                 
                                 ?> <div class='content3'> <?php
                                       ?> <img src=" <?php echo $rowpim['img'] ?>"  class="posquare"> <?php
                      }}
                                 
                      echo "<a href='Profile.php?id=$rowpost[User_ID]'>".$rowpost['PosterName']. " </a> <br>";
                      echo "<br>";
                      ?><div class="postbody"><?php echo $rowpost['body'] ." </br/>"; ?></div><?php
                                $image2 = $rowpost['postimg']; 
            //$_SESSION['PostID']=$rowpost['Post_ID'];
                                ?>
                <!-- <textarea  class="textarea"  name ="comments">

                       
                 </textarea>    
                    	 <button type="submit" class="btn" name="Comment">Comment</button> --> <?php
          
       if ($image2!=NULL)
           {?><div class="postbody"><?php
           echo "<img src='$image2' width=250 height=200 > ";?></div><?php
    echo "<br>";
    }    ?> <div style="float: right"> <?php echo $rowpost['Dateofpost']; ?> </div> <?php     echo "<br><hr/> " ;
      ?>     <form method='post'>
      <input type="hidden" id='post_id' name='post_id' value="<?php echo $_SESSION['PostID']?>">
      <button  style="float: right "   type="submit" class="fa fa-comment" name="Comment"></button> 
    
    
<input type="hidden" id='varname' name='varname' value="<?php echo $_SESSION['PostID']?>">
 <button style="float: right " type="submit" class="fa fa-thumbs-up" name="like"></button>

                   <button style="float: right " type="submit" class="fa fa-thumbs-down" name="unlike"></button><?php
    
 
       
       

   
        
                  
                             echo "<br>";
                           echo "<br>";
                            //echo $_POST['post_id'];
                           
                          ?>
     
                   <textarea  class = "textarea1"  name ="comments">

                                </textarea> 
      <?php     echo "<br>";
      echo "<br>";
      echo "<br>";
                         ?>
        </form>
  
         <label style="font-weight: bold ;font-style: italic;text-decoration: underline; font-size: 20px ;">Comments </label>  
    
                            <?php
                      
                          
                  
  
      $val= $rowpost['Post_ID'];
      //echo $val;
        $queryComm = "Select * from comments where post_ID=$val order by Date DESC" ;
            $resultComm = mysqli_query($db, $queryComm);
if (mysqli_num_rows($resultComm) > 0) {  
    while ($rowComm = mysqli_fetch_array($resultComm, MYSQLI_ASSOC)) {
        $n=$rowComm['From_ID'];
        $queryId = "Select UserName from users where User_ID=$n";
            $resultID = mysqli_query($db, $queryId);
            $rowId = mysqli_fetch_array($resultID ,MYSQLI_ASSOC);
            if (mysqli_num_rows($resultID) ==1){
                
                
                
                
                
                
                
                
                   $i=$rowComm['From_ID'];
                                         $querypim2="Select * FROM users Where User_ID='$i'";
                             $resultpim2 = mysqli_query($db, $querypim2);
                                 if (mysqli_num_rows($resultpim2) ==1)
                      { while ($rowpim2 = mysqli_fetch_array($resultpim2, MYSQLI_ASSOC)) 
                              { 
                      echo "<br>";
                      echo "<br>";
                          
                
                
                
                
                
                
                
                
                
                ?>                    <img src=" <?php echo $rowpim2['img'] ?>"  class="posquare"> <?php
                      }} ?>
                    
          <?php //echo $rowId['UserName'];
          echo "<a href='Profile.php?id=$n'>".$rowId['UserName']. " </a> </br>";
         
         echo "<br>";
              echo $rowComm['body'] ; 
              $_SESSION['commentID']=$rowComm['comment_ID'];
           ?>
              
             
             <form method="post">
               <input type="hidden" id='Comm_id' name='Comm_id' value="<?php echo $_SESSION['commentID']?>">
     
</form> 
    <div style="float:right">    <?php   echo "<br>"; echo $rowComm['Date'];
                ?> </div><?php 
                
 
            
                      ?> 
                
         
  <?php  } }
  ?> 
  <?php
} 
echo "<br> ";
echo "<br> ";
    
  ?>                       
                                  <?php

       } ?></div><?php
            } 
            
        }
    }
}  
?>
                      
    
    
</body>
</html>