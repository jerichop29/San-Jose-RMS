<?php 

function get_reserve($con, $staff_id, $trans_no) {
    
    $child=0;
    $adult=0;
    $total = 0;
    $addi = 0;

    $sql = "SELECT * FROM reservation INNER JOIN `cottage/hall` ON `cottage/hall`.id = reservation.`cottage/hall_id` INNER JOIN `user` ON `user`.user_id = reservation.customer_id
            INNER JOIN user_type ON user_type.user_type_id = `user`.user_type_id WHERE `user_id` = '$staff_id' AND `trans_no` = '$trans_no' AND `status` = 'Processing'";
    $query = mysqli_query($con, $sql);

    $sql2 = "SELECT * FROM `user` WHERE `user_id` = '$staff_id'";
    $query2 = mysqli_query($con,$sql2);
    $fetch2 = mysqli_fetch_assoc($query2);

    

    if (mysqli_num_rows($query) > 0) {

        echo "<div class='row'>
                <div class='col-md-4'>
                    <table>
                        <tr>
                            <th>Operator:</th>
                            <td>&nbsp;&nbsp;".ucfirst($fetch2['uname'])."</td>
                        </tr>
                        
                    </table>
                </div>

                <div class='col-md-4'>

                </div>

                <div class='col-md-4'>
                
                    <table>
                        <tr>
                            <th>Transaction #:</th>
                            <td>&nbsp;&nbsp;".$trans_no."</td>
                        </tr>
                        <!--<tr>
                            <th>Date of reservation:</th>
                            <td>&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <th>Total no of person:</th>
                            <td>&nbsp;&nbsp;</td>
                        </tr> -->
                    </table>
                

        <div class='modal fade in' id='modal-customer'>

          <div class='modal-dialog modal-sm'>

            <div class='modal-content'>

              <div class='modal-header'>

                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>

                  <span aria-hidden='true'>×</span></button>

                <h4 class='modal-title'>Edit Details</h4>

              </div>

              <div class='modal-body'>

              <form method='post' action='function/function_crud.php'>

              <div class='form-group'>

                <label for=''>First Name</label>

                <input type='hidden' class='form-control' value='".$fetch2['user_id']."' name='id'>

                <input type='text' class='form-control' value='".$fetch2['fname']."' name='fname'>

              </div>

              <div class='form-group'>

                <label for=''>Last Name</label>

                <input type='text' class='form-control' value='".$fetch2['lname']."' name='lname'>

              </div>

              <div class='form-group'>

                <label for=''>Contact no.</label>

                <input type='text' class='form-control' value='".$fetch2['contact_no']."' name='contact_no'>

              </div>

              <div class='form-group'>

                <label for=''>Address</label>

                <input type='text' class='form-control' value='".$fetch2['address']."' name='address'>

              </div>

              </div>

              <div class='modal-footer'>

                <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Close</button>

                <button type='submit' class='btn btn-primary' name='btnUpdateDetails'>Update</button>

              </div>

              </form>

            </div>        

          </div>

        </div>

        </div>

    </div>

        <br>

        <table class='table table-condensed'>

            <tr class='bg-gray'>

                <th>Image</th>

                <th>Date Reserve</th>

                <th>Time</th>

                <th>Name</th>

                <th>No. of Child</th>

                <th>No. of Adult</th>

                <th class='text-right'>Price</th>
                
                <th class='text-right'>Operation</th>

            </tr>";



        while ($fetch = mysqli_fetch_assoc($query)) {


            $addi += $fetch["additional"];
            
            $total += $fetch["price"]; //adding all price // total = tatal + price

            $child += $fetch["child"];

            $adult += $fetch["adult"];

            $childPrice = $child * 25; //child price

            $adultPrice = $adult * 50; //adult price

            $totalPrice = $childPrice + $adultPrice + $total + $addi; //final price

            //$downpayment = $totalPrice/2; //downpayment


            echo "<tr>

                   <td><img src='../admin/function/".$fetch["img"]."' width='70px'></td>  

                   <td><b>".$fetch["date_reserve"]."</b></td>

                   <td><b>".$fetch["time_slot"]."</b></td>

                   <td>".$fetch["name"]."</td>  

                   <td class='text-center'>".$fetch["child"]."</td>

                   <td class='text-center'>".$fetch["adult"]."</td>                   

                   <td class='text-right'><b>".number_format($fetch["price"],2)."</b></td>  

                   <td class='text-right'><a href='#' data-toggle='modal' data-target='#modal-".$fetch["id_res"]."' class='btn btn-warning btn-sm'><img src='../home/image/edit-w.png'></a>

                    <button type='button' data-toggle='modal' data-target='#modalDel-".$fetch['id_res']."' class='btn btn-danger btn-sm'><img src='../home/image/delete-w.png'></button></td>

                  </tr>";


            echo "<div class='modal fade in' id='modal-".$fetch["id_res"]."'>

                  <div class='modal-dialog modal-sm'>
  
                  <div class='modal-content'>
  
                      <div class='modal-header'>
  
                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
  
                          <span aria-hidden='true'>×</span></button>
  
                      <h4 class='modal-title'>Edit Total Person</h4>
  
                  </div>
  
                  <div class='modal-body'>
  
                      <form method='post' action='function/function_crud.php'>

                      <div class='form-group'>
  
                      <label for=''>You Reserve</label>
  
                      <input type='text' class='form-control' min='0' value='".$fetch["name"]."' readonly>
  
                      </div>
  
                      <div class='form-group'>
  
                      <label for=''>No. of Child</label>
  
                      <input type='hidden' class='form-control' value='".$fetch["id_res"]."' name='id'>

                      <input type='hidden' class='form-control' value='".$fetch["cottage/hall_id"]."' name='c/h_id'>
  
                      <input type='number' class='form-control' min='0' value='".$fetch["child"]."' name='ch'>
  
                      </div>
  
                      <div class='form-group'>
  
                      <label for=''>No. of Adult</label>
  
                      <input type='number' class='form-control' min='0' value='".$fetch["adult"]."' name='ad'>
  
                      </div>

                      <label class='text-red'>Total max person: ".$fetch["max_person"]."</label> 
  
                  </div>
  
                      <div class='modal-footer'>
  
                      <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Close</button>
  
                      <button type='submit' class='btn btn-primary' name='btnUpdateFerson'>Update</button>
  
                      </div>
  
                      </form>
  
                  </div>        
  
                  </div>
  
              </div>
  
              </div>
  
          </div>";

          echo "<div class='modal fade in' id='modalDel-".$fetch["id_res"]."'>

                  <div class='modal-dialog modal-sm'>
  
                  <div class='modal-content'>
  
                      <div class='modal-header'>
  
                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
  
                          <span aria-hidden='true'>×</span></button>
  
                      <h4 class='modal-title'>Confirmation</h4>
  
                  </div>
  
                  <div class='modal-body'>
  
                      <form method='post' action='function/function_crud.php'>
  
                        <div class='form-group'>
    
                            <h2 class='text-center'>Are you sure?</h2>   
        
                            <input type='hidden' class='form-control' value='".$fetch["id_res"]."' name='id'>
    
                        </div>
  
                  </div>
  
                      <div class='modal-footer'>
  
                        <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>No</button>
    
                        <button type='submit' class='btn btn-danger' name='btnDeleteReservation'>Yes</button>
  
                      </div>
  
                      </form>
  
                  </div>        
  
                  </div>
  
              </div>
  
              </div>
  
          </div>";

        }

        echo "<tr>

        <td></td>

        <td></td>

        <td></td>

        <td></td>  

        <td></td>  

        <td></td>

        <td class='text-right'><strong>Child($child x 25):</strong></td>  

        <td class='text-right text-red'>".number_format($childPrice,2)."</td>

    </tr>";

    echo "<tr>

    <td></td>

    <td></td>

    <td></td>  

     <td></td>  

    <td></td>  

    <td></td>

    <td class='text-right'><strong>Adult($adult x 50):</strong></td>  

    <td class='text-right text-red'>".number_format($adultPrice,2)."</td>

                </tr>";
            
            echo "<tr>

                <td></td>
    
                <td></td>
    
                <td></td>
    
                <td></td> 

                <td></td>  
    
                <td></td>
    
                <td class='text-right'><strong>Additional:</strong></td>  
    
                <td class='text-right text-red'>".number_format($addi,2)."</td>
    
                    </tr>";

            echo "<tr>

            <td></td>

            <td></td>

            <td></td>

            <td></td>  

            <td></td>  

            <td></td>

            <td class='text-right'><strong>Total:</strong></td>  

            <td class='text-right text-green'><strong>".number_format($totalPrice,2)."</strong></td>

                </tr>";

            echo "<tr>
            
            <td></td>

                    <td></td>  

                    <td></td>  

                    <td></td>

                    <td></td>

                    <td></td>  

                    <td><a href='function/function_crud.php?transnodelete=".$trans_no."' class='btn btn-danger pull-right'>Remove All</a></td>
                    
                    <td width='20px'><button type='button' data-toggle='modal' data-target='#modal-pay' class='btn btn-success btn-md'>Checkout</button></td>

                </tr>";
 
            echo "<form action='function/function_crud.php' method='post'><div class='modal fade in' id='modal-pay'>

                    <div class='modal-dialog modal-sm mt-6'>

                    <div class='modal-content'>

                        <div class='modal-header'>

                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>

                            <span aria-hidden='true'>×</span></button>

                        <h4 class='modal-title'>Payment</h4>

                        </div>

                        <div class='modal-body'>

                          <center>

                            <img src='../home/image/cash.jpg' width='260px'>

                          </center>
                          <h4><label>Amount to pay:<span>&nbsp;&nbsp;₱".number_format($totalPrice,2)."</span></label></h4>
                          <div class='form-group'>
                            <label>Enter Cash</label>
                            <input type='hidden' value='".$user_id_s."' name='userid'>
                            <input type='hidden' value='".$trans_no."' name='transno'>
                            <input type='hidden' value='".$downpayment."' name='pay'>
                            <input type='number' class='form-control' id='input-ref' placeholder='Please Enter the Client Cash' name='ammount' required>
                           </div>

                        </div>

                        <div class='modal-footer'>

                        <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Close</button>

                        <button type='submit' class='btn btn-success' id='btnPayment' name='btnPayment'>Proceed Checkout</button>

                        </div>

                    </div>

                    </div>

                </div></form>";


    }

    else{

        echo "<center><h4>Empty</h4></center>";

    }

}

