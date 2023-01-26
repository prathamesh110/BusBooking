<?php
session_start();
include('connection.php');
$_SESSION["seatsarr"] = $_POST["seatarr"];
$btnid = $_SESSION["btnsid"];
$price_string = $_POST["seatarr"];
$price_array = explode(',',$price_string);
$price_s = array();
$price_s = $price_array;
$drbr = 'SELECT * FROM businfo WHERE id LIKE ?';
$dbsmt = $pdo -> prepare($drbr);
$dbsmt->execute([$btnid]);
$dbinfos = $dbsmt->fetchAll();
foreach ($dbinfos as $dbinfo) {
	$board_p = $dbinfo->board_point;
}

$board_Point = explode(',',$board_p);?>

<!--div class="dbdiff col-lg-12 col-md-12">
	<div class="board-point col-lg-6 col-md-6" id="board-point">
		<button class="board-btn" id="board-btn">BOARDING POINT</button>
	</div>
	<div class="drop-point col-lg-6 col-md-6" id="drop-point">
		<button class="drop-btn" id="drop-btn">DROPING POINT</button>
	</div>
</div-->
<div class="board-fetch">
	<?php for ($b=0; $b < count($board_Point); $b++) { ?>
		<input type="radio" class="b-items" name="board-b" onclick="dp(this)"  id="b-<?php echo  $b ?>">
        <label for="b-<?php echo $b ?>"><h2><?php echo $board_Point[$b] ?></h2></label><br><?php
	} ?>
</div>
