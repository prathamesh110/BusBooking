<?php
session_start();
$btnid = $_SESSION["btnsid"];
$seatarr = $_SESSION["seatsarr"];
$_SESSION["boardsid"] = $_POST["boardid"];
include('connection.php');
$price_string = $seatarr;
$price_array = explode(',',$price_string);
$price_s = array();
$price_s = $price_array;
$drbrd = 'SELECT * FROM businfo WHERE id LIKE ?';
$dbsmt = $pdo->prepare($drbrd);
$dbsmt->execute([$btnid]);
$dbinfos = $dbsmt->fetchAll();
foreach ($dbinfos as $dbinfo) {
	$drop_p = $dbinfo->drop_point;
	$price_get =$dbinfo->fare;
}

?>
<?php $drop_Point = explode(',',$drop_p); ?>

<!--div class="dbdiff col-lg-12 col-md-12">
	<div class="board-point col-lg-6 col-md-6" id="board-point">
		<button class="board-btnn" id="board-btn">BOARDING POINT</button>
	</div>
	<div class="drop-point col-lg-6 col-md-6" id="drop-point">
		<button class="drop-btnn" id="drop-btn">DROPING POINT</button>
	</div>
</div-->
<div class="drop-fetch">
	<?php for ($d=0; $d < count($drop_Point); $d++) { ?>
		<input type="radio" class="d-items" name="drop-d" onclick="bp(this)"  id="b-<?php echo  $d ?>">
        <label for="b-<?php echo $d ?>"><h2><?php echo $drop_Point[$d] ?></h2></label><br> <?php
	} ?>
</div>