function get_cottage($con) {

    $sql = "SELECT * FROM `cottage/hall`";

    $query = mysqli_query($con, $sql);

    $i = 1;

    if (mysqli_num_rows($query) > 0) {

      while ($fetch = mysqli_fetch_assoc($query)) {

          echo "

                <tbody>

                    <tr>

                    <td>".$i."</td>

                    <td><img src='function/".$fetch['img']."' alt='image' width='60px'></td>

                    <td class='text-center'>".$fetch['actual_no']."</td>

                    <td>".$fetch['name']."</td>

                    <td>".$fetch['category']."</td>

                    <td>".$fetch['type']."</td>

                    <td>".$fetch['max_person']."</td>

                    <td>".$fetch['price']."</td>

                    <td><a href='?cottage-edit=".$fetch['id']."' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></a>

                    <button type='button' data-toggle='modal' data-target='#modal-delete-".$fetch['id']."' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button></td>

                    </tr>

                </tbody>";



        echo "<div class='modal fade in' id='modal-delete-".$fetch['id']."'>

                <div class='modal-dialog modal-sm'>

                <div class='modal-content'>

                    <div class='modal-header'>

                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>

                        <span aria-hidden='true'>×</span></button>

                    <h4 class='modal-title'>Confirmation</h4>

                    </div>

                    <div class='modal-body'>

                    <center><h3>Delete ".$fetch['name']."?</h3></center>

                    </div>

                    <div class='modal-footer'>

                    <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Close</button>

                    <a href='function/function_crud.php?cottage-del=".$fetch['id']."' class='btn btn-danger'>Delete</a>

                    </div>

                </div>

                </div>

            </div>";

                $i=$i+1;

      }

  }else{

      echo "no data";

  }

}

