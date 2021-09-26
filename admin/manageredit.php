<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Manager.php';?>
<?php
if (!isset($_GET['managerid']) || $_GET['managerid'] == NULL){
    echo "<script>window.location = 'managerlist.php';</script>";
}else{
    $id = $_GET['managerid'];
    $id = preg_replace("/[^a-zA-Z0-9]+/", "", $_GET['managerid']);
}
?>

<?php
$manager = new Manager();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $updateManager = $manager->managerUpdate($_POST, $id);
}
?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Edit Manager</h2>
            <div class="block copyblock">
                <?php
                if (isset($updateManager)){
                    echo $updateManager;
                }
                ?>
                <?php
                $getManager = $manager->getManager($id);
                if ($getManager){
                    while ($value = $getManager->fetch_assoc()){
                ?>

                <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="managerName" value="<?php echo $value['managerName'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td><br>
                                <input type="email" name="email" value="<?php echo $value['email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td><br>
                                <input type="tel" name="phone" value="<?php echo $value['phone'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td><br>
                                <input type="password" name="password" value="<?php echo $value['password'];?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td><br>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                </form>
                <?php }} ?>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?>