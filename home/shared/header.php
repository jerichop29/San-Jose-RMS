<header class="main-header">
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">
                    <b>&nbsp;San Jose</b>
                    <p style="font-size:10px;">Resort & Event Center</p>
                </a> <!--<b>San Jose</b>-->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <img src="image/menu.png" alt="">
                </button>
            </div>

            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li id="home"><a class="text-white" href="?home">Home</a></li>
                    <li id="home"><a class="text-white" href="?gallery">Gallery</a></li>
                    <?php 

                        if (isset($_SESSION['username'])) { ?>
                            
                        <li id="reserve"><a class="text-white" href="?reservation">Reservation</a></li>
                    
                    <?php } ?>  
                </ul>
            </div>

            <div class="navbar-custom-menu">
                <?php 

                    if (isset($_SESSION['username'])) { ?>
                        
                <ul class="nav navbar-nav">
                    <li id="cart" class="dropdown tasks-menu">
                        <a href="?cart" class="dropdown-toggle">
                            <img src="image/cart.png" alt="">
                            <span class="label label-danger"><?php get_count($con, $_SESSION["user_id"], $_SESSION["trans_no"])?></span>
                        </a>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="image/user-empty.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs text-white">Welcome, <?php echo $_SESSION["username"]?></span>
                        </a>
                        <ul class="dropdown-menu" id="dropdown-width" width="150px">
                            <li><a href="?my-res">My Reservation</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal-feedback2">Give Feedback</a></li>
                            <li class="divider"></li>
                            <li><a href="function/logout.php">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
    </nav>
</header>