function get_avail_cottage($con) {

  $datetoday = date("Y-m-d");

  $sql3 = "SELECT *, `reservation`.id_res as res, `cottage/hall`.id as cid FROM

  reservation

  INNER JOIN `cottage/hall` ON `cottage/hall`.id = reservation.`cottage/hall_id`

  INNER JOIN `user` ON `user`.user_id = reservation.customer_id

  INNER JOIN user_type ON user_type.user_type_id = `user`.user_type_id 

  INNER JOIN payment ON payment.transaction_id = `reservation`.trans_no 

  WHERE reservation.date_reserve = '$datetoday' AND reservation.status = 'Fullypaid' OR reservation.status = 'Reserved'";

  $query3 = mysqli_query($con, $sql3);
  $arr = array();
  if (mysqli_num_rows($query3)>0) {

      while ($row = mysqli_fetch_assoc($query3)) {

          $get_me = $row["id"];
          array_push($arr, $get_me);
      }
      
  }else {
    $get_me = 0;
    array_push($arr, $get_me);
  }

   $arra = implode(",",$arr);
  //$sql = "SELECT * FROM `cottage/hall` WHERE `cottage/hall`.id IN (!$get_me)";
  //SELECT * FROM `cottage/hall` WHERE NOT `cottage/hall`.`id` IN (11,12)
  $sql = "SELECT * FROM `cottage/hall` WHERE NOT `cottage/hall`.`id` IN ($arra)";

  $query = mysqli_query($con, $sql);

  $i = 1;

  if (mysqli_num_rows($query) > 0) {

      while ($fetch = mysqli_fetch_assoc($query)) {

          echo "

                <tbody>

                    <tr>

                    <td><img src='function/".$fetch['img']."' alt='image' width='60px'></td>

                    <td>".$fetch['name']."</td>

                    <td>".$fetch['category']."</td>

                    <td>".$fetch['type']."</td>

                    <td>".$fetch['max_person']."</td>

                    <td>".$fetch['price']."</td>

                    </tr>

                </tbody>";


     

      }
    }

}


