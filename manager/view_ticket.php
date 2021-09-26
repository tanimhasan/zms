<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
include_once '../classes/Ticket.php';
    $ticket = new Ticket();
    $fm = new Format();
?>
<?php
if (isset($_GET['deltic'])){
    $id = preg_replace("/[^a-zA-Z0-9]+/", "", $_GET['deltic']);
    $delTic = $ticket->delTicket($id);
}
?>
<?php
if (isset($_GET['contic'])){
    $id = preg_replace("/[^a-zA-Z0-9]+/", "", $_GET['contic']);
    $conTic = $ticket->conTicket($id);
}
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
                            <th>Status</th>
                            <th>Action</th>
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

                            <?php
                            if ($result['status'] == '1'){ ?>
                                <td>Approved</td>
                            <?php } else{ ?>
                                <td>Pending</td>
                            <?php } ?>

                            <?php
                            if ($result['status'] == '0'){ ?>
                                <td><a onclick="return confirm('Are You Sure To Confirm?')" href="?contic=<?php echo $result['id'];?>"><span style='color: #4CAF50;'>Confirm</span></a></td>
                            <?php } else{ ?>
                                <td><a onclick="return confirm('Are You Sure To Delete?')" href="?deltic=<?php echo $result['id'];?>"><span style='color: red;'>Delete</span></a></td>
                            <?php } ?>
						</tr>
                    <?php }} ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
