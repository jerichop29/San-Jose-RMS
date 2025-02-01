<?php
if (isset($_GET["reservation"])) {
?>
<section>
    <!-- Sliding background Image Area -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
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
    <!-- RESERVATION -->
    <?php
    if (isset($_SESSION["username"])) {
    ?>
        <div class="login-box-body p-absolute-reserve">

            <form id="check-avail-form">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Date of Reservation</label>
                            <input type="date" class="form-control" name="date-res" min="<?php echo date("Y-m-d"); ?>">
                        </div>
                    </div>
                    <div class="col-md-3" style="padding-left: 0;">
                        <div class="form-group">
                            <label for="">Time</label>
                            <select class="form-control" name="timeSlot">
                                <option value="Day (7am to 6pm)">Day (7am to 6pm)</option>
                                <option value="Night (7pm to 6am)">Night (7pm to 6am)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1" style="padding-right: 0;">
                        <div class="form-group">
                            <label for="">Children</label>
                            <input type="number" value="1" min="0" class="form-control" name="child">
                        </div>
                    </div>
                    <div class="col-md-1" style="padding-right: 0;">
                        <div class="form-group">
                            <label for="">Adult</label>
                            <input type="number" value="1" min="0" class="form-control" name="adult">
                        </div>
                    </div>
                    <div class="col-md-2" style="padding-right: 0;">
                        <div class="form-group">
                            <label for="">Type</label>
                            <select class="form-control" name="category">
                                <option value="Cottage">Cottage</option>
                                <option value="Hall">Hall</option>
                                <option value="Room">Room</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="button" class="mt btn btn-success btn-md btn-check" name="btn-chek" value="Check Availability">
                        </div>
                    </div>
                </div>
            </form>

            <!-- SHOW VACANT COTTAGE/HALL -->
            <div class="p-absolute-reserve-result res">

            </div>

        </div>

        <!-- Regulations -->
        <div class="modal fade in" id="regu">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-green">
                        <h4 class="modal-title">Regulations</h4>
                    </div>
                    <div class="modal-body">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio sapiente facilis fugiat odit velit mollitia temporibus repellendus eos nesciunt, modi est exercitationem quas odio enim autem. Maiores officia ipsum modi!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo error eius sit aperiam quisquam exercitationem reprehenderit, libero esse quas ex omnis sed quae veritatis, distinctio nesciunt commodi minima beatae fugit.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione numquam alias blanditiis adipisci enim delectus iure accusamus? Ipsa labore voluptas doloribus et repellendus facilis aspernatur delectus praesentium, consectetur nesciunt exercitationem!</p>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam odit reprehenderit dolorem est unde placeat sit aspernatur veniam labore? Natus magnam et aspernatur inventore dolor eius, nulla aut nobis accusamus!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et iste temporibus qui rem itaque laudantium optio non corrupti, voluptatem maiores praesentium sequi! Libero ex excepturi, provident aperiam accusamus sit minima.</p>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem magnam tempora nulla esse reiciendis vel enim explicabo non id? Ipsa similique optio totam, eveniet assumenda est exercitationem sunt voluptates atque.</p>
                        <input type="checkbox" id="regulations-checkbox" required> I understand the regulations.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="close-modal-btn" data-dismiss="modal" disabled>Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
<script>
    // JavaScript to handle the validation
    document.getElementById('regulations-checkbox').addEventListener('change', function () {
        var checkbox = this;
        var modalCloseBtn = document.getElementById('close-modal-btn');
        modalCloseBtn.disabled = !checkbox.checked;
    });
</script>
<?php
}
?>