function get_n_avail_cottage($con) {

  $datetoday = date("Y-m-d");

  $sql = "SELECT *, `reservation`.id_res as res FROM

  reservation

  INNER JOIN `cottage/hall` ON `cottage/hall`.id = reservation.`cottage/hall_id`

  INNER JOIN `user` ON `user`.user_id = reservation.customer_id

  INNER JOIN user_type ON user_type.user_type_id = `user`.user_type_id 

  INNER JOIN payment ON payment.transaction_id = `reservation`.trans_no 

  WHERE reservation.date_reserve = '$datetoday' AND reservation.status = 'Fullypaid' OR reservation.status = 'Reserved'";

  $query = mysqli_query($con, $sql);

  $i = 1;

  if (mysqli_num_rows($query) > 0) {

      while ($fetch = mysqli_fetch_assoc($query)) {

          echo "

                <tbody>

                    <tr>

                    <td><img src='function/".$fetch['img']."' alt='image' width='60px'></td>

                    <td>".$fetch['name']."</td>

                    <td>".$fetch['category']."</td>

                    <td>".$fetch['type']."</td>

                    <td>".$fetch['max_person']."</td>

                    <td>".$fetch['price']."</td>

                    </tr>

                </tbody>";

      }

  }else{

      echo "<tr>

      <td colspan='6'><center>No Reservation</center></td>

      </tr>";

  }



}

function get_feature($con) {

  $sql = "SELECT * FROM `feature`";

  $query = mysqli_query($con, $sql);

  $i = 1;

  if (mysqli_num_rows($query) > 0) {

      while ($fetch = mysqli_fetch_assoc($query)) {

          echo "

                <tbody>

                    <tr>

                    <td>".$i."</td>

                    <td><img src='function/".$fetch['img']."' alt='image' width='60px'></td>

                    <td>".$fetch['name']."</td>

                    <td>".$fetch['desc']."</td>

                    <td><a href='?feature-edit=".$fetch['id']."' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></a>

                    <button type='button' data-toggle='modal' data-target='#modal-delete-".$fetch['id']."' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button></td>

                    </tr>

                </tbody>";



        echo "<div class='modal fade in' id='modal-delete-".$fetch['id']."'>

                <div class='modal-dialog modal-sm'>

                <div class='modal-content'>

                    <div class='modal-header'>

                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>

                        <span aria-hidden='true'>×</span></button>

                    <h4 class='modal-title'>Confirmation</h4>

                    </div>

                    <div class='modal-body'>

                    <center><h3>Delete ".$fetch['name']."?</h3></center>

                    </div>

                    <div class='modal-footer'>

                    <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Close</button>

                    <a href='function/function_crud.php?feature-del=".$fetch['id']."' class='btn btn-danger'>Delete</a>

                    </div>

                </div>

                </div>

            </div>";

                $i=$i+1;

      }

  }else{

      echo "no data";

  }

}

function get_picture($con) {

  $sql = "SELECT * FROM `picture`";

  $query = mysqli_query($con, $sql);

  $i = 1;

  if (mysqli_num_rows($query) > 0) {

      while ($fetch = mysqli_fetch_assoc($query)) {

          echo "

                <tbody>

                    <tr>

                    <td>".$i."</td>

                    <td><img src='function/".$fetch['img']."' alt='image' width='60px'></td>

                    <td>".$fetch['name']."</td>

                    <td>".$fetch['des']."</td>

                    <td><a href='?picture-edit=".$fetch['id']."' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></a>

                    <button type='button' data-toggle='modal' data-target='#modal-delete-".$fetch['id']."' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button></td>

                    </tr>

                </tbody>";



        echo "<div class='modal fade in' id='modal-delete-".$fetch['id']."'>

                <div class='modal-dialog modal-sm'>

                <div class='modal-content'>

                    <div class='modal-header'>

                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>

                        <span aria-hidden='true'>×</span></button>

                    <h4 class='modal-title'>Confirmation</h4>

                    </div>

                    <div class='modal-body'>

                    <center><h3>Delete ".$fetch['name']."?</h3></center>

                    </div>

                    <div class='modal-footer'>

                    <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Close</button>

                    <a href='function/function_crud.php?picture-del=".$fetch['id']."' class='btn btn-danger'>Delete</a>

                    </div>

                </div>

                </div>

            </div>";

                $i=$i+1;

      }

  }else{

      echo "no data";

  }

}

