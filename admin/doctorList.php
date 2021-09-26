<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
include_once '../classes/Doctor.php';
$Doctor = new Doctor();
$fm = new Format();
?>
<?php
$app = new Doctor();
if (isset($_GET['delDoctor'])){
    $id = $_GET['delDoctor'];
    $id = preg_replace("/[^a-zA-Z0-9]+/", "", $_GET['delDoctor']);
    $delDoctor = $app->delDoctor($id);
}
?>

<style>
    th{text-align: left;}
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Doctor List</h2>

        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Doctor Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Category</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $getDoctor = $Doctor->getAllDoctor();
                if ($getDoctor){
                    $i = 0;
                    while ($result = $getDoctor->fetch_assoc()){
                        $i++;
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i;?></td>
                            <td><?php echo $result['name'];?></td>
                            <td><?php echo $result['email'];?></td>
                            <td><?php echo $result['phone'];?></td>
                            <td><?php echo $result['category'];?></td>
                        </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'inc/footer.php';?>

