<?php include "inc/header.php" ?>

<?php
$login = Session::get("cusLogin");
if($login == false){
    echo '<script type="text/javascript"> window.location.assign("login.php") </script>';
}
?>


<?php
$cmrId = Session::get("cmrId");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $updateCmr = $cmr->customerUpdate($_POST, $cmrId);
}
?>

<style>
    .col-sm-6 .team-item{

        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px;
        height: 550px;
    }
    form ul {
         list-style-type: none;
         margin: 0;
         padding: 0;
         width: 100%;
         background-color: #f1f1f1;
     }

    form li a {
        display: block;
        color: #000;
        padding: 8px 16px;
        text-decoration: none;
    }

    form li a.active {
        background-color: #4CAF50;
        color: white;
    }

    form li a:hover:not(.active) {
        background-color: #555;
        color: white;
    }

</style>
        <!-- header end-->
        <main class="main">

            <!-- section start-->
            <section class="section checkout" style="padding-top: 100px;">
                <div class="container">
                    <h2 class="text-center">My Profile</h2>
<?php
$id = Session::get("cmrId");
$getData = $cmr->getCustomerData($id);
if($getData){
    while($result =$getData->fetch_assoc()){
        ?>
                    <div class="row">
                        <div class="col-12">
                            <!-- checkout start-->
                            <form class="form checkout-form" action="" method="post">
                                <div class="row">
                                    <div class="col-lg-5 col-xl-4">
                                        <div class="checkout__wrapper">
                                            <ul>
                                                <li><a class="active" href="profile.php">Profile</a></li>
                                                <li><a href="view_appointment.php">View Appointment</a></li>
                                                <li><a href="view_ticket.php">View Ticket</a></li>
                                                <?php
                                                if (isset($_GET['action']) && $_GET['action'] == "logout"){
                                                    Session::destroy();
                                                    echo '<script type="text/javascript"> window.location.assign("index.php") </script>';
                                                }
                                                ?>
                                                <li><a href="?action=logout">Logout</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-xl-8">

                                        <div class="checkout__wrapper">
                                            <?php
                                            if(isset($updateCmr)){
                                                echo "<tr><td colspan='2'><h2>".$updateCmr."</h2></td></tr>";
                                            }
                                            ?>
                                            <div class="form__fieldset">
                                                <div class="row offset-30">
                                                    <div class="col-md-12">
                                                        <input class="form__field" type="text" name="name" value="<?php echo $result['name']; ?>">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input class="form__field" type="tel" name="phone" value="<?php echo $result['phone']; ?>"/>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input class="form__field" type="email" name="email" value="<?php echo $result['email']; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="form__submit" name="submit" type="submit">Update</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            <?php
                            }
                            }
                            ?>
                            <!-- checkout end-->
                        </div>
                    </div>
                </div>
            </section>
            <!-- section end-->

        </main>

<?php include "inc/footer.php" ?>