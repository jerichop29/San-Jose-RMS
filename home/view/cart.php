<?php

    if (isset($_GET["cart"])) {?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="login-box-body">    
                 
                <?php get_reserve($con, $_SESSION["user_id"], $_SESSION["trans_no"]);?>
             
                </table>

            </div>
        </div>

        <div class="col-md-2">
            
        </div>
    </div>

</section>

<?php }?>

<?php

    if (isset($_GET["payment-success"])) {?>
<!-- Main content -->
<section class="content">
        <br>
        <br>
        <br>
    <div class="row">
        <div class="col-md-4">

        </div>

        <div class="col-md-4">
            <div class="login-box-body">    
                <center>
                    <h3><img src="image/check.png" alt=""> Payment Successfuly</h3>
                </center>
            </div>
        </div>

        <div class="col-md-4">
            
        </div>
    </div>
</section>

<?php }?>