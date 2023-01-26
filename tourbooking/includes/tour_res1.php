<?php
error_reporting(0);
session_start();
include('connection.php');
date_default_timezone_set("Asia/Calcutta");
$search_source=$_POST["source"];
if (!isset($search_source)) {
  echo "Variable 'a' is not set.<br>";
}

#logined or not
if (isset($_SESSION["Vuid"])) {
      $veuid = $_SESSION["Vuid"];
    }


$d_time ="";
$search_dest=$_POST["dest"];
$search_date=$_POST["date"];
$c_time=time();
$c_time=date('H:i:sa' , $c_time);
$c_date = date('Y-m-d');
$sql = 'SELECT * FROM tourinfo WHERE departure = ? AND arrival = ? AND departure_date = ? AND departure_time > ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$search_source , $search_dest , $search_date , $c_time]);
$businfos = $stmt->fetchAll();
foreach ($businfos as $businfo) {
	$d_time = strtotime($businfo->departure_time);
}
?>
<div class="res-bg py-4 " id="bus-content">
	<?php
	if($search_date == $c_date){
		if($d_time > $c_time){
			$sql = 'SELECT * FROM tourinfo WHERE departure = ? AND arrival = ? AND departure_date = ? 
			AND departure_time > ?';
			$stmt = $pdo->prepare($sql);
			$stmt->execute([$search_source , $search_dest , $search_date , $c_time]);
			$businfos = $stmt->fetchAll();
			foreach ($businfos as $businfo) {?>
				<div class="businfo-res" id="businfo-seats">
					<div class="sub-businfo-res py-4 px-4">
						<div class="departure row py-2 px-4 col-lg-3">
							<div class="row col-lg-12">
								<?php

								$date = strtotime($businfo->departure_time);
								$date = date('h:ia' , $date);
								echo '<h3>'.$date.'</h3>';
								?>
							</div>
							<div class="row col-lg-12">
								<?php
								$date = strtotime($businfo->departure_date);
								$date = date('d-m' , $date);
								echo '<h3>'.$date.'</h3>';
								?>
							</div>
							<div class="row col-lg-12">
								<?php
								echo '<h1>'.$businfo->departure.'</h1>';
								?>
							</div>
						</div>
						<div class="arrival row py-2 px-4 col-lg-3">
							<div class="row col-lg-12">
								<?php
								$date = strtotime($businfo->arrival_time);
								$date = date('h:ia' , $date);
								echo '<h3>'.$date.'</h3>';
								?>
							</div>
							<div class="row col-lg-12">
								<?php
								$date = strtotime($businfo->arrival_date);
								$date = date('d-m' , $date);
								echo '<h3>'.$date.'</h3>';
								?>
							</div>
							<div class="row col-lg-12">
								<?php
								echo '<h1>'.$businfo->arrival.'</h1>';   
								?>
							</div>
						</div>
						<div class="price row py-2 px-4 col-lg-3">
							<div class="row col-lg-12">
								<?php
								echo '<h3>'."Starts From".'</h3>';
								?>
							</div>
							<div class="row col-lg-12">
								<?php
								echo '<h1>'."INR" .$businfo->fare.'</h1>';
								?>
							</div>
							<div class="row col-lg-12">
								<button type="button" class="view-seats" onclick="Tsucesst(this)" id="<?= $businfo->id?>-<?= $veuid ?>">Book Trek</button>
							</div>
						</div>
					</div>
				</div>
			<?php }
		}
		else{ ?>
			<div class="businfo-output">
				<h3><?php echo "No Result Found"; ?></h3>
			</div>
		<?php }
	}
	elseif($search_date > $c_date){
		$sql = 'SELECT * FROM tourinfo WHERE departure = ? AND arrival = ? AND departure_date = ?';
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$search_source , $search_dest , $search_date]);
		$businfos = $stmt->fetchAll();
		if (count($businfos) > "0") {
			foreach ($businfos as $businfo) {?>
				<div class="businfo-res" id="businfo-seats">
					<div class="sub-businfo-res py-4 px-4">
						<div class="departure row py-2 px-4 col-lg-3">
							<div class="row col-lg-12">
								<?php

								$date = strtotime($businfo->departure_time);
								$date = date('h:ia' , $date);
								echo '<h3>'.$date.'</h3>';
								?>
							</div>
							<div class="row col-lg-12">
								<?php
								$date = strtotime($businfo->departure_date);
								$date = date('d-m' , $date);
								echo '<h3>'.$date.'</h3>';
								?>
							</div>
							<div class="row col-lg-12">
								<?php
								echo '<h1>'.$businfo->departure.'</h1>';
								?>
							</div>
						</div>
						<div class="arrival row py-2 px-4 col-lg-3">
							<div class="row col-lg-12">
								<?php
								$date = strtotime($businfo->arrival_time);
								$date = date('h:ia' , $date);
								echo '<h3>'.$date.'</h3>';
								?>
							</div>
							<div class="row col-lg-12">
								<?php
								$date = strtotime($businfo->arrival_date);
								$date = date('d-m' , $date);
								echo '<h3>'.$date.'</h3>';
								?>
							</div>
							<div class="row col-lg-12">
								<?php
								echo '<h1>'.$businfo->arrival.'</h1>';   
								?>
							</div>
						</div>
						<div class="price row py-2 px-4 col-lg-3">
							<div class="row col-lg-12">
								<?php
								echo '<h3>'."Starts From".'</h3>';
								?>
							</div>
							<div class="row col-lg-12">
								<?php
								echo '<h1>'."INR" .$businfo->fare.'</h1>';
								?>
							</div>
							<div class="row col-lg-12">
								<button type="button" class="view-seats" onclick="Tsucesst(this)" id="<?= $businfo->id?>-<?= $veuid ?>">Book Trek</button>
							</div>
						</div>
					</div>
				</div>
			<?php }
		}
		else{ ?>
			<div class="businfo-output">
				<h3><?php echo "No Result Found"; ?></h3>
			</div>
		<?php }
	}
	else{ ?>
		<div class="businfo-output">
			<h3><?php echo "No Result Found"; ?></h3>
			</div><?php 
		} 
	?>
</div>