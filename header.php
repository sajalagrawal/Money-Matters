<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar"> 
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand" style="font-size:24px;">MoneyMatters</a>
        </div>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php 
                if(!isset($_SESSION['email'])){
                ?>
                <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                
                <?php                            
                }else{
                ?>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
                <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                
                <?php 
                }
                ?>  
            </ul>
        </div>
    </div>
</nav>