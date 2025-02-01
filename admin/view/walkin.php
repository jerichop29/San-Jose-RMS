<?php

if (isset($_GET["walkin"])) {?>

<section class="content-header">

    <h1>

        <a href="?staff-cart">Staff cart</a>

    </h1>

    <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Walk in</li>

    </ol>

</section>


<!-- Main content -->

<section class="content container-fluid">

    <div class="box box-default">

        <div class="box-header with-border">

            <h3 class="box-title">Walk In Reservation</h3>

        </div>
        <div class="box-body-res">
            <form id="check-avail-form">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name (Optional)">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Date of Reservation</label>
                                <input type="date" class="form-control" name="date-res" min="<?php echo date("Y-m-d"); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Time</label>
                                <select class="form-control" name="timeSlot">
                                    <option value="Day (7am to 6pm)">Day (7am to 6pm)</option>
                                    <option value="Night (7pm to 6am)">Night (7pm to 6am)</option>
                                </select>
                            </div>
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Type</label>
                                <select class="form-control" name="category">
                                    <option value="Cottage">Cottage</option>
                                    <option value="Room">Room</option>
                                </select>
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Children</label>
                                <input type="number" value="1" min="0" class="form-control" name="cd">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Adult</label>
                                <input type="number" value="1" min="0" class="form-control" name="at">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label style="padding-top: 40px;"></label>
                                <input type="button" class="mt btn btn-success btn-md btn-check" value="Check Availability">
                            </div>
                        </div>

                    </div>

            </form>

            <!-- SHOW VACANT COTTAGE/HALL -->
            <div class="p-absolute-reserve-result res">
                
            </div>

        </div>

   

</section>

<?php } ?>


<?php

if (isset($_GET["staff-cart"])) { ?>
    
    <section class="content-header">

    <h1>

        <a href="?walkin">Back</a>

    </h1>

    <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Walk in</li>

    </ol>

</section>

<!-- Main content -->

<section class="content container-fluid">

    <div class="box box-default">

        <div class="box-header with-border">

            <h3 class="box-title">Staff Cart</h3>

        </div>

        <div class="box-body-res">
            
            <?php get_reserve($con, $_SESSION["staff_id"], $_SESSION["staff_trans_no"]);?>
             
            </table>

        </div>

   

</section>

<?php } ?>

