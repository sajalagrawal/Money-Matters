<?php
    require 'connection.php';
    session_start();
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=md5(md5(mysqli_real_escape_string($con,$_POST['password'])));
    $duplicate_user_query="select id from users where email='$email'";
    $duplicate_user_query_result=mysqli_query($con,$duplicate_user_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($duplicate_user_query_result);
    if($rows_fetched>0){
        ?>
        <script>
            window.alert("This Email id already exists in our database!");
        </script>
        <meta http-equiv="refresh" content="0;url=index.php" />
        <?php
    }else{
        $user_registration_query="insert into users(name,email,password) values('$name','$email','$password')";
        $user_registration_result=mysqli_query($con,$user_registration_query) or die(mysqli_error($con));
        $_SESSION['email']=$email;
        $_SESSION['id']=mysqli_insert_id($con);
        echo "User successfully registered. Redirecting you to your dashboard...";
        ?>
        <meta http-equiv="refresh" content="1;url=dashboard.php" />
        <?php
    }
?>