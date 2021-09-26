<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Manager.php';?>
<?php
$manager = new Manager();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $insertManager = $manager->insertManager($_POST);
}
?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Add New Manager</h2>
            <div class="block copyblock">
                <?php
                if (isset($insertManager)){
                    echo $insertManager;
                }
                ?>
                <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="managerName" placeholder="Enter Manager Name" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td><br>
                                <input type="email" name="email" placeholder="Enter Email" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td><br>
                                <input type="tel" name="phone" placeholder="Enter Phone" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td><br>
                                <input type="password" name="password" placeholder="Enter Password" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td><br>
                                <input type="submit" name="submit" Value="Submit" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?>