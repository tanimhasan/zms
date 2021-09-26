<?php include '../classes/Managerlogin.php';?>

<?php
    $ml = new Managerlogin();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $managerName = $_POST['managerName'];
        $managerPass = $_POST['password'];

        $loginCheck = $ml->managerLogin($managerName,$managerPass);
    }
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Manager Login</h1>
            <span style="color: red; font-size: 18px;">
            <?php
                if (isset($loginCheck)){
                    echo $loginCheck;
                }
            ?>
            </span>
			<div>
				<input type="text" placeholder="Managername" name="managerName"/>
			</div>
			<div>
				<input type="password" placeholder="Password" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>