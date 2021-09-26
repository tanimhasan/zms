<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
include_once '../classes/Ticket.php';
    $ticket = new Ticket();
    $fm = new Format();
?>
<style>
    th{text-align: left;}
</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>View Ticket</h2>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>SL</th>
							<th>Name</th>
							<th>Email & Phone No</th>
                            <th>Booking Time</th>
                            <th>Pay Number</th>
                            <th>Sent Number</th>
                            <th>Total Ticket</th>
						</tr>
					</thead>
					<tbody>
                    <?php
                        $getTicket = $ticket->getAllTicket();
                        if ($getTicket){
                            while ($result = $getTicket->fetch_assoc()){
                    ?>
						<tr class="odd gradeX">
							<td><?php echo $result['id'];?></td>
                            <td><?php echo $result['name'];?></td>
                            <td><?php echo $result['email'];?><br><?php echo $result['phone'];?></td>
                            <td><?php echo $fm->formatDate($result['booking_date']);?></td>
                            <td><?php echo $result['pay_number'];?></td>
                            <td><?php echo $result['sent_number'];?></td>
                            <td>Adult: <?php echo $result['adult_num'];?><br>Child: <?php echo $result['child_num'];?></td>

						</tr>
                    <?php }} ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
