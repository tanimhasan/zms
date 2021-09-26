<?php include "inc/header.php" ?>
<?php include "lib/connection.php" ?>


    <main class="main">




        <!-- section start-->
        <section class="section checkout" style="padding-top: 100px;">
            <div class="container">
                <h2 class="text-center">Change Booking Date</h2>
                <?php
                if(isset($_POST["submit"])){
                    $user_id = $_POST['user_id'];

                    $booking_date = $_POST['booking_date'];



                    if(empty($booking_date))
                    {
                        $error_msg="Please Choose Date";
                    }

                    else

                    {
                        $query = "UPDATE tickets
                        SET
                        booking_date = '$booking_date'
                        WHERE user_id = '$user_id'
                        ";
                        mysqli_query($db,$query);
                        $run= $success_msg="Successfully Submitted";
                        echo '<script type="text/javascript"> window.location.assign("view_ticket.php") </script>';

                    }
                }

                ?>
                <div class="row">
                    <div class="col-12">
                        <!-- checkout start-->
                        <form class="form checkout-form" action="" method="post">
                            <div class="row">
                                <div class="col-lg-5 col-xl-2">
                                </div>
                                <div class="col-lg-7 col-xl-8">
                                    <div class="checkout__wrapper">
                                        <div class="form__fieldset">
                                            <input class="form__field" type="hidden" name="user_id" value="<?php
                                            $cmrId = Session::get("cmrId");
                                            echo $cmrId;?>"/>
                                            <div class="form__fieldset no-margin-bottom">
                                                <div class="row offset-30">
                                                    <div class="col-md-6"><br>
                                                        <strong>Choose Date</strong>
                                                        <label></label>
                                                        <input class="form__field" type="date" name="booking_date"/>
                                                    </div>

                                                </div><br>
                                                <button class="form__submit" name="submit" type="submit">Change Date</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-xl-2">
                                        </div>

                                    </div>

                                    <?php
                                    if(isset($error_msg)){echo '<script>alert("'.$error_msg.'")</script>';}
                                    if(isset($success_msg)){echo '<script>alert("'.$success_msg.'")</script>';}

                                    ?>
                        </form>
                        <!-- checkout end-->
                    </div>
                </div>
            </div>
        </section>
        <!-- section end-->


    </main>

<?php include "inc/footer.php" ?>