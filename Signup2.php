<?php include('server.php') ?>
<html>
<head>
	<title>Sign Up</title>
		<link rel="stylesheet" type="text/css" href="Style2.css">

</head>
<body>
		
	
    <form method="post" action="Profile.php" enctype="multipart/form-data" class="content">
       
                        <div class="input-group">
                        <h2>GETTING STARTED</h2>
    <label>Upload your profile picture now!</label>
			<div class="imgcontainer">
    <img src="uploadimg.jpg" alt="Avatar" class="avatar">
    <input type='file' name='file' id="fileToUpload">
    <input type="submit" value="Upload" name="upload">
    <a href="Profile.php">Skip</a>

                        </div>
                    
                    
    
                </form>
    
</body>