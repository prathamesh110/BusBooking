<?php
include("connection.php");
$fullname = $_POST["urname"];
$email = $_POST['uremail'];
$pass = $_POST['urpassword'];
$mobileno = $_POST['urmobileno'];
?>
<form method="post"  class="was-validated" id="registerform"><?php
	if (!empty($fullname)) {
		if(!empty($email)){
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$sql = 'SELECT * FROM user_login WHERE email = ?';
		        $stmt = $pdo->prepare($sql);
		        $stmt->execute([$email]);
		        $admininfos = $stmt->fetchAll();
		        $row_count = $stmt->rowCount();
		        if ($row_count < 1) {
		        	if (!empty($pass)) {
		        		if (strlen($pass) <= "8" && preg_match("#[0-9]+#",$pass) && preg_match("#[A-Z]+#",$pass) && preg_match("#[a-z]+#",$pass)){
		        			if (!empty($mobileno)){
		        				if (strlen($mobileno) == "10") {
		        					$isql = "INSERT INTO user_login (fullname, email, password, mobileno) VALUES(:fullname, :email, :password, :mobileno)";
                                    $istmt = $pdo->prepare($isql);
                                    $istmt->execute(['fullname' => $fullname, 'email' => $email, 'password' => $pass,
                                    'mobileno' => $mobileno]); ?>
                                    <div class="validate"><h2><?php echo "Registiration Sucessfull Please Login" ?></h2></div> <?php
		        				}
		        				else{ ?>
			                        <div class="validate"><h2><?php echo "Please Enter Correct Mobile No!" ?></h2></div><?php  
		                        }
		        			}
		        			else{ ?>
			                    <div class="validate"><h2><?php echo "Please Enter Mobile No" ?></h2></div><?php  
		                    }
		        		}
		        		else{ ?>
			                <div class="validate"><h2><?php echo "Password must be atleast 8 characters,1 capital,1 lowercase ,1 number!" ?></h2></div><?php  
		                } 
		        	}
                    else{ ?>
			            <div class="validate"><h2><?php echo "Please Enter Password" ?></h2></div><?php  
		            } 
		        }
		        else{ ?>
			        <div class="validate"><h2><?php echo "Email Already Exist" ?></h2></div><?php  
		        } 
			}
			else{ ?>
	            <div class="validate"><h2><?php echo "Please Enter Correct Email Format" ?></h2></div><?php  
            }
		}
	    else{ ?>
	        <div class="validate"><h2><?php echo "Please Enter Email" ?></h2></div><?php  
        }
    }
    else{ ?>
        <div class="validate"><h2><?php echo "Please Enter Name" ?></h2></div><?php  
    } ?>
</form>