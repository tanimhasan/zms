<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
include_once '../classes/Appointment.php';
    $app = new Appointment();
    $fm = new Format();
?>

<?php
if (isset($_GET['delapp'])){
    $id = preg_replace("/[^a-zA-Z0-9]+/", "", $_GET['delapp']);
    $delApp = $app->delAppointment($id);
}
?>
<?php
if (isset($_GET['conapp'])){
    $id = preg_replace("/[^a-zA-Z0-9]+/", "", $_GET['conapp']);
    $conApp = $app->conAppointment($id);
}
?>

<style>
    th{text-align: left;}
</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>View Appointment</h2>

                <?php
                if (isset($conApp)){
                    echo $conApp;
                }
                ?>

                <?php
                if (isset($delApp)){
                    echo $delApp;
                }
                ?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>SL</th>
							<th>Name</th>
							<th>Email & Phone No</th>
                            <th>Appointment Time</th>
                            <th>Animal Name & Age</th>
                            <th>Animal Problem</th>
							<th>Doctor Name</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                    <?php
                        $getApp = $app->getAppointment();
                        if ($getApp){
                            $i = 0;
                            while ($result = $getApp->fetch_assoc()){
                                $i++;
                    ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
                            <td><?php echo $result['owner_name'];?></td>
                            <td><?php echo $result['owner_email'];?><br><?php echo $result['owner_phone'];?></td>
                            <td><?php echo $fm->formatDate($result['choose_date']);?><br><?php echo $result['choose_time'];?></td>
                            <td><?php echo $result['pet_name'];?><br>Age: <?php echo $result['pet_age'];?></td>
                            <td><?php echo $result['pet_problem'];?></td>
                            <td><?php echo $result['choose_doctor'];?></td>
                            <?php
                            if ($result['status'] == '1'){ ?>
                                <td>Approved</td>
                            <?php } else{ ?>
                                <td>Pending</td>
                            <?php } ?>

                            <?php
                                if ($result['status'] == '0'){ ?>
                                    <td><a onclick="return confirm('Are You Sure To Confirm?')" href="?conapp=<?php echo $result['app_id'];?>"><span style='color: #4CAF50;'>Confirm</span></a></td>
                            <?php } else{ ?>
                                    <td><a onclick="return confirm('Are You Sure To Delete?')" href="?delapp=<?php echo $result['app_id'];?>"><span style='color: red;'>Delete</span></a></td>
                            <?php } ?>

						</tr>
                    <?php }} ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
