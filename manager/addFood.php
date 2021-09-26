<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Food.php';?>
<?php
$food = new Food();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $insertFood = $food->foodInsert($_POST);
}
?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Add New Food</h2>
            <div class="block copyblock">
                <?php
                if (isset($insertFood)){
                    echo $insertFood;
                }
                ?>
                <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Food Name" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td><br>
                                <label>Enter Quantity Number: </label><br>
                                <input type="number" name="quantity" placeholder="0" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td><br>
                                <input type="text" name="weight" placeholder="Enter Weight" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td><br>
                                <label for="food">Select Category: </label>

                                <select name="category" style="margin-left: 10px">
                                    <option value="lion">Lion</option>
                                    <option value="tiger">Tiger</option>
                                    <option value="monkeys">Monkeys</option>
                                    <option value="bird">Bird</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><br>
                                <input type="text" name="cost" placeholder="Enter Total Cost" class="medium" />
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