function get_pending($con) {

    $sql = "SELECT *, `reservation`.id_res as res FROM

    reservation

    INNER JOIN `cottage/hall` ON `cottage/hall`.id = reservation.`cottage/hall_id`

    INNER JOIN `user` ON `user`.user_id = reservation.customer_id

    INNER JOIN user_type ON user_type.user_type_id = `user`.user_type_id 

    INNER JOIN payment ON payment.transaction_id = `reservation`.trans_no 

    WHERE status = 'Pending' GROUP BY `trans_no`";

    $query = mysqli_query($con, $sql);

    $sql2 = "SELECT * FROM payment"; //query for payment

    $query2 = mysqli_query($con,$sql2);

    $fetch2 = mysqli_fetch_assoc($query2);

    $i = 1;

    if (mysqli_num_rows($query) > 0) {

        while ($fetch = mysqli_fetch_assoc($query)){

            echo "

                 <tbody>

                  <tr>

                   <td>".$i."</td>

                   <td>".$fetch["trans_no"]."</td>

                   <td>".$fetch["fname"]." ".$fetch["lname"]."</td> 

                   <td><span class='text-blue'>".$fetch["ref_no"]."</span></td>

                   <td><span class='badge bg-orange'>".$fetch["status"]."</span></td>

                   <td>".date("M d, Y", strtotime($fetch["date_created"]))."</td>

                   <td>

                   <button type='button' data-toggle='modal' data-target='#modal-view-".$fetch['res']."' class='btn btn-success view' id='".$fetch['trans_no']."'>View</button>

                   </td>

                  </tr>

                 </tbody>";

                 $i=$i+1;


                        echo "<div class='modal fade in' id='modal-view-".$fetch['res']."'>

                        <div class='modal-dialog modal-lg'>

                        <div class='modal-content'>

                            <div class='modal-header bg-green'>

                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>

                                <span aria-hidden='true'>×</span></button>

                            <h4 class='modal-title'>Transaction #: ".$fetch['trans_no']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gcash ref no. ".$fetch['ref_no']."</h4>

                            </div>

                            <div class='modal-body'>

                            <label>Customer Name: </label> ".ucfirst($fetch["fname"])." ".ucfirst($fetch["lname"])."<br>

                            <label>Customer Address: </label> ".ucfirst($fetch["address"])."<br>

                            <label>Customer Contact #: </label> ".ucfirst($fetch["contact_no"])."<br><br>

                             <div id='view-reserve'>  </div>

                            </div>

                            <div class='modal-footer'>


                            <a href='#' class='btn btn-success' data-toggle='modal' data-target='#modalconfirm".$fetch['trans_no']."'>Confirm</a>

                            <a href='#' class='btn btn-danger' data-toggle='modal' data-target='#modalcancel".$fetch['trans_no']."'>Cancel</a>

                            <a href='function/reciept.php?res-id=".$fetch['trans_no']."' target='_blank' class='btn btn-primary'><i class='fa fa-print'></i> Details</a></td>

                            <button type='button' class='btn bg-maroon' data-dismiss='modal'>Close</button>

                            </div>

                        </div>

                        </div>

                    </div>";


            echo  "<div class='modal fade in' id='modalcancel".$fetch['trans_no']."'>
            <div class='modal-dialog modal-sm'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>×</span></button>
                    <h4 class='modal-title'>Confirmation</h4>
                </div>
                <div class='modal-body'>
                    <center><h3>Are you sure?</h3></center>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Close</button>
                    <a href='function/function_crud.php?res-id-cancel=".$fetch['trans_no']."' class='btn btn-success'>Yes</a>
                </div>
                </div>
            </div> 
            </div>";

        echo  "<div class='modal fade in' id='modalconfirm".$fetch['trans_no']."'>
          <div class='modal-dialog modal-sm'>
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>×</span></button>
                <h4 class='modal-title'>Confirmation</h4>
              </div>
              <div class='modal-body'>
                <center><h3>Are you sure?</h3></center>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Close</button>
                <a href='function/function_crud.php?res-for-confirm-id=".$fetch['trans_no']."&no=".$fetch['contact_no']."' class='btn btn-success'>Confirm</a>
              </div>
            </div>
          </div> 
        </div>";         

        }

    }else {

        echo "no result";

    }

}

