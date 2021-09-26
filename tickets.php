<?php include "inc/header.php" ?>
<?php include "lib/connection.php" ?>


<?php
$login = Session::get("cusLogin");
if($login == false){
    echo '<script type="text/javascript"> window.location.assign("login.php") </script>';
}
?>

<main class="main">

				<!-- section start-->
				<section class="section background--gray" style="padding-bottom: 0px;">
					<div class="container">
						<div class="row bottom-50">
							<div class="col-12">
								<div class="heading heading--primary heading--center"><span class="heading__pre-title">Price</span>
									<h2 class="heading__title no-margin-bottom"><span>Buy</span> <span>online tickets</span></h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-md-4 col-xl-4">
								<div class="pricing-item pricing-item--style-1 text-center pricing-item--white">
									<div class="pricing-item__top">
										<div class="pricing-item__icon">
											<svg class="icon">
												<use xlink:href="#adult"></use>
											</svg>
										</div>
										<div class="pricing-item__subject">Adult (12+ yrs)</div>
										<div class="pricing-item__price"><span>৳ </span><span>100</span></div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-4 col-xl-4">
								<div class="pricing-item pricing-item--style-1 text-center pricing-item--white">
									<div class="pricing-item__top">
										<div class="pricing-item__icon">
											<svg class="icon">
												<use xlink:href="#child"></use>
											</svg>
										</div>
										<div class="pricing-item__subject">Child (4-12 yrs)</div>
										<div class="pricing-item__price"><span>৳ </span><span>50</span></div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-4 col-xl-4">
								<div class="pricing-item pricing-item--style-1 text-center pricing-item--white">
									<div class="pricing-item__top">
										<div class="pricing-item__icon">
											<svg class="icon">
												<use xlink:href="#baby"></use>
											</svg>
										</div>
										<div class="pricing-item__subject">Baby (0-3 yrs)</div>
										<div class="pricing-item__price"><span> </span><span>Free</span></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</section>
				<!-- section end-->


    <!-- section start-->
    <section class="section checkout" style="padding-top: 100px;">
        <div class="container">
            <h2 class="text-center">Buy Tickets</h2>
            <?php
            if(isset($_POST["submit"])){
                $user_id = $_POST['user_id'];
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $pay_number = $_POST['pay_number'];
                $sent_number = $_POST['sent_number'];
                $booking_date = $_POST['booking_date'];
                $adult_num = $_POST['adult_num'];
                $child_num = $_POST['child_num'];


                if(empty($name))
                {
                    $error_msg="Please Enter Your Name";
                }
                elseif(empty($phone))
                {
                    $error_msg="Please Enter Your Phone Number";
                }
                elseif(empty($email))
                {
                    $error_msg="Please Provide Your Gmail/Email";
                }
                elseif(empty($pay_number))
                {
                    $error_msg="Please Provide Your Phone Number";
                }
                elseif(empty($sent_number))
                {
                    $error_msg="Please Provide Your Phone Number";
                }
                elseif(empty($booking_date))
                {
                    $error_msg="Please Provide Booking Date";
                }
                elseif(empty($adult_num))
                {
                    $error_msg="Please Enter Adult ticket Number";
                }

                else

                { $query="INSERT INTO tickets(user_id,name,phone,email,pay_number,sent_number,booking_date,adult_num,child_num)     
	                            VALUES('$user_id','$name','$phone','$email','$pay_number','$sent_number','$booking_date','$adult_num','$child_num')" ;
                    mysqli_query($db,$query);
                    $run= $success_msg="Successfully Submitted";



                }

            }

            ?>
            <div class="row">
                <div class="col-12">
                    <!-- checkout start-->
                    <form class="form checkout-form" action="tickets.php" method="post">
                        <div class="row">
                            <div class="col-lg-5 col-xl-2">
                            </div>
                            <div class="col-lg-7 col-xl-8">
                                <div class="checkout__wrapper">
                                    <div class="form__fieldset">
                                        <div class="row offset-30">
                                            <div class="col-md-12">
                                                <input class="form__field" type="text" name="name" placeholder="Name"/>
                                                <input class="form__field" type="hidden" name="user_id" value="<?php
                                                $cmrId = Session::get("cmrId");
                                                echo $cmrId;?>"/>
                                            </div>
                                            <div class="col-md-12">
                                                <input class="form__field" type="tel" name="phone" placeholder="Phone"/>
                                            </div>
                                            <div class="col-md-12">
                                                <input class="form__field" type="email" name="email" placeholder="Email"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form__fieldset">
                                        <h6 class="form__title">Payment Method</h6>
                                        <div class="row offset-30">
                                            <div class="col-12">
                                                <p> Bkash - 0170 0000000 (Personal Type Account) </p>
                                                <p> Nagad - 0180 0000000 (Personal Type Account) </p>
                                                <p> Rocket- 0167 0000000 (Personal Type Account)</p><br>

                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <strong>Select the number to which you sent money? </strong>
                                                        <select class="form__select" name="pay_number">
                                                            <option>Select Number</option>
                                                            <option value="Bkash - 0170 0000000">Bkash - 0170 0000000</option>
                                                            <option value="Nagad - 0170 0000000">Nagad - 0180 0000000</option>
                                                            <option value="Rocket- 0167 0000000">Rocket- 0167 0000000</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <strong>Enter the phone number from which you sent money:</strong>
                                                        <input class="form__field" type="tel" name="sent_number" placeholder="Phone Number"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form__fieldset no-margin-bottom">
                                        <h6 class="form__title">Ticket Information</h6>
                                        <div class="row offset-30">
                                            <div class="col-md-6">
                                                <label>Booking Date</label>
                                                <input class="form__field" type="date" name="booking_date"/>
                                            </div><div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <label>Adult (100 Tk)</label>
                                                <input class="form__field" type="number" name="adult_num" placeholder="Enter the number of tickets"/>
                                            </div><div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <label>Child (50 Tk)</label>
                                                <input class="form__field" type="number" name="child_num" placeholder="Enter the number of tickets"/>
                                            </div><div class="col-md-6"></div>

                                        </div>
                                    </div>
                                    <button class="form__submit" name="submit" type="submit">Submit</button>
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