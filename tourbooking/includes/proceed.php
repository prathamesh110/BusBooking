<?php
session_start();
error_reporting(0);
include('connection.php');
$seatarr = $_SESSION["seatsarr"];
$boardid = $_SESSION["boardsid"];
$price_s = $_SESSION["prices_s"];
if (isset($_SESSION["Vuid"])) {
	$veuid = $_SESSION["Vuid"];
}

$dropid = $_POST["dropid"];
$btnid = $_SESSION["btnsid"];
$Pdbq = "SELECT * FROM businfo WHERE id LIKE ?";
$Pdbstmt = $pdo->prepare($Pdbq);
$Pdbstmt->execute([$btnid]);
$Pdbinfos = $Pdbstmt->fetchAll();
foreach ($Pdbinfos as $Pdbinfo) {
	$Pbpoint = $Pdbinfo->board_point;
	$Pdpoint = $Pdbinfo->drop_point;
	$price_get = $Pdbinfo->fare;
}
$Pboard_Point = explode(',',$Pbpoint);
$Pdrop_Point = explode(',',$Pdpoint);
$Tfare = $price_get * count($price_s);
$_SESSION["sucess_board"] = $Pboard_Point[$boardid];
$_SESSION["sucess_drop"] = $Pdrop_Point[$dropid];
$_SESSION["sucess_seatno"] = $seatarr;
$_SESSION["sucess_tfare"] = $Tfare;
?>



<div class="proceed-sec">
	<div class="bd-change row">
		<div class="bd-heading">
			<h1>Boarding & Dropping</h1>
		</div>
	</div>
	<div class="Pdbpoint">
		<hr style="width: 50px; height: 3px;transform: translate(-305px,47px) rotate(90deg);"  color="green">
		<div class="Pb-point ">
           <div class="fetch-b col-md-9">
              <h1><?php echo $Pboard_Point[$boardid]; ?></h1>
           </div>
		</div>
		<div class="Pd-point ">
			<div class="fetch-d col-md-9">
              <h1><?php echo $Pdrop_Point[$dropid]; ?></h1>
           </div>
		</div>
	</div><br>
	<div class="Pseat row">
		<div class="Pseat-h col-md-9">
             <h1>Seat No</h1>
		</div>
		<div class="fetch-Pseat col-md-3">
             <h1><?php echo $seatarr;  ?></h1>
		</div>
	</div><br>
	<div class="Pfare row">
		<div class="Pfare-h col-md-9">
			<h1>Amount</h1>
        </div>
        <div class="fetch-Pfare col-md-3">
            <h1>INR <?php echo $Tfare; ?></h1>
        </div>
	</div>
	<div class="Ppayement">
		<button type="button" class="Pfee" onclick="sucesst(this)" id="b-<?php echo $veuid;?>">Proceed for Payement</button>
	</div>
</div>