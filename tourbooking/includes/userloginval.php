<?php
session_start();
include("connection.php");
$lemail = $_POST['ulemail'];
$lpass = $_POST['ulpassword'];
$_SESSION["vemail"] = $lemail;
?>

<form method="post" class="was-validated" action="userprofile.php"  id="userloginform"><?php
    if (!empty($lemail)) {
    	$sesql = 'SELECT * From user_login WHERE email = ?';
    	$sestmt = $pdo->prepare($sesql);
    	$sestmt->execute([$lemail]);
    	$lerow_count = $sestmt->rowCount();
    	if ($lerow_count > "0") {
    		if (!empty($lpass)) {
                $spsql = "SELECT * From user_login WHERE password LIKE ?";
    	        $spstmt = $pdo->prepare($spsql);
    	        $spstmt->execute([$lpass]);
    	        $lprow_count = $spstmt->rowCount();
    			if ($lprow_count > "0") {  ?>
                    <h2></h2>
                    <br>
                    <button type="submit" class="btn btn-primary" id="ualbtn" name="ualbtn">Log In</button> <?php 
    			}
    			else{ ?>
                    <h2><?php echo "Invalid Crendentials!!" ?> </h2>
                    <br>
                    <button type="button" class="btn btn-primary" onclick="loginValidate()"  id="ualbtn" name="ualbtn">Log In</button> <?php
    			}
    		}
    		else{ ?>
                <h2><?php echo "Please Enter Password!" ?> </h2>
                <br>
                <button type="button" class="btn btn-primary" onclick="loginValidate()"  id="ualbtn" name="ualbtn">Log In</button> <?php
            } 
    	}
    	else{?>
            <h2><?php echo "Invalid Email!" ?> </h2>
            <br>
            <button type="button" class="btn btn-primary" onclick="loginValidate()"  id="ualbtn" name="ualbtn">Log In</button> <?php
        } 
    }
    else{ ?>
        <h2><?php echo "Please Enter Email!" ?> </h2>
        <br>
        <button type="button" class="btn btn-primary" onclick="loginValidate()"  id="ualbtn" name="ualbtn">Log In</button> <?php
    } ?>
</form>