function get_reserved2($con) {

    $sql = "SELECT *, `reservation`.id_res as res FROM

    reservation

    INNER JOIN `cottage/hall` ON `cottage/hall`.id = reservation.`cottage/hall_id`

    INNER JOIN `user` ON `user`.user_id = reservation.customer_id
    
    INNER JOIN user_type ON user_type.user_type_id = `user`.user_type_id 

    WHERE status = 'Reserved' GROUP BY `trans_no`";

    $query = mysqli_query($con, $sql);

    
    $sql2 = "SELECT * FROM payment"; //query for payment

    $query2 = mysqli_query($con,$sql2);

    $fetch2 = mysqli_fetch_assoc($query2);

    $i = 1;

    if (mysqli_num_rows($query) > 0) {

        while ($fetch = mysqli_fetch_assoc($query)){

            echo "

                 <tbody>

                  <tr>

                   <td>".$i."</td>

                   <td>".$fetch["trans_no"]."</td>

                   <td>".$fetch["fname"]." ".$fetch["lname"]."</td> 

                   <td><span class='badge bg-orange'>".$fetch["status"]."</span></td>

                   <td>".date("M d, Y", strtotime($fetch["date_created"]))."</td>

                   <td>

                   <button type='button' data-toggle='modal' data-target='#modal-view-".$fetch['res']."' class='btn btn-success view' id='".$fetch['trans_no']."'>View</button>

                   </td>

                  </tr>

                 </tbody>";

                 $i=$i+1;

                        echo "<div class='modal fade in hideme' id='modal-view-".$fetch['res']."'>

                        <div class='modal-dialog modal-lg'>

                        <div class='modal-content'>

                            <div class='modal-header bg-green'>

                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>

                                <span aria-hidden='true'>×</span></button>

                            <h4 class='modal-title'>Transaction #: ".$fetch['trans_no']."</h4>

                            </div>

                            <div class='modal-body'>

                            <label>Customer Name: </label> ".ucfirst($fetch["fname"])." ".ucfirst($fetch["lname"])."<br>

                            <label>Customer Address: </label> ".ucfirst($fetch["address"])."<br><br>

                             <div id='view-reserve'></div>

                            </div>

                            <div class='modal-footer'>


                            <button type='button' class='btn btn-success btnhide' data-toggle='modal' data-target='#modalpaid'".$fetch['trans_no']."'>Paid Balance</a>

                            <button type='button' class='btn bg-maroon' data-dismiss='modal'>Close</button>

                            </div>

                        </div>

                        </div>

                    </div>";


      echo  "<div class='modal fade in' id='modalpaid'".$fetch['trans_no']."'>
          <div class='modal-dialog modal-sm'>
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>×</span></button>
                <h4 class='modal-title'>Confirmation</h4>
              </div>
              <div class='modal-body'>
                <center><h3>Are you sure?</h3></center>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Close</button>
                <a href='function/function_crud.php?res-id=".$fetch['trans_no']."' class='btn btn-success'>Paid Balance</a>
              </div>
            </div>
          </div> 
        </div>";
        }

    }else {

        //echo "no result";

    }

}

function get_confirm($con) {

    $sql = "SELECT *, `reservation`.id_res as res FROM

    reservation

    INNER JOIN `cottage/hall` ON `cottage/hall`.id = reservation.`cottage/hall_id`

    INNER JOIN `user` ON `user`.user_id = reservation.customer_id

    INNER JOIN user_type ON user_type.user_type_id = `user`.user_type_id 

    WHERE status = 'Fullypaid' GROUP BY `trans_no`";

    $query = mysqli_query($con, $sql);

    
    $sql2 = "SELECT * FROM payment"; //query for payment

    $query2 = mysqli_query($con,$sql2);

    $fetch2 = mysqli_fetch_assoc($query2);

    $i = 1;

    if (mysqli_num_rows($query) > 0) {

        while ($fetch = mysqli_fetch_assoc($query)){

            echo "

                 <tbody>

                  <tr>

                   <td>".$i."</td>

                   <td>".$fetch["trans_no"]."</td>

                   <td>".$fetch["fname"]." ".$fetch["lname"]."</td> 

                   <td><span class='badge bg-orange'>".$fetch["status"]."</span></td>

                   <td>".date("M d, Y", strtotime($fetch["date_created"]))."</td>

                   

                  <td>

                   <buton type='button' data-toggle='modal' data-target='#modal-view-".$fetch['res']."' class='btn btn-success view' id='".$fetch['trans_no']."'>View</buton></td>

                  </tr>

                 </tbody>";

                 $i=$i+1;



            echo "<div class='modal fade in' id='modal-view-".$fetch['res']."'>

                <div class='modal-dialog modal-lg'>

                <div class='modal-content'>

                    <div class='modal-header bg-green'>

                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>

                        <span aria-hidden='true'>×</span></button>

                    <h4 class='modal-title'>Transaction #: ".$fetch['trans_no']."</h4>

                    </div>

                    <div class='modal-body'>

                    <label>Customer Name: </label> ".ucfirst($fetch["fname"])." ".ucfirst($fetch["lname"])."<br>

                    <label>Customer Address: </label> ".ucfirst($fetch["address"])."<br><br>

                     <div id='view-reserve'></div>

                    </div>

                    <div class='modal-footer'>

                    

                    <a href='function/recieptPaid.php?res-id=".$fetch['trans_no']."' target='_blank' class='btn btn-primary'><i class='fa fa-print'></i> Reciept</a>

                    <button type='button' class='btn bg-maroon' data-dismiss='modal'>Close</button>

                    </div>

                </div>

                </div>

            </div>";

        }

    }else {

        //echo "no result";

    }

}

