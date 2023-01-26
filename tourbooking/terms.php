<!DOCTYPE html>
<html lang="en">
<head>
  <title>TOur booking-Terms</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
<?php include('includes/header.php');?>
<section class="terms">
 <div class="container">
   <div class="row">
     <div class="top-terms">
       <h3>Terms Of <span>Use</span></h3>
        <p>We utilized technology to bring results
        <br>to grow our clients businesses.</p>
      </div>
   </div>
   <div class="row py-5 col-12 col-md-12" id="terms-b">
    <p>
       <?php
         $id=5;
         include('includes/fetch.php');
         ?>
    </p>
   </div>
  </div>
</section>








<?php include('includes/footer.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 