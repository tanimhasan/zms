<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Animal.php';?>
<?php
$animal = new Animal();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $insertAnimal = $animal->insertAnimal($_POST, $_FILES);
}
?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Add New Animal</h2>
            <div class="block copyblock">
                <?php
                if (isset($insertAnimal)){
                    echo $insertAnimal;
                }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Animal Name" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td><br>
                                <label>Animal Image</label><br>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td><br>
                                <input type="number" name="cageNumber" placeholder="Enter Cage Number" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td><br>
                                <textarea style="width: 70%; height: 100px;" name="description" placeholder="Enter Description of Animal"></textarea>
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