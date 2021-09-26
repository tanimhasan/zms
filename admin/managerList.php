<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
include_once '../classes/Manager.php';
$manager = new Manager();
$fm = new Format();
?>
<?php
$app = new Manager();
if (isset($_GET['delmanager'])){
    $id = $_GET['delmanager'];
    $id = preg_replace("/[^a-zA-Z0-9]+/", "", $_GET['delmanager']);
    $delManager = $app->delManager($id);
}
?>

<style>
    th{text-align: left;}
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Manager List</h2>

        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Manager Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $getManager = $manager->getAllManager();
                if ($getManager){
                    $i = 0;
                    while ($result = $getManager->fetch_assoc()){
                        $i++;
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i;?></td>
                            <td><?php echo $result['managerName'];?></td>
                            <td><?php echo $result['email'];?></td>
                            <td><?php echo $result['phone'];?></td>
                            <td><a href="manageredit.php?managerid=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are You Sure To Delete?')" href="?delmanager=<?php echo $result['id'];?>">Delete</a></td>
                        </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'inc/footer.php';?>

