<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bus Website-book</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/user.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
  <?php
  include('connection.php');
  $vemail = $_SESSION["vemail"];
  $esql = 'SELECT * FROM user_login WHERE email LIKE ?';
  $estmt = $pdo->prepare($esql);
  $estmt->execute([$vemail]);
  $ulids = $estmt->fetchAll();
  foreach ($ulids as $ulid) {
   $Vuserid = $ulid->id;
 }
 if (!empty($Vuserid)) {
   $_SESSION["Vuid"] = $Vuserid;

 }
 else{
   $_SESSION["Vuid"] = "0";

 }




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
  $Ut_ddate  = $recticket->UTd_date;
  $Ut_adate  = $recticket->UTa_date;
  $Ut_type1  = $recticket->UTbustype_1;
  $Ut_type2  = $recticket->UTbustype_2;
  $fullname = $recticket->fullname;
}
$tname = explode("^", $Ubus_name);
$tboard = explode("^", $Uboard_p);
$tdrop = explode("^", $Udrop_p);
$tseat = explode("^", $Useats_booked);
$tfare = explode("^", $Ut_fare);
$tddate = explode("^", $Ut_ddate);
$tadate = explode("^", $Ut_adate);
$ttype1 = explode("^", $Ut_type1);
$ttype2 = explode("^", $Ut_type2);
$ticketcount = count(($tname));
?>
<div class="user-head row">
  <div class="btn-s col-md-6">
    <button type="button" class="uback"><a href="../index.php">Go Back</a></button>
    <button type="button" class="ulogout"><a href="../login.php">Logout</a></button>
  </div>
  <div class="username col-md-6"><h2>Welcome <?php echo " ".$fullname ."!!"; ?></h2></div>
</div>
<div class="ticket-receipt">
  <div class="receipt-bg row"><?php
    if ($ticketcount > 1) { ?>
      <div class="booking-my"><h2>My Booking</h2></div> <?php
      for ($i=1; $i < $ticketcount; $i++){ ?> 
        <div class="sub-ticket col-md-12 col-lg-12 py-3">
          <div class="receipt1 col-md-4">
            <div class="row col-lg-12">
              <h2><?php echo $tname[$i]; ?></h2>
            </div>
            <div class="row col-lg-12">
              <h2><?php echo $ttype1[$i]; ?></h2>
            </div>
            <div class="row col-lg-12">
              <h2><?php echo $ttype2[$i]; ?></h2>
            </div>
          </div>
          <div class="receipt2 col-md-4">
            <div class="row col-lg-12">
              <h2><?php echo $tddate[$i]; ?></h2>
            </div>
            <div class="row col-lg-12">
              <h2><?php echo $tboard[$i] ; ?></h2>
            </div>
            <div class="row col-lg-12">
              <h2>seats:<?php echo $tseat[$i] ; ?></h2>
            </div>
          </div>
          <div class="receipt3 col-md-4">
            <div class="row col-lg-12">
              <h2><?php echo $tadate[$i]; ?></h2>
            </div>
            <div class="row col-lg-12">
              <h2><?php echo $tdrop[$i]; ?></h2>
            </div>
            <div class="row col-lg-12">
              <h2>INR:<?php echo $tfare[$i] ; ?></h2>
            </div>
          </div>
        </div><?php
      }
    }
    else{ ?>
      <div class="booking-res"><h2>No Booking Available</h2></div> <?php
    } ?>
  <div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>