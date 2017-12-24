<?php

//declaration 
session_start();

//$ID="";
$db = mysqli_connect('localhost', 'root', '', 'socialnetwork');
$errors = array();
//$username="";



if (isset($_POST['reg_user'])) {

    $FirstName = mysqli_real_escape_string($db, $_POST['FirstName']);
    $LastName = mysqli_real_escape_string($db, $_POST['LastName']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $Birthdate = mysqli_real_escape_string($db, $_POST['bday']);
    $Birthdate = date("Y-m-d", strtotime($Birthdate));
    $password_1 = md5($password_1);
    $password_2 = md5($password_2);
    $NickName = mysqli_real_escape_string($db, $_POST['NickName']);
    $Status = mysqli_real_escape_string($db, $_POST['Status']);
    $HomeTown = mysqli_real_escape_string($db, $_POST['HomeTown']);
   $Aboutme = mysqli_real_escape_string($db, $_POST['Aboutme']);
    $PhoneNo = mysqli_real_escape_string($db, $_POST['PhoneNo1']);
    $PhoneNo2 = mysqli_real_escape_string($db, $_POST['PhoneNo2']);
    $_SESSION['ReqNotf']=0;
   $_SESSION['Notf']=0;
   $_SESSION['Mess']=0;

    if (isset($_POST['gender'])) {
        $Gender = $_POST['gender'];
    }

    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
    if (empty($FirstName)) {
        array_push($errors, "First Name is required");
    }
    if (empty($LastName)) {
        array_push($errors, "LastName is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($Gender == NULL) {
        array_push($errors, "Gender is required");
    }
    $query0 = "SELECT * FROM users WHERE Email='$email'";
    $result12 = mysqli_query($db, $query0);
    if (mysqli_num_rows($result12) == 1) {
        array_push($errors, "Email is  Already exists ");
    }

    if ($NickName != NULL) {
        $_SESSION['username'] = $NickName;
    } else {
        $_SESSION['username'] = $FirstName . ' ' . $LastName;
    }
    $UseName=  $_SESSION['username'];

    if (count($errors) == 0) {
       // $query = "INSERT INTO users (FirstName, LastName, Email,Passwords,Gender,Birthdate,Nickname,User_Status,HomeTown) 
				 // VALUES('$FirstName', '$LastName','$email', '$password_1','$Gender','$Birthdate','$NickName','$Status','$HomeTown')";
         if($Gender=='Male')
       {       $_SESSION['img']='pictures/male.jpg';
    $query = "INSERT INTO users (FirstName, LastName, Email,Passwords,Gender,Birthdate,Nickname,User_Status,HomeTown,img,UserName,Aboutme) 
				  VALUES('$FirstName', '$LastName','$email', '$password_1','$Gender','$Birthdate','$NickName','$Status','$HomeTown','pictures/male.jpg','$UseName','$Aboutme')";
       }else
       {  $_SESSION['img']='pictures/female.jpg';
            $query = "INSERT INTO users (FirstName, LastName, Email,Passwords,Gender,Birthdate,Nickname,User_Status,HomeTown,img,UserName,Aboutme) 
				  VALUES('$FirstName', '$LastName','$email', '$password_1','$Gender','$Birthdate','$NickName','$Status','$HomeTown','pictures/female.jpg','$UseName','$Aboutme')";
       }
        mysqli_query($db, $query);
        $query1 = "SELECT User_ID FROM users WHERE Email='$email'";
        $result = mysqli_query($db, $query1);

        if (mysqli_num_rows($result) == 1) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {


                $_SESSION['ID'] = $row['User_ID'];
                  $_SESSION['MyID'] = $row['User_ID'];
                $IDU = $_SESSION['ID'];
                
            }
        }
        $_SESSION['Notf']=0;
          $_SESSION['ReqNotf']=0;

   $_SESSION['Mess']=0;
  
        $queryphone = "INSERT INTO userphone (User_ID,PhoneNumber,PhoneNumber2) Values($IDU,'$PhoneNo','$PhoneNo2')";
        $result2 = mysqli_query($db, $queryphone);
        header('location:Signup2.php');
    }
}


if (isset($_POST['Login_user'])) {

    $Email = mysqli_real_escape_string($db, $_POST['Email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password = md5($password);

    // form validation: ensure that the form is correctly filled
    if (empty($Email)) {
        array_push($errors, "Email is required");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors == 0)) 
        {

        $query = "SELECT * FROM users WHERE Email='$Email' AND Passwords='$password'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1)
            {
            while ($row0 = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $_SESSION['ID'] = $row0['User_ID'];

//                if ($row0['Nickname'] == NULL) {
//                    $_SESSION['username'] = $row0['FirstName'] . ' ' . $row0['LastName'];
//                   $_SESSION['username']=$row0['UerName'];
//                } else {
//                    $_SESSION['username'] = $row0['Nickname'];
//                } 
//                
                $_SESSION['username']=$row0['UserName'];
                $_SESSION['img']=$row0['img'];
                
            }
                 header('location:Profile.php'); 
                         $ID=$_SESSION['ID'];
    $count=0;
   
     $queryrequest2 = "SELECT * FROM ReqNotf WHERE To_ID=$ID  ";
     $counter=  mysqli_query($db,$queryrequest2 );
     $count=  mysqli_num_rows($counter);
     $_SESSION['ReqNotf']=$count ;
      $queryrequest21 = "SELECT * FROM notf WHERE To_ID=$ID  AND Status= 0 ";
     $counter2=  mysqli_query($db,$queryrequest21 );
     $count1=  mysqli_num_rows($counter2);
     $_SESSION['Notf']=$count1 ;
       $queryrequestmes = "SELECT * FROM messages WHERE To_ID=$ID  AND Status= 0 ";
     $countermes=  mysqli_query($db,$queryrequestmes );
     $countmes=  mysqli_num_rows($countermes);
     $_SESSION['Mess']=$countmes ;
     
}
        else {
            array_push($errors, "The Username or password is wrong");
        }
 
     
       
    }
   
     
     
}
if (isset($_POST['private']))
        { $value=$_POST['private'];
        $_SESSION['private']=$value;
        $_SESSION['flag']=1;
        }
        
if (isset($_POST['Share'])) {
    $Posts = mysqli_real_escape_string($db, $_POST['Posts']);
    $UserPostID = $_SESSION['ID'];
    $UserName=$_SESSION['username'];
    $us=$_SESSION['username'];
      
          $value=$_SESSION['private'];
          
              $Tomy=$_SESSION['ProfileID'];
                     
          
        
      if ( $_SESSION['flag']==1)
        {
        
          $queryp = "INSERT INTO posts(body, User_ID, Dateofpost,private,To_ID,PosterName)
				  VALUES('$Posts',$UserPostID,Now(),$value,$Tomy,'$us')";
           $_SESSION['flag']=0;
        }
else {
    

    $queryp = "INSERT INTO posts(body, User_ID, Dateofpost,To_ID,PosterName)
				  VALUES('$Posts',$UserPostID,Now(),$Tomy,'$us')";
}
    mysqli_query($db, $queryp);


     $querypos = "SELECT * FROM posts WHERE User_ID='$UserPostID' AND body='$Posts'";
        $result = mysqli_query($db, $querypos);
        if (mysqli_num_rows($result) == 1) {
            while ($row0 = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $_SESSION['Post_ID'] = $row0['Post_ID'];
            }
        }
      
    $file = $_FILES['file'];
    $filename = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
    $filetemp = $_FILES['file']['tmp_name'];
    $fileerror = $_FILES['file']['error'];
    $filetype = $_FILES['file']['type'];
    $fileext = explode('.', $filename);
    $fileactualext = strtolower(end($fileext));

    $allowed = array('jpeg', 'png', 'jpg', 'gif');
    if (in_array($fileactualext, $allowed)) {
        if ($fileerror === 0) 
            {
            if ($filesize < 1000000) 
                {
                $filenamenew = uniqid('', true) . "." . $fileactualext;
                $filedestination = 'postpictures/' . $filenamenew;
                move_uploaded_file($filetemp, $filedestination);
                $PID1 = $_SESSION['ID'];
                $PostID2= $_SESSION['Post_ID'];
          
                    $query4 = "UPDATE posts SET postimg = '" . $filedestination . "' WHERE Post_ID='$PostID2'  ";
                    $result4 = mysqli_query($db, $query4);
               
            } else
                {
               array_push($errors, "file too big");
            }
        } 
        else {
           array_push($errors, "there is an error uploading file");
        }
    }
    else 
        {
       array_push($errors,"you cant upload files of his type");
    }
       $pp=$_SESSION['ProfileID'];

       if (  $_SESSION['Mypage']==0)
{ $url="Profile.php?id=$pp";
  header("Location: ".$url);
}
else{
     header('location:Profile.php'); 
}
  
}
//if (isset($_post['Info']))
//{$PostID=$_SESSION['ID'];
//     $query1 = "SELECT ID FROM users WHERE User_ID=$PostID ";
//     
//        $result = mysqli_query($db, $query1);
//          if (mysqli_num_rows($result) == 1) {
//               while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
//        {    
//                   $_SESSION['FirstName']=$row0['FisrtName'];
//                $_SESSION['LastName']=$row0['LastName'];
//                 $_SESSION['Email']=$row0['Email'];
//                  $_SESSION['Gender']=$row0['Gender'];
//                   $_SESSION['Status']=$row0['Status'];
//         
//        }
//}
//}
if (isset($_POST['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['ID']);
     unset($_SESSION['PostID']);
      unset($_SESSION['FriendId']);
       unset($_SESSION['RequestID']);
        unset($_SESSION['ProfileID']);
        unset( $_SESSION['ReqNotf']);    unset($_SESSION['Notf']);
        unset($_SESSION['Mess']);
    //unset($_SESSION['Email']);
    //unset($_SESSION['Status']);
    //unset($_SESSION['Mypage']);
   // unset($_SESSION['Accepted']);
   // $_SESSION['ID'] = 0;
        $_SESSION['Notf']=0;
        $_SESSION['ReqNotf']=0;
        $_SESSION['Mess']=0;
        
    header('location:Signup.php');
}

if (isset($_POST['upload'])) {
    $file = $_FILES['file'];
    $filename = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
    $filetemp = $_FILES['file']['tmp_name'];
    $fileerror = $_FILES['file']['error'];
    $filetype = $_FILES['file']['type'];
    $fileext = explode('.', $filename);
    $fileactualext = strtolower(end($fileext));

    $allowed = array('jpeg', 'png', 'jpg', 'gif');
    if (in_array($fileactualext, $allowed)) {
        if ($fileerror === 0) {
            if ($filesize < 1000000) {
                $filenamenew = uniqid('', true) . "." . $fileactualext;
                $filedestination = 'pictures/' . $filenamenew;
                move_uploaded_file($filetemp, $filedestination);
                $PID1 = $_SESSION['ID'];

                $query4 = "UPDATE users SET img = '" . $filedestination . "' WHERE User_ID='$PID1' ";
                $result4 = mysqli_query($db, $query4);
            } else {
                echo "file too big";
            }
        } else {
            echo "there is an error uploading file";
        }
    } else {
        echo"you cant upload files of his type";
    }
}
//if (isset($_POST['searchbutton']))
//{
//    $output='';
//    $searchbar= mysqli_real_escape_string($db, $_POST['searchlabel']);
//  //echo $searchbar;
//    $querysearch="select * from users WHERE FirstName like '%$searchbar%' or LastName like '%$searchbar%' or Email like '%$searchbar%' or HomeTown like '%$searchbar%'"; 
//    $result6 = mysqli_query($db, $querysearch);
//     $querysearch1="select * from posts WHERE body like '%$searchbar%'";
//    $result7 = mysqli_query($db, $querysearch1);
//    if((mysqli_num_rows($result7)==0))
//        
//    {
//       echo'no posts found ';
//    }
//     else 
//    {
//          $count= mysqli_num_rows($result7);
//    $str2="results were found</br>";
//    echo $count. " ".$str2;
//        while($row = mysqli_fetch_array($result7, MYSQLI_ASSOC))
//        {
//          $uid=$row['User_ID'];
//           $querypostedby="select * from users WHERE User_ID=$uid ";
//             $result8 = mysqli_query($db, $querypostedby);
//            while($rows = mysqli_fetch_array($result8, MYSQLI_ASSOC))
//        {
//                echo "<a href='Profile.php?id=$rows[User_ID]'>".$rows['FirstName']. ' '.$rows['LastName']. " </a> </br>";
//                
//            }
//          //  echo  '<h2> '.$row['FirstName'].'  '.$row['LastName'].'</h2>';
//           // echo   ' <a href="profle.php?id=   ' .$row['FirstName'].">  '<h2> '.$row['FirstName'].' '.$row['LastName'].'</h2></a>;
//           // echo "fih posts" ."</br/>";  
//             {  
//       // echo "<a href='Profile.php?id=$row[User_ID]'>".$row['FirstName']. ' '.$row['LastName']. " </a> </br>";
//            $image2 = $row['postimg'];
//       if ($image2!=NULL)
//       {
//             echo "<img src='$image2' width=250 height=200 > ";
//    echo "<br>";
//       }
//  echo "posted at :";
//          echo $row['Dateofpost']."</br/>";
//          echo $row['body'] ."<hr/> </br/>";  
//                 
//          }
//            
//           
//            }
//     }
//    
//    if((mysqli_num_rows($result6)==0))
//        
//    {
//       echo'no results found as a user';
//    }
//    else 
//    {
//          $count= mysqli_num_rows($result6);
//    $str2="results were found</br>";
//    echo $count. " ".$str2;
//        while($row = mysqli_fetch_array($result6, MYSQLI_ASSOC))
//        {
//          
//          //  echo  '<h2> '.$row['FirstName'].'  '.$row['LastName'].'</h2>';
//           // echo   ' <a href="profle.php?id=   ' .$row['FirstName'].">  '<h2> '.$row['FirstName'].' '.$row['LastName'].'</h2></a>;
//            echo "<a href='Profile.php?id=$row[User_ID]'>".$row['FirstName']. ' '.$row['LastName']. " </a> </br>";  
//            
//           
//               
//        }
//    }
//    
//   
//}

if (isset($_POST['AddFriend'])) 
    {
   // $URL=$_SERVER['QUERY_STRING'];
   // parse_url('$URL',PHP_URL_QUERY);
     // $PID= $_GET['id'];
      $UserID=$_SESSION['ID'];
      $FriendID = $_SESSION['FriendId']; 
      $pp= $_SESSION['ProfileID'] ;
    
//   
$queryss = "INSERT INTO requests (To_ID,From_ID) VALUES ($FriendID,$UserID )";
$queryss2 = "INSERT INTO ReqNotf (To_ID,From_ID) VALUES ($FriendID,$UserID )";
        $queryN="INSERT INTO notf (User_ID,To_ID,NotfBody,Date) VALUES ($UserID,$pp, ' ADDED You As a Friends',Now())";
              $resultpyp = mysqli_query($db, $queryN);
               //$_SESSION['Notf']=++$_SESSION['Notf'];
 $result6 = mysqli_query($db,$queryss);
 $result67 = mysqli_query($db,$queryss2);
       if (  $_SESSION['Mypage']==0)
{ $url="Profile.php?id=$pp";
  header("Location: ".$url);
}
else{
     header('location:Profile.php'); 
}

  }
  if (isset($_POST['Accepted']))
  { 
         $RequestID= mysqli_real_escape_string($db,$_POST['Request_id']);
                $queryre = "UPDATE requests SET Accepted=1 WHERE Request_ID = $RequestID ";
                $resultre = mysqli_query($db, $queryre);
            
       
 // $req=$_SESSION['RequestID'];                  
                 
  }
  if (isset($_POST['Ignore'])) 
    {//$req=$_SESSION['RequestID'];
        $RequestID= mysqli_real_escape_string($db,$_POST['Request_id']);
         $querydel = "Delete From requests  WHERE Request_ID = $RequestID";
                $resultdel = mysqli_query($db, $querydel);
  }
  
  
  
  
  if (isset($_POST['UploadChange'])) {
    $file = $_FILES['fileChange'];
    $filename = $_FILES['fileChange']['name'];
    $filesize = $_FILES['fileChange']['size'];
    $filetemp = $_FILES['fileChange']['tmp_name'];
    $fileerror = $_FILES['fileChange']['error'];
    $filetype = $_FILES['fileChange']['type'];
    $fileext = explode('.', $filename);
    $fileactualext = strtolower(end($fileext));

    $allowed = array('jpeg', 'png', 'jpg', 'gif');
    if (in_array($fileactualext, $allowed)) {
        if ($fileerror === 0) {
            if ($filesize < 1000000) {
                $filenamenew = uniqid('', true) . "." . $fileactualext;
                $filedestination = 'pictures/' . $filenamenew;
                move_uploaded_file($filetemp, $filedestination);
                $PID1 = $_SESSION['ID'];
                $uname=$_SESSION['username'];

                $query4 = "UPDATE users SET img = '" . $filedestination . "' WHERE User_ID='$PID1' ";
                $result4 = mysqli_query($db, $query4);
                $b=  $uname.' '.'changed Profile Picture';
                $querychange="INSERT INTO posts (body,User_ID,PosterName,private,Dateofpost,postimg) VALUES ('$b',$PID1,'$uname',1,Now() ,'$filedestination')";
              $resultchange = mysqli_query($db, $querychange);
                
                 $_SESSION['img']=$filedestination ;
                  header('location:Profile.php');
                
            } else {
                echo "file too big";
            }
        } else {
            echo "there is an error uploading file";
        }
    } else {
        echo"you cant upload files of his type";
    }
}

    if (isset($_POST['Comment'])  )
    {  $Comments = mysqli_real_escape_string($db, $_POST['comments']);
       // $postsid=$_SESSION['PostID'];
    $postsid= mysqli_real_escape_string($db,$_POST['post_id']);
  
        $IDc=$_SESSION['ProfileID'];
        $ID=$_SESSION['ID'];
         $pp=$_SESSION['ProfileID'];
   $queryp="INSERT INTO comments (From_ID,To_ID,body,post_ID,Date) VALUES ($ID,$IDc,'$Comments',$postsid,Now())";
              $resultpy = mysqli_query($db, $queryp);
           if ($IDc!=$ID)
           {
                $queryNot="INSERT INTO notf (User_ID,To_ID,NotfBody,Date,Post_ID) VALUES ($ID,$IDc, ' Commented in your posts',Now(),$postsid)";
              $resultpy = mysqli_query($db, $queryNot);   
           }
            
                    // $_SESSION['Notf']=++$_SESSION['Notf'];
        if (  $_SESSION['Mypage']==0)
{ $url="Profile.php?id=$pp";
  header("Location: ".$url);
}
else{
     header('location:Profile.php'); 
}
       
    }
    if (isset($_POST['unfriend']))
{
    
    $UserID1=$_SESSION['ID'];
    $pp=$_SESSION['ProfileID'];
      $FriendID1 = $_SESSION['FriendId']; 
   // echo $FriendID1;
    //echo $UserID1;
   $queryunfriend = "DELETE from requests WHERE ((To_ID=$UserID1 AND From_ID=$FriendID1)or(To_ID=$FriendID1&& From_ID='$UserID1'))";
     $resultun = mysqli_query($db, $queryunfriend);
     $url="Profile.php?id=$pp";
  header("Location: ".$url);
    
    
    
}
    if (isset($_POST['delete']))
    { //$comID=$_POST['Comm_id'];
      $comID= mysqli_real_escape_string($db,$_POST['Comm_id']);
       $querydel = "DELETE from comments WHERE  (comment_ID=$comID)";
    $resultdel = mysqli_query($db, $querydel);
    
    }
    if (isset($_POST['send']))
{
    $MSG = mysqli_real_escape_string($db, $_POST['messages1']);
    $UserID=$_SESSION['ID'];
     // $FriendID = $_SESSION['FriendId']; 
        $pp=$_SESSION['ProfileID'];
//   
$queryss = "INSERT INTO messages (To_ID,From_ID,body,Date1) VALUES ($pp,$UserID,'$MSG',NOW())";

 $result6 = mysqli_query($db,$queryss);
  $url="Profile.php?id=$pp";
  header("Location: ".$url);

}
  if (isset($_POST['deletepost']))
    { $postID=$_POST['post_id'];
    
    
     
      $querydel12 = "DELETE from comments WHERE Post_ID=$postID";
    $resultdel12 = mysqli_query($db, $querydel12);
 $querydel1 = "DELETE from posts WHERE Post_ID=$postID";
    $resultdel1 = mysqli_query($db, $querydel1);
          if (  $_SESSION['Mypage']==0)
{ $url="Profile.php?id=$pp";
  header("Location: ".$url);
}
else{
     header('location:Profile.php'); 
}
  }  
  
  
  
  
  
  
  
  
  
   if (isset($_POST['like']))
      {  
     
   $postsid1=mysqli_real_escape_string($db, $_POST['varname']);

        $IDc1=$_SESSION['ID'];
        $ID= $_SESSION['ProfileID'];
         $querylike = "SELECT * FROM posts WHERE Post_ID=$postsid1";
        $results = mysqli_query($db, $querylike);
        if (mysqli_num_rows($results) >0) {
             
            while ($row0 = mysqli_fetch_array($results, MYSQLI_ASSOC))
            {
            $likesno = $row0['likesno'];
                $likesno++;
            $querysc2 = "UPDATE posts set likesno=$likesno WHERE Post_ID=$postsid1" ;
            $resultc = mysqli_query($db,$querysc2);
            $querylikedby= "INSERT INTO likedby (Post_ID,User_ID) VALUES ($postsid1,$IDc1)";
             $resultc1 = mysqli_query($db,$querylikedby);
             
             
    $queryNot="INSERT INTO notf (User_ID,To_ID,NotfBody,Date,Post_ID) VALUES ($ID,$IDc1, ' Commentedsssssss in your posts',Now(),$postsid)";
              $resultpy = mysqli_query($db, $queryNot);   
             
             
             
             
             
             
        }
    
     }
        
     }
 if (isset($_POST['unlike']))
      {  
  
       $postsid1=mysqli_real_escape_string($db, $_POST['varname']);
        $IDc1=$_SESSION['ID'];
         $querylike = "SELECT * FROM posts WHERE Post_ID=$postsid1";
        $results = mysqli_query($db, $querylike);
        
     if(mysqli_num_rows($results) > 0) {
         
            while ($row0 = mysqli_fetch_array($results, MYSQLI_ASSOC))
            {
               $likesno = $row0['likesno'];
                $likesno--;
                
      $querysc3 ="UPDATE posts set likesno=$likesno WHERE Post_ID=$postsid1" ;
                
                $resultc2 = mysqli_query($db,$querysc3);
               $queryunlike=  "DELETE from likedby WHERE Post_ID=$postsid1 and User_ID=$IDc1";
                 $resultc3 = mysqli_query($db,$queryunlike);
                
            }
     }
 
        
     }
?>