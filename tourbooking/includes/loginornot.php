<?php
session_start();
if (isset($_SESSION["Vuid"])) {
    $veuid = $_SESSION["Vuid"];

}

if ($veuid > 1) {
	header("location:userprofile.php");
}
else{
	header("location:../login.php");
}

?>
