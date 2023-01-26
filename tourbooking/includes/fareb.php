<?php
session_start();
include('connection.php');
$btnid = $_SESSION["btnsid"];
$price_string = $_POST["seatarr"];
$price_array = explode(',',$price_string);
$price_s = array();
$price_s = $price_array;
$_SESSION["prices_s"] = $price_s;
$drbr = 'SELECT * FROM businfo WHERE id LIKE ?';
$dbsmt = $pdo -> prepare($drbr);
$dbsmt->execute([$btnid]);
$dbinfos = $dbsmt->fetchAll();
foreach ($dbinfos as $dbinfo) {
	$price_get =$dbinfo->fare;
}

?>
<div class="s-prize">
	<h2>Amount<p>(Taxes will be calculated during payment)</p></h2><pre><h2>  INR <?php echo $price_get * count($price_s); ?></h2> </pre></h2>
</div>