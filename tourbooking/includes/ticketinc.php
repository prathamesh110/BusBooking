<?php
include('connection.php');
$vemail = $_SESSION["vemail"];
$btnid = $_SESSION["btnsid"];
$vuid = $_SESSION["Vuid"];
$recdsql = "SELECT * FROM businfo WHERE id LIKE ?";
$recdstmt = $pdo->prepare($recdsql);
$recdstmt->execute([$btnid]);
$recdates = $recdstmt->fetchAll();
foreach ($recdates as $recdate) {
  $d_date = $recdate->departure_date;
  $a_date = $recdate->arrival_date;
  $typ1 = $recdate->bus_type1;
  $typ2 = $recdate->bus_type2;
}
$d_date = strtotime($d_date);
$d_date = date('d-m' , $d_date);


$a_date = strtotime($a_date);
$a_date = date('d-m' , $a_date);


$recusql = "SELECT * FROM user_login WHERE id LIKE ?";
$recustmt = $pdo->prepare($recusql);
$recustmt->execute([$Vuserid]);
$rectickets = $recustmt->fetchAll();
foreach ($rectickets as $recticket) {
  $Ubus_name = $recticket->Ubus_name;
  $Uboard_p = $recticket->Uboard_p;
  $Udrop_p  = $recticket->Udrop_p;
  $Useats_booked = $recticket->Useats_booked;
  $Ut_fare  = $recticket->UTfare;
}
$tname = explode(":", $Ubus_name);
$tboard = explode(":", $Uboard_p);
$tdrop = explode(":", $Udrop_p);
$tseat = explode(":", $Useats_booked);
$tfare = explode(":", $Ut_fare);
$ticketcount = count(($tname)) - 1;

for ($i=1; $i < $ticketcount; $i++) { ?>
    <div class="receipt-bg">
      <div class="receipt1 col-md-4">
        <div class="row">
          <h2><?php echo $tname[i]; ?></h2>
        </div>
        <div class="row">
          <h2><?php echo $typ1; ?></h2>
        </div>
        <div class="row">
          <h2><?php echo $typ2; ?></h2>
        </div>
      </div>
      <div class="receipt2 col-md-4">
        <div class="row">
          <h2><?php echo $d_date; ?></h2>
        </div>
        <div class="row">
          <h2><?php echo $tboard[i] ; ?></h2>
        </div>
        <div class="row">
          <h2><?php echo $tseat[i] ; ?></h2>
        </div>
      </div>
      <div class="receipt3 col-md-4">
        <div class="row">
          <h2><?php echo $a_date; ?></h2>
        </div>
        <div class="row">
          <h2><?php echo $tdrop[i]; ?></h2>
        </div>
        <div class="row">
          <h2><?php echo $tfare[i] ; ?></h2>
        </div>
      </div>
    <div><?php
    }
?>


