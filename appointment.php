<?php include "inc/header.php" ?>

<?php
$login = Session::get("cusLogin");
if($login == false){
    echo '<script type="text/javascript"> window.location.assign("login.php") </script>';
}
?>

<style>
    .col-sm-6 .team-item{

        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px;
        height: 550px;
    }

</style>
        <!-- header end-->
        <main class="main">

            <!-- section start-->
            <section class="section elements">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10">
                            <h4 class="elements__title">Animal Doctor's</h4>
                        </div>
                    </div>
                    <div class="row offset-margin">
                        <div class="col-sm-6 col-lg-3">
                            <a href="request_appointment.php"><div class="team-item team-item--style-1">
                                <div class="team-item__img"><img class="img--bg" src="img/team_1.jpg" alt="img"/></div>
                                <div class="team-item__name">Dr. Sujay S Gowda </div>
                                <div class="team-item__position" style="font-weight: bold;">Director of Animal Health</div>
                                <div class="team-item__position">Dr. Sujay S Gowda having 2 years of experience. Dr. Sujay graduated from kvafsu university. Have keen interest in care and management of dogs. Good listener and compassionate about animals.</div>

                                </div></a>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <a href="request_appointment.php"><div class="team-item team-item--style-1">
                                <div class="team-item__img"><img class="img--bg" src="img/team_2.jpg" alt="img"/></div>
                                <div class="team-item__name">Dr. Deepshikha Singh </div>
                                <div class="team-item__position" style="font-weight: bold;">B.V.Sc and A.H. | M.V.Sc - Surgery and Radiology</div>
                                <div class="team-item__position">Dr. Deepshikha Singh having 6 years experience in veterinary medicine and small animal surgery</div>

                                </div></a>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <a href="request_appointment.php"><div class="team-item team-item--style-1">
                                <div class="team-item__img"><img class="img--bg" src="img/team_3.jpg" alt="img"/></div>
                                <div class="team-item__name">Dr. Vikas Mahajan</div>
                                <div class="team-item__position" style="font-weight: bold;">Director of Dental Care</div>
                                <div class="team-item__position">Dr. Vikas Mahajan having 2.5 years of experience. Dr. Vikas Mahajan is skilled to handle and advice best and appropriate treatment options to your lovely pets.</div>

                                </div></a>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <a href="request_appointment.php"><div class="team-item team-item--style-1">
                                <div class="team-item__img"><img class="img--bg" src="img/team_4.jpg" alt="img"/></div>
                                <div class="team-item__name">Dr. Vinayaka</div>
                                <div class="team-item__position" style="font-weight: bold;">B.V.Sc and A.H. | M.V.Sc - Radiology | M.V.Sc - Surgery</div>
                                <div class="team-item__position">Dr. Vinayaka having 2 years of experience. Dr. Vinayaka is skilled to implement effective treatment plans and is happy to serve as a voice for voiceless creatures.</div>

                                </div></a>
                        </div>
                    </div><br><br>

                    <div class="text-center"><a class="button promo-slider__button button--primary" href="request_appointment.php">Request An Appointment</a></div>

                </div>
            </section>
            <!-- section end-->

        </main>

<?php include "inc/footer.php" ?>