<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Doctor.php';?>
<?php
$doctor = new Doctor();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $insertDoctor = $doctor->insertDoctor($_POST);
}
?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Add New Doctor</h2>
            <div class="block copyblock">
                <?php
                if (isset($insertDoctor)){
                    echo $insertDoctor;
                }
                ?>
                <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Doctor Name" class="medium" />
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
                                <select class="form__select" name="category">
                                    <option>Select Category</option>
                                    <option value="Veterinary Surgeon">Veterinary Surgeon</option>
                                    <option value="Veterinary Medicine">Veterinary Medicine</option>
                                    <option value="Veterinary Physician">Veterinary Physician</option>
                                    <option value="Vet Dentist">Vet Dentist</option>
                                </select>
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