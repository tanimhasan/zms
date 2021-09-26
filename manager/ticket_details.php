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
                <h2>Sold Ticket Details</h2>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>SL</th>
							<th>Date</th>
                            <th>Total Sold Ticket</th>
						</tr>
					</thead>
					<tbody>
                    <?php
                        $getTicket = $ticket->soldTicket();
                        if ($getTicket){
                            $i = 0;
                            while ($result = $getTicket->fetch_assoc()){
                                $i++;
                    ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
                            <td><?php echo $fm->formatDate($result['booking_date']);?></td>
                            <td>Adult: <?php echo $result['total_adult'];?><br>Child: <?php echo $result['total_child'];?></td>


						</tr>
                    <?php }} ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
