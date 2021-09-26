<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
include_once '../classes/Food.php';
$food = new Food();
$fm = new Format();
?>

<style>
    th{text-align: left;}
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Stock Food</h2>

        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Food Name</th>
                    <th>Quantity</th>
                    <th>Weight</th>
                    <th>Category</th>
                    <th>Cost</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $getFood = $food->getAllFood();
                if ($getFood){
                    while ($result = $getFood->fetch_assoc()){
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $result['id'];?></td>
                            <td><?php echo $result['name'];?></td>
                            <td><?php echo $result['quantity'];?></td>
                            <td><?php echo $result['weight'];?></td>
                            <td><?php echo $result['category'];?></td>
                            <td><?php echo $result['cost'];?></td>
                        </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'inc/footer.php';?>

