<?php
    if (isset($_GET["home"])) {?>
<section>
    <!-- Sliding background Image Area -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li  data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li  data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <div class="layer-color"></div>
                <img src="image/intro1.jpg" alt="First Slide" width="100%" style="height: 100vh;">
            </div>
            <div class="item">
                <div class="layer-color"></div>
                <img src="image/intro3.jpg" alt="Second Slide" width="100%" style="height: 100vh;">
            </div>
            <div class="item">
                <div class="layer-color"></div>
                <img src="image/intro.jpg" alt="Third Slide" width="100%" style="height: 100vh;">
            </div>
        </div>
    </div>
    <!-- Log in Area -->
    <?php
        if(!isset($_SESSION["username"])){?>
    <div class="login-box-body p-absolute-login">
        <p class="login-box-msg">Make your reservation now!</p>
        <form action="function/login.php" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control input-lg" placeholder="Enter Username" name="username" required autofocus>
                <img class="form-control-feedback" src="image/user.png" alt="">
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control input-lg" placeholder="Enter Password" name="password" required>
                <img class="form-control-feedback" src="image/lock.png" alt="">
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-block btn-flat btn-lg" name="btnlogin">Log In</button>
                <button type="button" data-toggle="modal" data-target="#modal-registration" class="btn btn-success btn-block btn-flat btn-lg">Create Account</button>
            </div>
        </form>
        <?php }?>
    </div>
    <!-- Home intro Area  -->
    <div class="system-title p-absulute-system-title">
        <span class="text-white txt1">San Jose Resort and Event Center</span><br><br>
        <span class="text-white txt2"><span class="colr">ONLINE</span> RESERVATION</span><br>
        <div class="letter">
            <span class="text-white txt3">Discover a True Paradise: Where Dreams Meet Reality! Indulge in Luxurious Accommodations, Exquisite Dining, and Unparalleled Events. Book Your Perfect Escape Today and Create Cherished Memories That Last a Lifetime!</span> 
        </div>
    </div>

    <div class="modal fade in" id="modal-registration">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction()">x</button>
                    <script> function myFunction() { document.getElementById("myForm").reset(); } </script>
                    <h3 class="modal-title">Registration</h3>
                </div>
                <div class="modal-body">
                    <form action="function/function_crud.php" id="myForm" method="post">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control input-lg" placeholder="First Name" name="fname" autofocus required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control input-lg" placeholder="Last Name" name="lname" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="number" class="form-control input-lg" placeholder="Contact no." name="contact" required>
                            <img class="form-control-feedback" src="image/phone.png" alt="">
                        </div>
                        <div class="form-group has-feedback">
                            <textarea class="form-control input-lg" rows="3" placeholder="Address" name="address"></textarea>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control input-lg" placeholder="Username" name="username" required>
                            <img class="form-control-feedback" src="image/user.png" alt="">
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control input-lg" placeholder="Password" name="password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required>
                            <img class="form-control-feedback" src="image/lock.png" alt="">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-flat btn-lg" name="btn-reg">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Area -->
<section>
    <br>
    <center><h3>Amenities</h3></center>
    <br>
    <div class="container">
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php get_feature($con) ?>
            </div>
            <br><br>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<!-- Feedbacks Area -->
<section>
    <br>
    <center><h3>Feedbacks</h3></center>
    <br>
    <div class="container">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php get_feedbacks($con) ?>
            </div>
            <br><br>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <br><br>
</section>
<?php }?>