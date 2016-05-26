
<html>
<body>
<?php

//$tmp_dir = ini_get('upload_tmp_dir') ? ini_get('upload_tmp_dir') : sys_get_temp_dir();
//die($tmp_dir);



if(isset($_POST["MM_upload"])){


  /*$hostname_localhost = "127.0.0.1";
  $database_localhost = "sakila";
  $username_localhost = "web";
  $password_localhost = "TecInf178239";

  $localhost =new PDO("mysql:host=$hostname_localhost;dbname=$database_localhost;",$username_localhost,$password_localhost);

  $Result=$localhost->prepare($sql);

  $Result->execute($updateSQL);

  $numfields = $Result->columnCount();*/


  //$localhost = mysql_pconnect($hostname_localhost, $username_localhost, $password_localhost) or trigger_error(mysql_error(),E_USER_ERROR); 

  //mysql_select_db($database_localhost, $localhost);
  //$Result1 = mysql_query($updateSQL, $localhost);

  $allowedExts = array("gif", "jpeg", "jpg", "png","JPG");
  $temp = explode(".", $_FILES["file"]["name"]);
  $extension = end($temp);
  if ((($_FILES["file"]["type"] == "image/gif")
  || ($_FILES["file"]["type"] == "image/jpeg")
  || ($_FILES["file"]["type"] == "image/jpg")
  || ($_FILES["file"]["type"] == "image/pjpeg")
  || ($_FILES["file"]["type"] == "image/x-png")
  || ($_FILES["file"]["type"] == "image/png"))
  //&& ($_FILES["file"]["size"] < 200000)
  && in_array($extension, $allowedExts))
    {
      if ($_FILES["file"]["error"] > 0)
      {
      echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
      }
      else
      {
        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        echo "Type: " . $_FILES["file"]["type"] . "<br>";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

        if (file_exists("uploads/" . $_FILES["file"]["name"]))
          {
          echo $_FILES["file"]["name"] . " already exists. ";
          }
        else
        {
        move_uploaded_file($_FILES["file"]["tmp_name"],
        "uploads/" . $_FILES["file"]["name"]);
        echo "Stored in: " . "uploads/" . $_FILES["file"]["name"];
        }
      }
  }
  else
  {
    echo "Invalid file";
  }
}
?> 

<form action="index.php" method="POST" enctype="multipart/form-data">
  <label for="file">Filename:</label>
  <input type="file" name="file" id="file"><br>
  <input type="hidden" name="MM_upload" id="MM_upload">
  <input type="submit" name="submit" value="Submit">
</form>

</body>
</html> 