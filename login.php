<?php include 'inc/header.php'; ?>

        <!-- header end-->
        <main class="main">

            <!-- promo end-->
            <!-- section start-->
            <section class="section background--gray">


                <div class="container">
                    <div class="row offset-margin">
                        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-0 col-xl-6 margin-bottom">
                            <form class="form account-form sign-in-form" action="" method="post">
                                <div class="form__fieldset">

                                    <?php
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
                                        $customerLog = $cmr->customerLogin($_POST);
                                    }
                                    ?>

                                    <h6 class="form__title">Sign In</h6>
                                    <div class="row">
                                        <div class="col-12">
                                            <input class="form__field" type="text" name="email" placeholder="Email"/>
                                            <input class="form__field" type="password" name="pass" placeholder="Password"/>
                                        </div>

                                        <div class="col-12">
                                            <button class="form__button form__submit" name="login" type="submit">Sign In</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
                            $customerReg = $cmr->customerRegistration($_POST);
                        }
                        ?>
                        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-0 col-xl-6 margin-bottom">
                            <form class="form account-form sign-up-form" action="" method="post">
                                <div class="form__fieldset">

                                    <?php
                                    if (isset($customerReg)){
                                        echo $customerReg;
                                    }
                                    ?>
                                    <h6 class="form__title">Sign Up</h6>

                                    <div class="row">
                                        <div class="col-12">
                                            <input class="form__field" type="text" name="name" placeholder="Full Name"/>
                                            <input class="form__field" type="email" name="email" placeholder="Email"/>
                                            <input class="form__field" type="text" name="phone" placeholder="Phone"/>
                                            <input class="form__field" type="password" name="pass" placeholder="Password"/>
                                        </div>

                                        <div class="col-12">
                                            <button class="form__button form__submit" type="submit" name="register">Sign Up</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
            <!-- section end-->
        </main>
<?php include 'inc/footer.php'?>