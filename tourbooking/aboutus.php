<!DOCTYPE html>
<html lang="en">
<head>
  <title>TOur Booking Website</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
<?php include('includes/header.php');?>
<section class="about">
 <div class="container">
   <div class="row">
     <div class="top-about">
       <h2><span>About</span> Us</h2>
        <p>We utilized technology to bring results
        <br>to grow our clients businesses.</p>
      </div>
   </div>


   <div class="row py-5 col-12">
     <div class="about-intro-img  col-md-6 col-sm-12">
       <div class="border-aboutimg">
         <div class="border-content py-3">
           <img class="about-img img-fluid" src="images/about-us.jpg"  alt="about-img">
          </div>
       </div>
     </div>
     <div class="about-intro-info col-md-6 col-sm-12 py-3">
         <p>
          <?php
            $id=1;
            include('includes/fetch.php');
            ?>
          </p>
      </div>
    </div>


    <div class="row py-5 col-12">
      <div class="about-loc col-md-6 col-sm-12 py-3">
        <h3>Our Office Location</h3>
      </div>
      <div class="about-loc-info col-md-6 col-sm-12 py-3">
        <h3>Mumbai</h3>
        <p>
         <?php
            $id=2;
            include('includes/fetch.php');
            ?>
        </p>
      </div>
    </div>

    <div class="row py-5 col-12">
      <div class="about-mission col-md-6 col-sm-12 py-3">
        <h3>Our Mission</h3>
      </div>
      <div class="about-mission-info col-md-6 col-sm-12 py-3">
        <p>
         <?php
            $id=3;
            include('includes/fetch.php');
            ?>
        </p>
      </div>
    </div>

    

    <div class="row py-5 col-12">
      <div class="about-conn col-md-6 col-sm-12 py-3">
        <h3>Let's Connect</h3>
      </div>
      <div class="about-conn-info col-md-6 col-sm-12 py-3">
        <p>
        <?php
            $id=4;
            include('includes/fetch.php');
            ?>
        </p>
      </div>
    </div>

    
  </div>
</section>
<?php include('includes/footer.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 
