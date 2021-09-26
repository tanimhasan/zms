<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
include_once '../classes/Animal.php';
$animal = new Animal();
$fm = new Format();
?>
<?php
$animal = new Animal();
if (isset($_GET['delAnimal'])){
    $id = $_GET['delAnimal'];
    $id = preg_replace("/[^a-zA-Z0-9]+/", "", $_GET['delAnimal']);
    $delAnimal = $animal->delAnimal($id);
}
?>

<style>
    th{text-align: left;}
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Animal List</h2>

        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Animal Name</th>
                    <th>Image</th>
                    <th>Cage Number</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $getAnimal = $animal->getAllAnimal();
                if ($getAnimal){
                    $i = 0;
                    while ($result = $getAnimal->fetch_assoc()){
                        $i++;
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i;?></td>
                            <td><?php echo $result['name'];?></td>
                            <td><img src="<?php  echo $result['image'];?>" width="100" height="100"></td>
                            <td><?php echo $result['cageNumber'];?></td>
                            <td style="width: 300px;"><?php echo $fm->textShorten($result['description'],50);?></td>
                        </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'inc/footer.php';?>

