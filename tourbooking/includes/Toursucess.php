<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bus Website-book</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/user.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="shortcut icon" href="favicon.ico"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
<div class="Sucess-mss row" id="Sucess-mss">
  <?php
  include('connection.php');
  if (isset($_SESSION["Vuid"])) {
    $veuid = $_SESSION["Vuid"];
  }
  $btnsid = $_POST["btnid"];
  

  $toursql = "SELECT * FROM tourinfo WHERE id LIKE ?";
  $tstmt = $pdo->prepare($toursql);
  $tstmt->execute([$btnsid]);
  $tstmtfeths = $tstmt->fetchAll();
  foreach ($tstmtfeths as $tstmtfeth){
    $T_dep = $tstmtfeth->departure;
    $T_dtime = $tstmtfeth->departure_time;
    $T_ddate = $tstmtfeth->departure_date;
    $T_arr = $tstmtfeth->arrival;
    $T_arr_time = $tstmtfeth->arrival_time;
    $T_arr_date = $tstmtfeth->arrival_date;
    $Tfare = $tstmtfeth->fare;
  }

  $userbfetch = "SELECT * FROM user_login WHERE id LIKE ?";
    $userbstmt = $pdo->prepare($userbfetch);
    $userbstmt->execute([$veuid]);
    $usersfetch = $userbstmt->fetchALL();
    foreach ($usersfetch as $userfetch) {
      $Ubus_name = $userfetch->Ubus_name;
      $Uboard_p = $userfetch->Uboard_p;
      $Udrop_p  = $userfetch->Udrop_p;
      $Useats_booked = $userfetch->Useats_booked;
      $Ut_fare  = $userfetch->UTfare;
      $Ut_ddate  = $userfetch->UTd_date;
      $Ut_adate  = $userfetch->UTa_date;
      $Ut_type1  = $userfetch->UTbustype_1;
      $Ut_type2  = $userfetch->UTbustype_2;
      
    }

    $Sseatno = "Na";
    $Fbusname = "Trek";
    $typ1 = " ";
    $typ2 = " ";
    
    $Useats = array($Useats_booked);
    array_push($Useats, $Sseatno);
    $iUseat = implode("^",$Useats);

    $Uboard = array($Uboard_p);
    array_push($Uboard, $T_dep);
    $iUboard = implode("^", $Uboard);
 
    $Udrop = array($Udrop_p);
    array_push($Udrop, $T_arr);
    $iUdrop = implode("^", $Udrop);


    $Uname = array($Ubus_name);
    array_push($Uname, $Fbusname);
    $iUname = implode("^", $Uname);

    $Ufare = array($Ut_fare);
    array_push($Ufare, $Tfare);
    $iUfare = implode("^", $Ufare);


    $d_date = strtotime($T_ddate);
    $d_date = date('d-m' , $d_date);

    $a_date = strtotime($T_arr_date);
    $a_date = date('d-m' , $a_date);


    $Uddate = array($Ut_ddate);
    array_push($Uddate, $d_date);
    $iUddate = implode("^", $Uddate);

    $Uadate = array($Ut_ddate);
    array_push($Uadate, $a_date);
    $iUadate = implode("^", $Uadate);

    $Utype1 = array($Ut_type1);
    array_push($Utype1, $typ1);
    $iUtype1 = implode("^", $Utype1);

    $Utype2 = array($Ut_type2);
    array_push($Utype2, $typ2);
    $iUtype2 = implode("^", $Utype2);


    $Ubook = "UPDATE  user_login SET  Ubus_name = :Ubus_name  WHERE id  = :id";
    $Ubookstmt = $pdo->prepare($Ubook);
    $Ubookstmt->execute(['Ubus_name'=> $iUname, 'id'=>$veuid]);

    
    $Ubook = "UPDATE  user_login SET  Uboard_p = :Uboard_p  WHERE id  = :id";
    $Ubookstmt = $pdo->prepare($Ubook);
    $Ubookstmt->execute(['Uboard_p'=> $iUboard, 'id'=>$veuid]);

    $Ubook = "UPDATE  user_login SET  Udrop_p = :Udrop_p  WHERE id  = :id";
    $Ubookstmt = $pdo->prepare($Ubook);
    $Ubookstmt->execute(['Udrop_p'=> $iUdrop, 'id'=>$veuid]);

     
    $Ubook = "UPDATE  user_login SET  Useats_booked = :Useats_booked  WHERE id  = :id";
    $Ubookstmt = $pdo->prepare($Ubook);
    $Ubookstmt->execute(['Useats_booked'=> $iUseat, 'id'=>$veuid]);

    $Ubook = "UPDATE  user_login SET  UTfare = :UTfare  WHERE id  = :id";
    $Ubookstmt = $pdo->prepare($Ubook);
    $Ubookstmt->execute(['UTfare'=> $iUfare, 'id'=>$veuid]);


    $Ubook = "UPDATE  user_login SET  UTd_date = :UTd_date  WHERE id  = :id";
    $Ubookstmt = $pdo->prepare($Ubook);
    $Ubookstmt->execute(['UTd_date'=> $iUddate, 'id'=>$veuid]);

    $Ubook = "UPDATE  user_login SET  UTa_date = :UTa_date  WHERE id  = :id";
    $Ubookstmt = $pdo->prepare($Ubook);
    $Ubookstmt->execute(['UTa_date'=> $iUadate, 'id'=>$veuid]);

    $Ubook = "UPDATE  user_login SET  UTbustype_1 = :UTbustype_1  WHERE id  = :id";
    $Ubookstmt = $pdo->prepare($Ubook);
    $Ubookstmt->execute(['UTbustype_1'=> $iUtype1, 'id'=>$veuid]);

    $Ubook = "UPDATE  user_login SET  UTbustype_2 = :UTbustype_2  WHERE id  = :id";
    $Ubookstmt = $pdo->prepare($Ubook);
    $Ubookstmt->execute(['UTbustype_2'=> $iUtype2, 'id'=>$veuid]);

  ?>




  <div class="sucess-head">
    <h1>Your Trek is Booked Tour guide will Contact Soon !! </h1>
  </div><br>
  <div class="sucess-btn">
    <button type="button"><a href="../tourbooking/tourbook.php">Go Home</a></button>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>