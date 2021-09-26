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
        .checkout__wrapper ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: #f1f1f1;
        }
        .checkout__wrapper table, th, td{
            border: 1px solid #000000;
            padding: 10px;
        }

        .checkout__wrapper li a {
            display: block;
            color: #000;
            padding: 8px 16px;
            text-decoration: none;
        }

        .checkout__wrapper li a.active {
            background-color: #4CAF50;
            color: white;
        }

        .checkout__wrapper li a:hover:not(.active) {
            background-color: #555;
            color: white;
        }

    </style>
    <!-- header end-->
    <main class="main">

        <!-- section start-->
        <section class="section checkout" style="padding-top: 100px;">
            <div class="container">
                <h2 class="text-center">My Ticket</h2>

                <div class="row">
                    <div class="col-12">
                        <!-- checkout start-->
                        <div class="row">
                            <div class="col-lg-5 col-xl-4">
                                <div class="checkout__wrapper">
                                    <ul>
                                        <li><a href="profile.php">Profile</a></li>
                                        <li><a href="view_appointment.php">View Appointment</a></li>
                                        <li><a class="active" href="view_ticket.php">View Ticket</a></li>
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
                                    <table class="table" id="example">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Email & Phone No</th>
                                            <th>Booking Time</th>
                                            <th>Adult & Child Ticket Quantity</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $user_id = Session::get("cmrId");
                                        $getTic = $ticket->getTicket($user_id);
                                        if ($getTic){
                                            $i = 0;
                                            while ($result = $getTic->fetch_assoc()){
                                                $i++;
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $i;?></td>
                                                    <td><?php echo $result['name'];?></td>
                                                    <td><?php echo $result['email'];?><br><?php echo $result['phone'];?></td>
                                                    <td><?php echo $fm->formatDate($result['booking_date']);?></td>
                                                    <td>Adult: <?php echo $result['adult_num'];?><br>Child: <?php echo $result['child_num'];?></td>
                                                    <?php
                                                    if ($result['status'] == '1'){ ?>
                                                        <td>Approve</td>
                                                    <?php } else{ ?>
                                                        <td>Pending</td>
                                                    <?php } ?>

                                                    <?php
                                                    if ($result['status'] == '0'){ ?>
                                                        <td><a href="change_app.php"><span style='color: blue;'>Change Date</span></a></td>
                                                    <?php } else{ ?>
                                                        <!--<td><a href="download.php"><span style='color: red;'>Download Ticket</span></a></td>-->
                                                        <td>
                                                            <a href="pdf.php?ticid=<?php echo $result['id'];?>">Download Ticket</a>
                                                        </td>
                                                    <?php } ?>

                                                </tr>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <!-- checkout end-->
                    </div>
                </div>
            </div>
        </section>
        <!-- section end-->

    </main>

<?php include "inc/footer.php" ?>