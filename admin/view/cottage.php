<!-- COTTAGE/HALL PAGE -->

<?php

 if (isset($_GET["cottage"])) {?>

     <section class="content-header">

    <h1>

        Cottage/Hall

    </h1>

    <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Cottage/Hall</li>

    </ol>

</section>



<!-- Main content -->

<section class="content container-fluid">



<div class="box box-default">

            <div class="box-header with-border">

              <h3 class="box-title"><a href="?cottage-add" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;New Cottage/Hall</a></h3>

            </div>

              <div class="box-body">

                <table id="example2" class="table table-bordered">

                    <thead>

                    <tr>

                        <th>#</th>

                        <th>Image</th>

                        <th>Cottage No.</th>

                        <th>Name</th>

                        <th>Category</th>

                        <th>Type</th>

                        <th>Max Person</th>

                        <th>Price</th>

                        <th><i class="fa fa-cogs"></i></th>

                    </tr>

                    </thead>

                    <?php get_cottage($con);?>

                </table>

              </div>

          </div>



</section>

 <?php }

?>





<!-- COTTAGE/HALL ADD FORM -->

<?php

 if (isset($_GET["cottage-add"])) {?>

     <section class="content-header">

    <h1>

        <a href="?cottage">Back</a>

    </h1>

    <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Add Cottage/hall</li>

    </ol>

</section>



<!-- Main content -->

<section class="content container-fluid">



<div class="box box-default">

            <div class="box-header with-border">

              <h3 class="box-title">Add Cottage/Hall</h3>

            </div>

            <form action="function/function_crud.php" method="post" enctype="multipart/form-data" class="form-horizontal">

              <div class="box-body">

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Upload Image</label>

                            <div class="col-sm-8">

                                <input type="file" accept=".jpg,.jpeg,.png" name="img" required>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Actual No.</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="actual_no" required>
                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Cottage/Hall Name</label>

                            <div class="col-sm-8">

                                <input type="text" class="form-control" name="name" required>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Category</label>

                            <div class="col-sm-8">

                                <select class="form-control" name="type" required>

                                    <option value="Cottage">Cottage</option>

                                    <option value="Hall">Hall</option>

                                    <option value="Room">Room</option>

                                </select>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Type</label>

                            <div class="col-sm-8">

                                <select class="form-control" name="category" required>

                                    <option value="1st Class">1st Class</option>

                                    <option value="2nd Class">2nd Class</option>

                                    <option value="3rd Class">3rd Class</option>

                                </select>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Max Person</label>

                            <div class="col-sm-8">

                                <input type="number" class="form-control" name="max-person" required>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Price</label>

                            <div class="col-sm-8">

                                <input type="text" class="form-control" name="price">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label"></label>

                            <div class="col-sm-8">

                                <button type="submit" class="btn btn-primary" name="btn-cottage-add">Submit</button>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">



                    </div>

                </div>

              </div>

            </form>

          </div>



</section>

 <?php }

?>


<!-- COTTAGE/HALL edit FORM -->

<?php

 if (isset($_GET["cottage-edit"])) {?>

     <section class="content-header">

    <h1>

        <a href="?cottage">Back</a>

    </h1>

    <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Edit Cottage/hall</li>

    </ol>

</section>



<!-- Main content -->

<section class="content container-fluid">



<div class="box box-default">

            <div class="box-header with-border">

              <h3 class="box-title">Edit Cottage/Hall</h3>

            </div>

            <?php 

              $getid = $_GET["cottage-edit"];

              $sql   = "SELECT * FROM `cottage/hall` WHERE id = '$getid'";

              $query = mysqli_query($con, $sql);

              $fetch = mysqli_fetch_assoc($query);

            ?>

            <form action="function/function_crud.php" method="post" enctype="multipart/form-data" class="form-horizontal">

              <div class="box-body">

                <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">

                            <label class="col-sm-4 control-label">Cottage No.</label>

                            <div class="col-sm-8">

                            <input type="text" class="form-control" value="<?php echo $fetch["actual_no"]?>" name="actual_no" required>

                            </div>

                            </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Cottage/Hall Name</label>

                            <div class="col-sm-8">

                                 <input type="hidden" class="form-control" value="<?php echo $fetch["id"]?>" name="id" required>

                                <input type="text" class="form-control" value="<?php echo $fetch["name"]?>" name="name" required>

                            </div>

                        </div>

        

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Category</label>

                            <div class="col-sm-8">

                                <select class="form-control" name="type" required>

                                    <option value="Cottage">Cottage</option>

                                    <option value="Hall">Hall</option>

                                </select>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Type</label>

                            <div class="col-sm-8">

                                <select class="form-control" name="category" required>

                                    <option value="1st Class">1st Class</option>

                                    <option value="2nd Class">2nd Class</option>

                                    <option value="3rd Class">3rd Class</option>

                                </select>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Max Person</label>

                            <div class="col-sm-8">

                                <input type="number" class="form-control" class="form-control" value="<?php echo $fetch["max_person"]?>" name="max-person" required>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Price</label>

                            <div class="col-sm-8">

                                <input type="text" class="form-control" class="form-control" value="<?php echo $fetch["price"]?>" name="price">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label"></label>

                            <div class="col-sm-8">

                                <button type="submit" class="btn btn-primary" name="btn-cottage-edit">Update</button>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">



                    </div>

                </div>

              </div>

            </form>

          </div>



</section>

 <?php }

?>