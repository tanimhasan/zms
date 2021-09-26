<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
include_once '../classes/Appointment.php';
    $app = new Appointment();
    $fm = new Format();
?>
<style>
    th{text-align: left;}
</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>View Appointment</h2>

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
						</tr>
					</thead>
					<tbody>
                    <?php
                        $getApp = $app->getAppointment();
                        if ($getApp){
                            while ($result = $getApp->fetch_assoc()){
                    ?>
						<tr class="odd gradeX">
							<td><?php echo $result['app_id'];?></td>
                            <td><?php echo $result['owner_name'];?></td>
                            <td><?php echo $result['owner_email'];?><br><?php echo $result['owner_phone'];?></td>
                            <td><?php echo $fm->formatDate($result['choose_date']);?><br><?php echo $result['choose_time'];?></td>
                            <td><?php echo $result['pet_name'];?><br>Age: <?php echo $result['pet_age'];?></td>
                            <td><?php echo $result['pet_problem'];?></td>
                            <td><?php echo $result['choose_doctor'];?></td>

						</tr>
                    <?php }} ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
