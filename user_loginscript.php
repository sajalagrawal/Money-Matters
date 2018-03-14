<?php
    require 'connection.php';
    session_start();

    $email= mysqli_real_escape_string($con,$_POST['email']);
    $password=md5(md5(mysqli_real_escape_string($con,$_POST['password'])));
    $query= "select id,email from users where email='$email' and password='$password'"; 
    $res=mysqli_query($con,$query);
    $rows_fetched=mysqli_num_rows($res);
    //echo $res;
      if($rows_fetched==0){
        ?>
        <script>
            window.alert("wrong username or password");
        </script>
        <?php 
            echo "Redirecting you back to home page...";
        ?>
        <meta http-equiv="refresh" content="1;url=index.php" />
        <?php
      }else{
          $row=mysqli_fetch_array($res);
          $_SESSION['email']=$email;
          $_SESSION['id']=$row['id'];
          header('location:dashboard.php');
      }

?>