function get_cancld($con) {

    $sql = "SELECT *, `reservation`.id_res as res FROM

    reservation

    INNER JOIN `cottage/hall` ON `cottage/hall`.id = reservation.`cottage/hall_id`

    INNER JOIN `user` ON `user`.user_id = reservation.customer_id

    INNER JOIN user_type ON user_type.user_type_id = `user`.user_type_id 

    WHERE status = 'Cancelled' GROUP BY `trans_no`";

    $query = mysqli_query($con, $sql);

    

    $sql2 = "SELECT * FROM payment"; //query for payment

    $query2 = mysqli_query($con,$sql2);

    $fetch2 = mysqli_fetch_assoc($query2);

    $i = 1;

    if (mysqli_num_rows($query) > 0) {

        while ($fetch = mysqli_fetch_assoc($query)){

            echo "

                 <tbody>

                  <tr>

                   <td>".$i."</td>

                   <td>".$fetch["trans_no"]."</td>

                   <td>".$fetch["fname"]." ".$fetch["lname"]."</td> 

                   <td><span class='badge bg-orange'>".$fetch["status"]."</span></td>

                   <td>

                   <buton type='button' data-toggle='modal' data-target='#modal-view-".$fetch['res']."' class='btn btn-success view' id='".$fetch['trans_no']."'>View</buton>

                  </tr>

                 </tbody>";

                 $i=$i+1;



            echo "<div class='modal fade in' id='modal-view-".$fetch['res']."'>

                <div class='modal-dialog modal-lg'>

                <div class='modal-content'>

                    <div class='modal-header bg-green'>

                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>

                        <span aria-hidden='true'>×</span></button>

                    <h4 class='modal-title'>Transaction #: ".$fetch['trans_no']."</h4>

                    </div>

                    <div class='modal-body'>

                    <label>Customer Name: </label> ".ucfirst($fetch["fname"])." ".ucfirst($fetch["lname"])."<br>

                    <label>Customer Address: </label> ".ucfirst($fetch["address"])."<br><br>

                     <div id='view-reserve'></div>

                    </div>

                    <div class='modal-footer'>

                    <button type='button' class='btn bg-maroon' data-dismiss='modal'>Close</button>

                    </div>

                </div>

                </div>

            </div>";

        }

    }else {

        //echo "no result";

    }

}

function get_reserved($con) {

    $sql = "SELECT *, `reservation`.id_res as rec_id FROM

    reservation

    INNER JOIN `cottage/hall` ON `cottage/hall`.id = reservation.`cottage/hall_id`

    INNER JOIN `user` ON `user`.user_id = reservation.customer_id

    INNER JOIN user_type ON user_type.user_type_id = `user`.user_type_id WHERE status = 'Reserved'";

    $query = mysqli_query($con, $sql);

    $i = 1;

    if (mysqli_num_rows($query) > 0) {

        while ($fetch = mysqli_fetch_assoc($query)){

            echo "

                 <tbody>

                  <tr>

                   <td>".$i."</td>

                   <td>".$fetch["trans_no"]."</td>

                   <td>".date('F d, Y', strtotime($fetch["date_reserve"]))."</td>

                   <td>".$fetch["fname"]." ".$fetch["lname"]."</td>

                   <td>".$fetch["name"]."</td>

                   <td class='text-primary'>".number_format($fetch['downpayment'])."</td>

                   <td class='text-primary'>".number_format($fetch['balance'])."</td>

                   <td class='text-primary'>".number_format($fetch["price"])."</td>

                   <td><span class='badge bg-green'>".$fetch["status"]."</span></td>

                   <td width='130px'>

                   <a href='function/reciept.php?res-id=".$fetch['rec_id']."' target='_blank' class='btn btn-primary btn-xs'><i class='fa fa-print'></i> Reciept</a></td>

                  </tr>

                 </tbody>";

                 $i=$i+1;

        }

    }else {

        echo "no result";

    }

}

