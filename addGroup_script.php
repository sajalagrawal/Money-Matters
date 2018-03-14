<?php
    require 'connection.php';
    session_start();
    $grpname= mysqli_real_escape_string($con,$_POST['groupname']);
    $noofmem=$_POST['num'];
    $uid=$_SESSION['id'];
    $grp_query="insert into groups(uid,gname,noofmem) values('$uid','$grpname','$noofmem')";
    $grp_result=mysqli_query($con,$grp_query) or die(mysqli_error($con));
    if($noofmem==0){
        echo "A grp cant have 0 members";
        ?>
        <meta http-equiv="refresh" content="3;url=addGroup.php" />
        <?php
    }
    $getgrpid="select gid from groups where gname='$grpname' and uid='$uid'";
    $getgrp_result=mysqli_query($con,$getgrpid) or die(mysqli_error($con));
    $row=mysqli_fetch_array($getgrp_result);
    $gid=$row['gid'];
    if($noofmem>0){
        $uname_query="select name from users where id='$uid'";
        $uname_result=mysqli_query($con,$uname_query) or die(mysqli_error($con));
        $row=mysqli_fetch_array($uname_result);
        $uname=$row['name'];
        $mem_query="insert into grpmembers(gid,mname,inorder) values('$gid','$uname',1)";
        $mem_result=mysqli_query($con,$mem_query) or die(mysqli_error($con));
    }
    if($noofmem>1){
        $member2=mysqli_real_escape_string($con,$_POST['member2']);
        $mem_query="insert into grpmembers(gid,mname,inorder) values('$gid','$member2',2)";
        $mem_result=mysqli_query($con,$mem_query) or die(mysqli_error($con));
    }
    if($noofmem>2){
        $member3=mysqli_real_escape_string($con,$_POST['member3']);
        $mem_query="insert into grpmembers(gid,mname,inorder) values('$gid','$member3',3)";
        $mem_result=mysqli_query($con,$mem_query) or die(mysqli_error($con));
    }
    if($noofmem>3){
        $member4=mysqli_real_escape_string($con,$_POST['member4']);
        $mem_query="insert into grpmembers(gid,mname,inorder) values('$gid','$member4',4)";
        $mem_result=mysqli_query($con,$mem_query) or die(mysqli_error($con));
    }
    if($noofmem>4){
        $member5=mysqli_real_escape_string($con,$_POST['member5']);
        $mem_query="insert into grpmembers(gid,mname,inorder) values('$gid','$member5',5)";
        $mem_result=mysqli_query($con,$mem_query) or die(mysqli_error($con));
    }
    echo "Group successfully created!";
    ?>
    <meta http-equiv="refresh" content="1;url=dashboard.php" />
    <?php
?>