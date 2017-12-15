<?php include ('Server.php');
?>

<html>
    <head>
        <title>Inffo</title>
        <link rel="stylesheet" type="text/css" href="Style1.css">
    </head>
    <body>

                                <?php
                                 
                                   
                                 $PostID1=$_SESSION['ID'];
                                 echo 'IDDDDDD';
                                 echo  $PostID1;
                             
                                 
     $query1 = "SELECT * FROM users WHERE User_ID=$PostID1 ";
          $result = mysqli_query($db, $query1);
                                    ?>
                                    
        
              <?php

                       if (mysqli_num_rows($result) >0) {
               while ($row = mysqli_fetch_array($result,   MYSQLI_ASSOC))
        {    
                   ?>
        <div>    
            <div>    <label> First Name     </label>
                <label><?php echo $row['FirstName']; ?> </label></div>
            
            
            
            <div>    <label>Last Name    </label>

                        <label><?php echo $row['LastName']; ?></label></div>
                    <div>     <label>Email    </label>

                        <label><?php echo $row['Email']; ?></label></div>
                    <div>     <label> Gender    </label>

                        <label><?php echo $row['Gender']; ?></label></div>
                    <div>    <label> Status     </label>

                        <label><?php echo $row['User_Status']; ?></label></div>
                    <div>     <label> HomeTown    </label>

                        <label><?php echo $row['HomeTown']; ?></label></div>


                    <div>       <label> About Me   </label>

                        <label><?php echo $row['Aboutme']; ?></label></div>

</div>
                <?php

                }
                }
                 ?>
        <form action="Profile.php">
             <div class="input-group">
			<button type="submit" class="btn" name="Back">Back</button>
		</div>
        </form>
       

    </body>