function get_canceled($con) {

    $sql = "SELECT * FROM

    reservation

    INNER JOIN `cottage/hall` ON `cottage/hall`.id = reservation.`cottage/hall_id`

    INNER JOIN `user` ON `user`.user_id = reservation.customer_id

    INNER JOIN user_type ON user_type.user_type_id = `user`.user_type_id WHERE status = 'Canceled'";

    $query = mysqli_query($con, $sql);

    $i = 1;

    if (mysqli_num_rows($query) > 0) {

        while ($fetch = mysqli_fetch_assoc($query)){

            echo "

                 <tbody>

                  <tr>

                   <td>".$i."</td>

                   <td>".$fetch["trans_no"]."</td>

                   <td>".date('F d, Y', strtotime($fetch["date_reserve"]))."</td>

                   <td>".$fetch["fname"]." ".$fetch["lname"]."</td>

                   <td>".$fetch["name"]."</td>

                   <td class='text-primary'>".number_format($fetch['downpayment'],2)."</td>

                   <td class='text-primary'>".number_format($fetch['balance'],2)."</td>

                   <td class='text-primary'>".number_format($fetch["price"],2)."</td>

                   <td><span class='badge bg-red'>".$fetch["status"]."</span></td>

                  </tr>

                 </tbody>";

                 $i=$i+1;

        }

    }else {

        echo "no result";

    }

}

function get_users($con) {

    $sql = "SELECT * FROM

    `user`

    INNER JOIN user_type ON user_type.user_type_id = `user`.user_type_id

    WHERE `user`.user_type_id != 1";

    $query = mysqli_query($con, $sql);

    $i=1;

    if (mysqli_num_rows($query) > 0) {

        while ($fetch = mysqli_fetch_assoc($query)) {

            echo "<tbody>

                    <tr>

                     <td>".$i."</td>

                     <td>".$fetch['fname']."</td>

                     <td>".$fetch['lname']."</td>

                     <td>".$fetch['user_type_name']."</td>

                     <td>".$fetch['uname']."</td>

                     <td>".$fetch['pass']."</td>

                     <td><a href='?users-edit=".$fetch['user_id']."' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i> Edit</a>

                     <button type='button' data-toggle='modal' data-target='#user-".$fetch['user_id']."' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i> Delete</button></td>

                    </tr>

                  </tbody>";



                  echo "<div class='modal fade in' id='user-".$fetch['user_id']."'>

                <div class='modal-dialog modal-sm'>

                <div class='modal-content'>

                    <div class='modal-header'>

                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>

                        <span aria-hidden='true'>×</span></button>

                    <h4 class='modal-title'>Confirmation</h4>

                    </div>

                    <div class='modal-body'>

                    <center><h3>Delete ".$fetch['fname']."?</h3></center>

                    </div>

                    <div class='modal-footer'>

                    <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Close</button>

                    <a href='function/function_crud.php?user-del=".$fetch['user_id']."' class='btn btn-danger'>Delete</a>

                    </div>

                </div>

                </div>

            </div>";

                  $i=$i+1;

        }

    }

}

function get_feedback($con) {

  $sql = "SELECT * FROM `feedback`";

  $query = mysqli_query($con, $sql);

  $i = 1;

  if (mysqli_num_rows($query) > 0) {

      while ($fetch = mysqli_fetch_assoc($query)) {

          echo "

                <tbody>

                    <tr>

                    <td>".$i."</td>

                    <td>".$fetch['name']."</td>

                    <td>".$fetch['description']."</td>

                    <td><button type='button' data-toggle='modal' data-target='#modal-delete-".$fetch['feedback_id']."' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button></td>

                    </tr>

                </tbody>";



        echo "<div class='modal fade in' id='modal-delete-".$fetch['feedback_id']."'>

                <div class='modal-dialog modal-sm'>

                <div class='modal-content'>

                    <div class='modal-header'>

                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>

                        <span aria-hidden='true'>×</span></button>

                    <h4 class='modal-title'>Confirmation</h4>

                    </div>

                    <div class='modal-body'>

                    <center><h3>Are you sure</center>

                    </div>

                    <div class='modal-footer'>

                    <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Close</button>

                    <a href='function/function_crud.php?feedback-del=".$fetch['feedback_id']."' class='btn btn-danger'>Delete</a>

                    </div>

                </div>

                </div>

            </div>";

                $i=$i+1;

      }

  }else{

      echo "no data";

  }



}



function count_me($con, $status) {

   $sql = "SELECT * FROM reservation WHERE status = '$status'";

   $query = mysqli_query($con, $sql);

   $count = mysqli_num_rows($query);

   echo $count;

}

function count_me2($con) {

    $sql = "SELECT * FROM reservation";

    $query = mysqli_query($con, $sql);

    $count = mysqli_num_rows($query);

    echo $count;

 }

