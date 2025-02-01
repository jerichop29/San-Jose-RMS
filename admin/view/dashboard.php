<!-- DASHBOARD -->

<?php

 if (isset($_GET["dashboard"])) {?>

     <section class="content-header">

    <h1>

        Dashboard

    </h1>

    <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Dashboard</li>

    </ol>

</section>



<!-- Main content -->

<section class="content container-fluid">

<div class="row">

        <div class="col-lg-3 col-xs-6">

          <!-- small box -->

          <div class="small-box bg-aqua">

            <div class="inner">

              <h3><?php count_me2($con)?></h3>

              <p>All</p>

            </div>

            <div class="icon">

            <i class="fa fa-shopping-bag"></i>

            </div>

            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

          </div>

        </div>

        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">

          <!-- small box -->

          <div class="small-box bg-green">

            <div class="inner">

              <h3><?php count_me($con, 'Pending')?></h3>

              <p>Pending</p>

            </div>

            <div class="icon">

              <i class="fa fa-hourglass"></i>

            </div>

            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

          </div>

        </div>

        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">

          <!-- small box -->

          <div class="small-box bg-yellow">

            <div class="inner">

              <h3><?php count_me($con, 'Fullypaid')?></h3>

              <p>Reserved</p>

            </div>

            <div class="icon">

              <i class="fa fa-check-circle"></i>

            </div>

            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

          </div>

        </div>

        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">

          <!-- small box -->

          <div class="small-box bg-red">

            <div class="inner">

              <h3><?php count_me($con, 'Cancelled')?></h3>

              <p>Canceled</p>

            </div>

            <div class="icon">

              <i class="fa fa-times"></i>

            </div>

            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

          </div>

        </div>

        <!-- ./col -->

      </div>
      <div class="row">
         <div class="col-md-6">
         <div class="box box-default">

<div class="box-header with-border">

  <h3 class="box-title">Available</h3>

</div>

  <div class="box-body">

    <table class="table table-stripped">

        <thead>

        <tr>

      

         <th>Image</th>

            <th>Name</th>

            <th>Category</th>

            <th>Type</th>

            <th>Max Person</th>

            <th>Price</th>



        </tr>

        </thead>

        <?php get_avail_cottage($con);?>

    </table>

  </div>

</div>
         </div>

         <div class='col-md-6'>
         <div class="box box-default">

<div class="box-header with-border">

  <h3 class="box-title">Reserved</h3>

</div>

  <div class="box-body">

    <table class="table table-stripped">

        <thead>

        <tr>

      

         <th>Image</th>

            <th>Name</th>

            <th>Category</th>

            <th>Type</th>

            <th>Max Person</th>

            <th>Price</th>



        </tr>

        </thead>

        <?php get_n_avail_cottage($con);?>

    </table>

  </div>

</div>
         </div>
      </div>

</section>

 <?php }

?>