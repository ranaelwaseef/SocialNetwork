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
    $Birthdate = date("Y-m-d",strtotime($Birthdate));
    $password_1 = md5($password_1);
    $password_2 = md5($password_2);
     $NickName = mysqli_real_escape_string($db, $_POST['NickName']);
        $Status = mysqli_real_escape_string($db, $_POST['Status']);
           $HomeTown = mysqli_real_escape_string($db, $_POST['HomeTown']);
              $Aboutme = mysqli_real_escape_string($db, $_POST['Aboutme']);
            
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
if ($Gender==NULL) {
        array_push($errors, "Gender is required");
    }
      $query0= "SELECT * FROM users WHERE Email='$email'";
        $result12 = mysqli_query($db, $query0);
        if (mysqli_num_rows($result12)==1 ) 
            {
            array_push($errors, "Email is  Already exists ");
        }
        
        if ($NickName!=NULL)
        {
            $_SESSION['username']=$NickName;
        }
        else 
        {
            $_SESSION['username']=$FirstName .' '.$LastName;
        }
        
   if (count($errors) == 0)
   {
    $query = "INSERT INTO users (FirstName, LastName, Email,Passwords,Gender,Birthdate,Nickname,User_Status,HomeTown,Aboutme) 
				  VALUES('$FirstName', '$LastName','$email', '$password_1','$Gender','$Birthdate','$NickName','$Status','$HomeTown','$Aboutme')";
    mysqli_query($db, $query);
        $query1 = "SELECT ID FROM users WHERE Email='$email'";
        $result = mysqli_query($db, $query1);
          if (mysqli_num_rows($result) == 1) {
               while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {  
                   
               
            $_SESSION['ID'] = $row['User_ID'];
        }
          }
          header('location:Signup2.php');
}

}


if (isset($_POST['Login_user'])) {
    $Email = mysqli_real_escape_string($db, $_POST['Email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password=  md5($password);

    // form validation: ensure that the form is correctly filled
    if (empty($Email)) {
        array_push($errors, "Email is required");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors == 0)) {

        $query = "SELECT * FROM users WHERE Email='$Email' AND Passwords='$password'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1) {
             while ($row0 = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {  
            $_SESSION['ID'] = $row0['User_ID'];
            
            if ($row0['Nickname']==NULL)
            {
                  $_SESSION['username']=$row0['FirstName'] .' '.$row0['LastName'];
            } else 
            {
              $_SESSION['username']=$row0['Nickname'];   
            }
         
        }
        }
        else {
            array_push($errors, "The Username or password is wrong");
        }
        header('location:Profile.php');
    }
}

if (isset($_POST['Share']))
{    $Posts = mysqli_real_escape_string($db, $_POST['Posts']);
$PostID=$_SESSION['ID'];
     $queryp = "INSERT INTO posts(Post, User_ID, Dateofpost)
				  VALUES('$Posts',$PostID,NOW())";
      mysqli_query($db, $queryp);
  header('location:Profile.php');
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
      if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['ID']);
     unset( $_SESSION['Gender']);
          unset(    $_SESSION['Email']);
          unset($_SESSION['Status']);
          $_SESSION['ID']=0;
    header('location:Profile.php');
}

      if(isset($_POST['upload']))
    
{
    $file=$_FILES['file'];
    $filename =$_FILES['file']['name'];
        $filesize=$_FILES['file']['size'];
        $filetemp=$_FILES['file']['tmp_name'];
    $fileerror=$_FILES['file']['error'];
    $filetype=$_FILES['file']['type'];
    $fileext=explode('.',$filename);
    $fileactualext=strtolower(end($fileext));
    
       $allowed=array('jpeg','png','jpg','gif');
    if(in_array($fileactualext,$allowed))
    {
        if($fileerror===0)
        {
            if($filesize<1000000)
            {
               $filenamenew=uniqid('',true).".".$fileactualext;
                $filedestination='pictures/'.$filenamenew;
                move_uploaded_file($filetemp,$filedestination);
                //header("location")
                // $query1 = "INSERT INTO users (img) 
				  //VALUES('".$filedestination."')";
   // mysqli_query($db, $query1);
    
            }
            else
            {
                echo "file too big";
            }
        }
        else
        {
            echo "there is an error uploading file";
        }
        
    }
    else
    {
        echo"you cant upload files of his type";
    }
        
      
         
}

?>