<!--RESERVATION PENDING PAGE -->

<?php

if (isset($_GET["pending"])) {?>

    <section class="content-header">

   <h1>Pending</h1>

   <ol class="breadcrumb">

       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

       <li class="active">Pending</li>

   </ol>

</section>



<!-- Main content -->

<section class="content container-fluid">


<div class="box box-default">

           <div class="box-header with-border">

             <h3 class="box-title"></h3>

           </div>

             <div class="box-body">

               <table id="example2" class="table table-bordered">

                   <thead>

                   <tr>

                       <th>#</th>
                       <th>Transaction #</th>
                       <th>Customer Name</th>
                       <th>GCash ref. no.</th>
                       <th>Status</th>
                       <th>Date Created</th>
                       <th><i class="fa fa-cogs"></i> Options</th>

                   </tr>

                   </thead>

                   <?php get_pending($con)?>

               </table>

             </div>

         </div>

</section>

<?php }?>




<?php

if (isset($_GET["reserved2"])) {?>

    <section class="content-header">

   <h1>

       Reserved

   </h1>

   <ol class="breadcrumb">

       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

       <li class="active">Reserved</li>

   </ol>

</section>



<!-- Main content -->

<section class="content container-fluid">



<div class="box box-default">

           <div class="box-header with-border">

             <h3 class="box-title"></h3>

           </div>

             <div class="box-body">

               <table id="example2" class="table table-bordered">

                   <thead>

                   <tr>

                       <th>#</th>

                       <th>Transaction #</th>

                       <th>Customer Name</th>

                       <th>Status</th>

                       <th>Date Created</th>

                       <th><i class="fa fa-cogs"></i> Options</th>

                   </tr>

                   </thead>

                   <?php get_reserved2($con)?>

               </table>

             </div>

         </div>



</section>

<?php }?>




<?php

 if (isset($_GET["reserved"])) {?>

     <section class="content-header">

    <h1>

       Fullypaid 

    </h1>

    <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Fullypaid</li>

    </ol>

</section>



<!-- Main content -->

<section class="content container-fluid">



<div class="box box-default">

            <div class="box-header with-border">

              <h3 class="box-title"></h3>

            </div>

              <div class="box-body">

                <table id="example2" class="table table-bordered">

                    <thead>

                    <tr>

                       <th>#</th>

                       <th>Transaction #</th>

                       <th>Customer Name</th>

                       <th>Status</th>

                       <th>Date Created</th>

                       <th><i class="fa fa-cogs"></i> Options</th>

                    </tr>

                    </thead>

                    <?php get_confirm($con);?>

                </table>

              </div>

          </div>



</section>

 <?php }

?>



<?php

 if (isset($_GET["canceled"])) {?>

     <section class="content-header">

    <h1>

        Canceled 

    </h1>

    <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Reserved</li>

    </ol>

</section>



<!-- Main content -->

<section class="content container-fluid">



<div class="box box-default">

            <div class="box-header with-border">

              <h3 class="box-title"></h3>

            </div>

              <div class="box-body">

                <table id="example2" class="table table-bordered">

                    <thead>

                    <tr>

                       <th>#</th>

                       <th>Transaction #</th>

                       <th>Customer Name</th>

                       <th>Status</th>

                       <th><i class="fa fa-cogs"></i> Options</th>

                    </tr>

                    </thead>

                    <?php get_cancld($con);?>

                </table>

              </div>

          </div>



</section>

 <?php }

?>



<!-- RESERVATION APPROVED PAGE -->

<?php

 if (isset($_GET["done"])) {?>

     <section class="content-header">

    <h1>

        Done Reservation <span class="badge bg-red">23</span>

    </h1>

    <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Done Reservation</li>

    </ol>

</section>



<!-- Main content -->

<section class="content container-fluid">



<div class="box box-default">

            <div class="box-header with-border">

              <h3 class="box-title"></h3>

            </div>

              <div class="box-body">

                <table id="example2" class="table table-bordered">

                    <thead>

                    <tr>

                        <th>header</th>

                        <th>header</th>

                        <th>header</th>

                        <th>header</th>

                        <th>header</th>

                        <th>header</th>

                        <th>header</th>

                    </tr>

                    </thead>

                    <tbody>

                    <tr>

                        <td>data</td>

                        <td>data</td>

                        <td>data</td>

                        <td>data</td>

                        <td>data</td>

                        <td>data</td>

                        <td>data</td>

                    </tr>

                    </tbody>

                </table>

              </div>

          </div>



</section>

 <?php }

?>