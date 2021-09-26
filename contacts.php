<?php include "inc/header.php" ?>
<?php include "lib/connection.php" ?>

<main class="main">
				<!-- promo start-->
				<section class="promo-primary">
					<picture>
						<source srcset="img/contacts.jpg" media="(min-width: 992px)"/><img class="img--bg" src="img/contacts.jpg" alt="img"/>
					</picture>
					<div class="container">
						<div class="row">
							<div class="col-auto">
								<div class="align-container">
									<div class="align-container__item"><span class="promo-primary__pre-title">ZooPark</span>
										<h1 class="promo-primary__title"><span>Our</span> <span>Contacts</span></h1>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- promo end-->
				<!-- section start-->
				<section class="section">
					<div class="container">
						<div class="row bottom-50">
							<div class="col-12">
								<div class="heading heading--primary heading--center">
									<h2 class="heading__title no-margin-bottom"><span>Get in touch</span> <span>with us</span></h2>
								</div>
							</div>
						</div>

                        <?php
                        if(isset($_POST["submit"])){
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $message = $_POST['message'];


                            if(empty($email))
                            {
                                $error_msg="Please Provide Your Gmail/Email";
                            }

                            else

                            { $query="INSERT INTO contacts(name,email,phone,message)     
	                            VALUES('$name','$email','$phone','$message')" ;
                                mysqli_query($db,$query);
                                $run= $success_msg="Successfully Submitted";



                            }

                        }

                        ?>
						<div class="row">
							<div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
								<form class="form" action="contacts.php" method="post">
									<div class="row">
										<div class="col-12">
											<input class="form__field" type="text" name="name" placeholder="Your Name"/>
										</div>
										<div class="col-12">
											<input class="form__field" type="email" name="email" placeholder="Your Email"/>
										</div>
										<div class="col-12">
											<input class="form__field" type="tel" name="phone" placeholder="Your Phone"/>
										</div>
										<div class="col-12">
											<textarea class="form__field form__message" name="message" placeholder="Text"></textarea>
										</div>
										<div class="col-12 text-center">
											<input class="form__submit" name="submit" type="submit" value="Send"/>
										</div>

									</div>

                                    <?php
                                    if(isset($error_msg)){echo '<script>alert("'.$error_msg.'")</script>';}
                                    if(isset($success_msg)){echo '<script>alert("'.$success_msg.'")</script>';}

                                    ?>
								</form>
							</div>
						</div>
					</div>
				</section>
				<!-- section end-->

			</main>

<?php include "inc/footer.php" ?>
