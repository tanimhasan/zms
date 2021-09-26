<?php include "inc/header.php" ?>
<?php include "lib/connection.php" ?>


<main class="main">




    <!-- section start-->
    <section class="section checkout" style="padding-top: 100px;">
        <div class="container">
            <h2 class="text-center">Online Appointment</h2>
            <?php
            if(isset($_POST["submit"])){
                $user_id = $_POST['user_id'];
                $owner_name = $_POST['owner_name'];
                $owner_phone = $_POST['owner_phone'];
                $owner_email = $_POST['owner_email'];
                $pet_name = $_POST['pet_name'];
                $pet_age = $_POST['pet_age'];
                $pet_problem = $_POST['pet_problem'];
                $choose_date = $_POST['choose_date'];
                $choose_time = $_POST['choose_time'];
                $choose_doctor = $_POST['choose_doctor'];


                if(empty($owner_name))
                {
                    $error_msg="Please Enter Owner Name";
                }
                elseif(empty($owner_phone))
                {
                    $error_msg="Please Enter Owner Phone Number";
                }
                elseif(empty($owner_email))
                {
                    $error_msg="Please Provide Owner Gmail/Email";
                }
                elseif(empty($pet_name))
                {
                    $error_msg="Please Enter Pet Name";
                }
                elseif(empty($pet_age))
                {
                    $error_msg="Please Provide Pet Age";
                }
                elseif(empty($pet_problem))
                {
                    $error_msg="Please Provide pet_problem";
                }
                elseif(empty($choose_date))
                {
                    $error_msg="Please choose_date";
                }
                elseif(empty($choose_time))
                {
                    $error_msg="Please choose_time";
                }
                elseif(empty($choose_doctor))
                {
                    $error_msg="Please choose_doctor";
                }

                else

                { $query="INSERT INTO appointments(user_id,owner_name,owner_phone,owner_email,pet_name,pet_age,pet_problem,choose_date,choose_time,choose_doctor)     
	                            VALUES('$user_id','$owner_name','$owner_phone','$owner_email','$pet_name','$pet_age','$pet_problem','$choose_date','$choose_time','$choose_doctor')" ;
                    mysqli_query($db,$query);
                    $run= $success_msg="Successfully Submitted";



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
                                        <div class="row offset-30">
                                            <div class="col-md-12">
                                                <input class="form__field" type="text" name="owner_name" placeholder="Pet Owner Name"/>
                                                <input class="form__field" type="hidden" name="user_id" value="<?php
$cmrId = Session::get("cmrId");
echo $cmrId;?>"/>
                                            </div>
                                            <div class="col-md-12">
                                                <input class="form__field" type="tel" name="owner_phone" placeholder="Pet Owner Phone"/>
                                            </div>
                                            <div class="col-md-12">
                                                <input class="form__field" type="email" name="owner_email" placeholder="Pet Owner Email"/>
                                            </div>
                                            <div class="col-md-12">
                                                <input class="form__field" type="text" name="pet_name" placeholder="Pet Name"/>
                                            </div>
                                            <div class="col-md-12">
                                                <input class="form__field" type="text" name="pet_age" placeholder="Pet Age"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form__fieldset">

                                        <div class="row offset-30">
                                            <div class="col-12">
                                                <textarea class="form__field form__message" name="pet_problem" placeholder="Pet Problem Summary"></textarea>
                                        </div>
                                    </div>
                                    <div class="form__fieldset no-margin-bottom">
                                        <div class="row offset-30">
                                            <div class="col-md-6"><br>
                                                <strong>Choose Date</strong>
                                                <label></label>
                                                <input class="form__field" type="date" name="choose_date"/>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <strong>Choose Time</strong>
                                                        <select class="form__select" name="choose_time">
                                                            <option>Select Time</option>
                                                            <option value="10am to 12am">10am to 12am</option>
                                                            <option value="7pm to 9pm">7pm to 9pm</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <strong>Choose Doctor</strong>
                                                        <select class="form__select" name="choose_doctor">
                                                            <option>Select Doctor</option>
                                                            <option value="Dr. Sujay S Gowda">Dr. Sujay S Gowda</option>
                                                            <option value="Dr. Deepshikha Singh">Dr. Deepshikha Singh</option>
                                                            <option value="Dr. Vikas Mahajan">Dr. Vikas Mahajan</option>
                                                            <option value="Dr. Vinayaka">Dr. Vinayaka</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                    </div><br>
                                    <button class="form__submit" name="submit" type="submit">Book Appointment</button>
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