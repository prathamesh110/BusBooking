<?php
include("connection.php");
$lemail = $_POST['lemail'];
$lpass = $_POST['lpassword'];
?>

<form method="post" class="was-validated" action="includes/adminpannel.php"  id="adminloginform"><?php
    if (!empty($lemail)) {
    	$sesql = 'SELECT * From admin_login WHERE email = ?';
    	$sestmt = $pdo->prepare($sesql);
    	$sestmt->execute([$lemail]);
    	$lerow_count = $sestmt->rowCount();
    	if ($lerow_count > "0") {
    		if (!empty($lpass)) {
                $spsql = "SELECT * From admin_login WHERE password LIKE ?";
    	        $spstmt = $pdo->prepare($spsql);
    	        $spstmt->execute([$lpass]);
    	        $lprow_count = $spstmt->rowCount();
    			if ($lprow_count > "0") {  ?>
                    <h2></h2>
                    <br>
                    <button type="submit" class="btn btn-primary" id="albtn" name="albtn">Log In</button> <?php 
    			}
    			else{ ?>
                    <h2><?php echo "Invalid Crendentials!!" ?> </h2>
                    <br>
                    <button type="button" class="btn btn-primary" onclick="loginValidate()"  id="albtn" name="albtn">Log In</button> <?php
    			}
    		}
    		else{ ?>
                <h2><?php echo "Please Enter Password!" ?> </h2>
                <br>
                <button type="button" class="btn btn-primary" onclick="loginValidate()"  id="albtn" name="albtn">Log In</button> <?php
            } 
    	}
    	else{?>
            <h2><?php echo "Invalid Email!" ?> </h2>
            <br>
            <button type="button" class="btn btn-primary" onclick="loginValidate()"  id="albtn" name="albtn">Log In</button> <?php
        } 
    }
    else{ ?>
        <h2><?php echo "Please Enter Email!" ?> </h2>
        <br>
        <button type="button" class="btn btn-primary" onclick="loginValidate()"  id="albtn" name="albtn">Log In</button> <?php
    } ?>
</form>