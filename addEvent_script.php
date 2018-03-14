<?php
    require 'connection.php';
    session_start();
    $ename=mysqli_real_escape_string($con,$_POST['ename']);
    $gid=$_GET['gid'];
    $make_event="insert into event(gid,ename) values ('$gid','$ename')";
    $make_event_result=mysqli_query($con,$make_event) or die(mysqli_error($con));
    $geteid="select eid from event where gid='$gid' and ename='$ename'";
    $geteid_result=mysqli_query($con,$geteid) or die(mysqli_error($con));
    $row1=mysqli_fetch_array($geteid_result);
    $eid=$row1['eid'];
    $noofmem=$_GET['noofmem'];
    //echo "noofmem=".$noofmem;
    if($noofmem>0){
        $mem1=mysqli_real_escape_string($con,$_POST['mem1']);
        //echo "mem=".$mem1;
        $share1=mysqli_real_escape_string($con,$_POST['share1']);
        //echo "share=".$share1;
        $makeentry="insert into eventexpense values('$eid','$mem1','$share1')";
        $makeentry_result=mysqli_query($con,$makeentry) or die(mysqli_error($con));
    }
    if($noofmem>1){
        $mem2=mysqli_real_escape_string($con,$_POST['mem2']);
        //echo "mem=".$mem2;
        $share2=mysqli_real_escape_string($con,$_POST['share2']);
        //echo "share=".$share2;
        $makeentry="insert into eventexpense values('$eid','$mem2','$share2')";
        $makeentry_result=mysqli_query($con,$makeentry) or die(mysqli_error($con));
    }
    if($noofmem>2){
        $mem3=mysqli_real_escape_string($con,$_POST['mem3']);
        //echo "mem=".$mem3;
        $share3=mysqli_real_escape_string($con,$_POST['share3']);
        //echo "share=".$share3;
        $makeentry="insert into eventexpense values('$eid','$mem3','$share3')";
        $makeentry_result=mysqli_query($con,$makeentry) or die(mysqli_error($con));
    }
    if($noofmem>3){
        $mem4=mysqli_real_escape_string($con,$_POST['mem4']);
        //echo "mem=".$mem4;
        $share4=mysqli_real_escape_string($con,$_POST['share4']);
        // echo "share=".$share4;
        $makeentry="insert into eventexpense values('$eid','$mem4','$share4')";
        $makeentry_result=mysqli_query($con,$makeentry) or die(mysqli_error($con));
    }
    if($noofmem>4){
        $mem5=mysqli_real_escape_string($con,$_POST['mem5']);
        //echo "mem=".$mem5;
        $share5=mysqli_real_escape_string($con,$_POST['share5']);
        //echo "share=".$share5;
        $makeentry="insert into eventexpense values('$eid','$mem5','$share5')";
        $makeentry_result=mysqli_query($con,$makeentry) or die(mysqli_error($con));
    }
    echo "event added successfully!";
    
    $url="eventDetails.php?eid=".$eid;
    ?>
    <meta http-equiv="refresh" content="1;url=<?php echo $url; ?>" />;
    <?php
?>