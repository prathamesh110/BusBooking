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
    
    $Sboard = $_SESSION["sucess_board"];
    $Sdrop = $_SESSION["sucess_drop"];
    $Sseatno = $_SESSION["sucess_seatno"];
    $Sfare = $_SESSION["sucess_tfare"];
    $btnid = $_SESSION["btnsid"];
    $Tfare = $_SESSION["sucess_tfare"];
    /*------------------------------------------------------businfo-insert-----------------------------------------------*/
    $seatbfetch = "SELECT * FROM businfo WHERE id LIKE ?";
    $stfetch = $pdo->prepare($seatbfetch);
    $stfetch->execute([$btnid]);
    $stbsfetch = $stfetch->fetchALL();
    foreach ($stbsfetch as $stbfrtch) {
      $Fseatno = $stbfrtch->seat_booked;
      $Fbusname = $stbfrtch->bus_name;
    }
    $Fseat = array($Fseatno);
    array_push($Fseat, $Sseatno);
    $iseatno = implode(",", $Fseat);

    $bookseat = "UPDATE  businfo SET seat_booked = :seat_booked WHERE id  = :id";
    $booksstmt = $pdo->prepare($bookseat);
    $booksstmt->execute(['seat_booked' => $iseatno, 'id' => $btnid]);

    /*--------------------------------------------------------user-insert--------------------------------------------------*/
    

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
    
    $Useats = array($Useats_booked);
    array_push($Useats, $Sseatno);
    $iUseat = implode("^",$Useats);

    $Uboard = array($Uboard_p);
    array_push($Uboard, $Sboard);
    $iUboard = implode("^", $Uboard);
 
    $Udrop = array($Udrop_p);
    array_push($Udrop, $Sdrop);
    $iUdrop = implode("^", $Udrop);


    $Uname = array($Ubus_name);
    array_push($Uname, $Fbusname);
    $iUname = implode("^", $Uname);

    $Ufare = array($Ut_fare);
    array_push($Ufare, $Tfare);
    $iUfare = implode("^", $Ufare);


    $d_date = strtotime($d_date);
    $d_date = date('d-m' , $d_date);

    $a_date = strtotime($a_date);
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
    <h1>Your Bus Seats are Confirmed !! </h1>
  </div><br>
  <div class="sucess-btn">
    <button type="button"><a href="../index.php">Go Home</a></button>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>