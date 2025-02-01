<?php
    session_start();
    include "db/connection.php";
    include "function/function_get.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Reservation</title>
    <link rel="stylesheet" href="css/designE.css">
    <link rel="stylesheet" href="css/heart.css">
    <link rel="stylesheet" href="css/coret.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="css/toastr.css">
    <link rel="stylesheet" href="css/swiper.css"/>

    <style>
        html, body {
            position: relative;
            height: 100%;
        }
        body {
            background: #eee;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
        }
        .swiper {
            width: 100%;
            height: 100%;
        }
        .swiper-slide {
            text-align: center;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .feedbackbtn2{
            position:fixed;
            right: 0;
            bottom: 0;
            right: 10px;
            bottom: 55px;
            z-index: 999;
        }
        /* typography */
        h1 {
            text-align:center;
            margin-bottom:-20px !important;
        }
        p {
            font-style:italic;
        }
    </style>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/adminlte.min.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/dataTables.responsive.min.js"></script>
    <script src="js/responsive.bootstrap4.min.js"></script>
    <script src="js/dataTables.buttons.min.js"></script>
    <script src="js/toastr.min.js"></script>
    <script>
        $(function name(params) {
            $("#table-cottage").hide();
            $("#btn-check").on("click", function name(params) {
                $(this).fadeOut();
                $("#table-cottage").show();
            })
        })
    </script>
    <script src="js/swiper.js"></script>

</head>
<body class="layout-top-nav">
    <div class="wrapper">

        <?php include "shared/header.php"?>

        <div class="content-wrapper">
            <div>
                <!-- Home-->
                <?php include "view/home.php"?>
                <!-- GALLERY PAGE -->
                <?php include "view/gallery.php"?>
                <!-- RESERVATION PAGE -->
                <?php include "view/reservation.php"?>
                <!-- CART PAGE -->
                <?php include "view/cart.php"?>
                <!-- MY-RESERVE PAGE -->
                <?php include "view/my-reserve.php"?>
            </div>
            
        </div>

        <form method="post" action="function/function_crud.php">
            <div class="modal fade in" id="modal-feedback2">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Give Feedback</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>What is your Name? (Optional)</label>
                                <input type="text" class="form-control" rows="3" placeholder="Enter ..." name="name">
                            </div>
                            <div class="form-group">
                                <label>How's your experience?</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..." name="message" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="btnFeedback">Submit Feedback</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </from>


        <?php include "shared/footer.php"?>
    </div>
    
    <script>
        $("#regu").modal("show");

        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
            },
        });
        $("body").on("click",".view", function (e) {
            e.preventDefault();
            let res_id = $(this).attr("id");
            $.ajax({
                url: "function/view.php",
                type: "POST",
                data: {res_id: res_id},
                cache: false,
                success: function (result) {
                $("div#view-reserve").html(result);
                }
            });
        });
        <?php
            if (isset($_SESSION["notify"])) {
                if ($_SESSION["notify"]=="success-reg") {?>
                    toastr.success('Data successfully Registered.', 'Success Registration!', 
                    {positionClass: 'toast-bottom-right',
                        timeOut: 5000,  
                        titleClass: 'toast-title',   
                        messageClass: 'toast-message', 
                        target: 'body',
                        newestOnTop: true,
                        preventDuplicates: false,
                        progressBar: true
                    })
                <?php }
                if ($_SESSION["notify"]=="success-reserve") {?>
                    toastr.success('Reservation Added to Cart.', 'Success Added!', 
                    {positionClass: 'toast-bottom-right',
                        timeOut: 5000,  
                        titleClass: 'toast-title',   
                        messageClass: 'toast-message', 
                        target: 'body',
                        newestOnTop: true,
                        preventDuplicates: false,
                        progressBar: true
                    })
                <?php }
                if ($_SESSION["notify"]=="success-update") {?>
                    toastr.success('Detail Successfully Updated.', 'Success Update!', 
                    {positionClass: 'toast-bottom-right',
                        timeOut: 5000,  
                        titleClass: 'toast-title',   
                        messageClass: 'toast-message', 
                        target: 'body',
                        newestOnTop: true,
                        preventDuplicates: false,
                        progressBar: true
                    })
                <?php }
                if ($_SESSION["notify"]=="login") {?>
                    toastr.success('Welcome!', 'Successfully Log In!', 
                    {positionClass: 'toast-bottom-right',
                        timeOut: 5000,  
                        titleClass: 'toast-title',   
                        messageClass: 'toast-message', 
                        target: 'body',
                        newestOnTop: true,
                        preventDuplicates: false,
                        progressBar: true
                    })
                <?php }
                if ($_SESSION["notify"]=="success-feedback") {?>
                    toastr.success('Your Feedback Successfully Save.', 'Success Save!',
                    {positionClass: 'toast-bottom-right',
                        timeOut: 5000,  
                        titleClass: 'toast-title',   
                        messageClass: 'toast-message', 
                        target: 'body',
                        newestOnTop: true,
                        preventDuplicates: false,
                        progressBar: true
                    })
                <?php }
                if ($_SESSION["notify"]=="success") {?>
                    toastr.success('Successfully Delete.', 'Success Action!',
                    {positionClass: 'toast-bottom-right',
                        timeOut: 5000,  
                        titleClass: 'toast-title',   
                        messageClass: 'toast-message', 
                        target: 'body',
                        newestOnTop: true,
                        preventDuplicates: false,
                        progressBar: true
                    })
                <?php }
                if ($_SESSION["notify"]=="invalidU") {?>
                    toastr.error('Retype your username.', 'Invalid Username!', 
                    {positionClass: 'toast-top-right',
                        timeOut: 5000,  
                        titleClass: 'toast-title',   
                        messageClass: 'toast-message', 
                        target: 'body',
                        newestOnTop: true,
                        preventDuplicates: false,
                        progressBar: true
                    })
                <?php }
                if ($_SESSION["notify"]=="invalidP") {?>
                    toastr.error('Retype your password.', 'Invalid Password!', 
                    {positionClass: 'toast-top-right',
                        timeOut: 5000,  
                        titleClass: 'toast-title',   
                        messageClass: 'toast-message', 
                        target: 'body',
                        newestOnTop: true,
                        preventDuplicates: false,
                        progressBar: true
                    })
                <?php }
                if ($_SESSION["notify"]=="ferson-error") {?>
                    toastr.error('Check your input.', 'Invalid Action!', 
                    {positionClass: 'toast-bottom-right',
                        timeOut: 5000,  
                        titleClass: 'toast-title',   
                        messageClass: 'toast-message', 
                        target: 'body',
                        newestOnTop: true,
                        preventDuplicates: false,
                        progressBar: true
                    })
                <?php }
                if ($_SESSION["notify"]=="cancel") {?>
                    toastr.error('', 'Cancelled success!', 
                    {positionClass: 'toast-bottom-right',
                        timeOut: 5000,  
                        titleClass: 'toast-title',   
                        messageClass: 'toast-message', 
                        target: 'body',
                        newestOnTop: true,
                        preventDuplicates: false,
                        progressBar: true
                    })
            <?php }
            unset($_SESSION["notify"]); }
        ?>
        
        $(".btn-check").on("click", function name(params) {
            $.ajax({
                method: "POST",
                url: "function/get_res.php",
                data: $("#check-avail-form").serialize(),
                cache: false,
                timeOut: 5000,
                beforeSend: function name(params) {
                    $(".btn-check").text("Checking Please wait...")
                },
                success: function (result) {
                    $(".res").html(result);
                    $(".btn-check").text("Check Availability")
                }
            })
        })

        <?php if (isset($_GET["home"])) {?>
            $("#home").addClass("active");
        <?php }?>
        <?php if (isset($_GET["reservation"])) {?>
            $("#reserve").addClass("active");
        <?php }?>
        <?php if (isset($_GET["cart"])) {?>
            $("#cart").addClass("active");
        <?php }?>

        let modalId = $('#image-gallery');

        $(document)
        .ready(function () {
        
            loadGallery(true, 'a.thumbnail');

            //This function disables buttons when needed
            function disableButtons(counter_max, counter_current) {
            $('#show-previous-image, #show-next-image')
                .show();
                if (counter_max === counter_current) {
                    $('#show-next-image')
                    .hide();
                } else if (counter_current === 1) {
                    $('#show-previous-image')
                    .hide();
                }
            }

        function loadGallery(setIDs, setClickAttr) {
        let current_image,
            selector,
            counter = 0;

        $('#show-next-image, #show-previous-image')
            .click(function () {
            if ($(this)
                .attr('id') === 'show-previous-image') {
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
            });

        function updateGallery(selector) {
            let $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-title')
            .text($sel.data('title'));
            $('#image-gallery-image')
            .attr('src', $sel.data('image'));
            disableButtons(counter, $sel.data('image-id'));
        }

        if (setIDs == true) {
            $('[data-image-id]')
            .each(function () {
                counter++;
                $(this)
                .attr('data-image-id', counter);
            });
        }
        $(setClickAttr)
            .on('click', function () {
            updateGallery($(this));
            });
        }
    });

// // build key actions
// $(document)
//   .keydown(function (e) {
//     switch (e.which) {
//       case 37: // left
//         if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
//           $('#show-previous-image')
//             .click();
//         }
//         break;

//       case 39: // right
//         if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
//           $('#show-next-image')
//             .click();
//         }
//         break;

//       default:
//         return; // exit this handler for other keys
//     }
//     e.preventDefault(); // prevent the default action (scroll / move caret)
//   });
    </script>
</body>
</html>